<?php
/**
 * 2007-2019 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\Module\AddonsConnect;

use Doctrine\Common\Cache\FilesystemCache;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Subscriber\Cache\CacheStorage;
use PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory;
use GuzzleHttp\Subscriber\Cache\CacheSubscriber;
use PrestaShop\CircuitBreaker\Contract\FactoryInterface;
use PrestaShop\CircuitBreaker\Contract\FactorySettingsInterface;
use PrestaShop\CircuitBreaker\FactorySettings;
use PrestaShop\CircuitBreaker\Storage\DoctrineCache;

class WeekAdvice
{
    const CACHE_DURATION = 86400; //24 hours

    const ADDONS_API_URL = 'https://api-addons.prestashop.com';

    const CLOSED_ALLOWED_FAILURES = 2;
    const API_TIMEOUT_SECONDS = 0.6;

    const OPEN_ALLOWED_FAILURES = 1;
    const OPEN_TIMEOUT_SECONDS = 1.2;

    const OPEN_THRESHOLD_SECONDS = 3600;

    /** @var CacheSubscriber */
    private $cacheSubscriber;

    /** @var FactoryInterface */
    private $factory;

    /** @var FactorySettingsInterface */
    private $factorySettings;

    public function __construct()
    {
        //Doctrine cache used for Guzzle and CircuitBreaker storage
        $doctrineCache = new FilesystemCache(_PS_CACHE_DIR_ . '/addons_advice');

        //Init Guzzle cache
        $cacheStorage = new CacheStorage($doctrineCache, null, self::CACHE_DURATION);
        $this->cacheSubscriber = new CacheSubscriber($cacheStorage, function (Request $request) { return true; });

        //Init circuit breaker factory
        $storage = new DoctrineCache($doctrineCache);
        $this->factorySettings = new FactorySettings(self::CLOSED_ALLOWED_FAILURES, self::API_TIMEOUT_SECONDS, self::OPEN_THRESHOLD_SECONDS);
        $this->factorySettings
            ->setStrippedFailures(self::OPEN_ALLOWED_FAILURES)
            ->setStrippedTimeout(self::OPEN_TIMEOUT_SECONDS)
            ->setStorage($storage)
            ->setClientOptions(['method' => 'GET'])
        ;
        $this->factory = new AdvancedCircuitBreakerFactory();
    }

    /**
     * @param string $isoCode
     *
     * @return bool|array
     */
    public function getWeekData($isoCode)
    {
        $circuitBreaker = $this->factory->create($this->factorySettings);
        $apiJsonResponse = $circuitBreaker->call(
            self::ADDONS_API_URL . '/request/?' . http_build_query(['method' => 'week_advice', 'iso_lang' => $isoCode]),
            [
                'subscribers' => [
                    $this->cacheSubscriber,
                ],
            ]
        );

        return !empty($apiJsonResponse) ? json_decode($apiJsonResponse, true) : false;
    }
}
