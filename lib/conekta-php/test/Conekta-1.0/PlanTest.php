<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.6@
 *
 * @see       https://conekta.com/
 */

namespace Conekta;

class PlanTest extends BaseTest
{
    public function testSuccesfulGetPlan()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $plans = Plan::where();
        $plan = Plan::find($plans[0]->id);
        $this->assertTrue(strpos(get_class($plan), 'Plan') !== false);
    }

    public function testSuccesfulWhere()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $plans = Plan::where();
        $this->assertTrue(strpos(get_class($plans), 'Object') !== false);
        $this->assertTrue(strpos(get_class($plans[0]), 'Plan') !== false);
    }

    public function testSuccesfulPlanCreate()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $plans = Plan::where();
        $plan = Plan::create([
      'id' => 'gold-plan' . substr('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(0, 50), 1) . substr(md5(time()), 1),
      'name' => 'Gold Plan',
      'amount' => 10000,
      'currency' => 'MXN',
      'interval' => 'month',
      'frequency' => 10,
      'trial_period_days' => 15,
      'expiry_count' => 12,
      ]);
        $this->assertTrue(strpos(get_class($plan), 'Plan') !== false);
    }

    public function testUpdatePlan()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $plans = Plan::where();
        $plan = $plans[0];
        $plan->update(['name' => 'Silver Plan']);
        $this->assertTrue(strpos($plan->name, 'Silver Plan') !== false);
    }

    public function testDeletePlan()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $plans = Plan::where();
        $plan = $plans[0];
        $plan->delete();
        $this->assertTrue($plan->deleted == true);
    }
}
