<?php

use PHPUnit\Framework\TestCase;

class CallToGamificationServerTest extends TestCase
{
    public function testContentIsGzipped()
    {
        $workingCallUrl = 'https://gamification.prestashop.com/json/data_EN_IDR_ID.json';

        $response = GamificationTools::retrieveJsonApiFile($workingCallUrl, true);
        $this->assertContains('Content-Encoding: gzip', $response);
    }
}
