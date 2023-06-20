<?php

namespace Conekta\Payments\Services;

use Conekta\Api\ChargesApi;
use Conekta\Api\CustomersApi;
use Conekta\Api\OrdersApi;
use Conekta\Api\PaymentMethodsApi;
use Conekta\Api\PlansApi;
use Conekta\Api\WebhooksApi;
use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\Model\ChargeOrderResponse;
use Conekta\Model\ChargeRequest;
use Conekta\Model\Customer;
use Conekta\Model\CustomerResponse;
use Conekta\Model\Error;
use Conekta\Model\GetWebhooksResponse;
use Conekta\Model\OrderRefundRequest;
use Conekta\Model\OrderRequest;
use Conekta\Model\OrderResponse;
use Conekta\Model\OrderUpdateRequest;
use Conekta\Model\PlanResponse;
use Conekta\Model\UpdateCustomer;
use Conekta\Model\UpdateCustomerPaymentMethodsResponse;
use Conekta\Model\WebhookRequest;
use Conekta\Model\WebhookResponse;
use GuzzleHttp\Client;

class ConektaApiService
{
    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var OrdersApi
     */
    private $orderInstance;

    /**
     * @var CustomersApi
     */
    private $customerInstance;
    /**
     * @var ChargesApi
     */
    private $chargeInstance;

    private $planInstance;

    private $customerPaymentMethods;

    private $webhooks;

    public function __construct(string $privateKey)
    {
        $this->client = new Client();
        $this->config = Configuration::getDefaultConfiguration()->setAccessToken($privateKey);
        $this->orderInstance = new OrdersApi($this->client, $this->config);
        $this->customerInstance = new CustomersApi($this->client, $this->config);
        $this->chargeInstance = new ChargesApi($this->client, $this->config);
        $this->customerPaymentMethods = new PaymentMethodsApi($this->client, $this->config);
        $this->webhooks = new WebhooksApi($this->client, $this->config);
        $this->planInstance = new PlansApi($this->client, $this->config);
    }


    /**
     * @param array $orderData
     * @return OrderResponse
     * @throws ApiException
     */
    public function createOrder(array $orderData): OrderResponse
    {
        $orderRequest = new OrderRequest($orderData);

        return $this->orderInstance->createOrder($orderRequest);
    }

    /**
     * @param string $id
     * @param array $orderData
     * @return OrderResponse
     * @throws ApiException
     */
    public function updateOrder(string $id, array $orderData): OrderResponse
    {
        $orderUpdateRequest = new OrderUpdateRequest($orderData);

        return $this->orderInstance->updateOrder($id, $orderUpdateRequest);
    }

    /**
     * @param string $id
     * @return OrderResponse
     * @throws ApiException
     */
    public function getOrderByID(string $id): OrderResponse
    {
        return $this->orderInstance->getOrderById($id);
    }

    /**
     * @param string $id
     * @return CustomerResponse
     * @throws ApiException
     */
    public function findCustomerByID(string $id): CustomerResponse
    {
        return $this->customerInstance->getCustomerById($id);
    }

    /**
     * @param string $id
     * @param array $customerData
     * @return CustomerResponse
     * @throws ApiException
     */
    public function updateCustomer(string $id, array $customerData): CustomerResponse
    {
        $customerRequest = new UpdateCustomer($customerData);

        return $this->customerInstance->updateCustomer($id, $customerRequest);
    }

    /**
     * @param array $customerData
     * @return CustomerResponse
     * @throws ApiException
     */
    public function createCustomer(array $customerData): CustomerResponse
    {
        $customerRequest = new Customer($customerData);

        return $this->customerInstance->createCustomer($customerRequest);
    }

    /**
     * @param string $customerID
     * @param string $paymentMethodID
     * @return UpdateCustomerPaymentMethodsResponse
     * @throws ApiException
     */
    public function deleteCustomerPaymentMethod(string $customerID, string $paymentMethodID): UpdateCustomerPaymentMethodsResponse
    {
        return $this->customerPaymentMethods->deleteCustomerPaymentMethods($customerID, $paymentMethodID);
    }

    /**
     * @param string $orderID
     * @param array $chargeData
     * @return ChargeOrderResponse
     * @throws ApiException
     */
    public function createOrderCharge(string $orderID, array $chargeData): ChargeOrderResponse
    {
        $chargeRequest = new ChargeRequest($chargeData);

        return $this->chargeInstance->ordersCreateCharge($orderID, $chargeRequest);
    }

    public function orderRefund(string $orderID, array $orderRefundData)
    {
        $orderRefundRequest = new OrderRefundRequest($orderRefundData);

        return $this->orderInstance->orderRefund($orderID, $orderRefundRequest);
    }

    /**
     * @return GetWebhooksResponse
     * @throws ApiException
     */
    public function getWebhooks(): GetWebhooksResponse
    {
        return $this->webhooks->getWebhooks();
    }

    /**
     * @param array $webhookData
     * @return WebhookResponse
     * @throws ApiException
     */
    public function createWebhook(array $webhookData): WebhookResponse
    {
        $webhookRequest = new WebhookRequest($webhookData);
        return $this->webhooks->createWebhook($webhookRequest);
    }

    /**
     * @param string $webhookID
     * @param array $webhookData
     * @return WebhookResponse
     * @throws ApiException
     */
    public function updateWebhook(string $webhookID, array $webhookData): WebhookResponse
    {
        $webhookRequest = new WebhookUpdateRequest($webhookData);
        return $this->webhooks->updateWebhook($webhookID, $webhookRequest);
    }

    /**
     * @return
     * @throws ApiException
     */
    public function getPlanByID(string $planID): ?PlanResponse
    {
        $plan = $this->planInstance->getPlan($planID);
        if (get_class($plan) === Error::class) {
            return null;
        }

        return $plan;
    }
}