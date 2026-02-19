<?php

namespace Tests\Feature;

use Tests\TestCase;

class MikrotikUpgradeXmlTest extends TestCase
{
    public function test_base_upgrade_contains_two_packages()
    {
        $response = $this->get('/mikrotik/downloads/7.12.1/arm/generate-upgrade-xml.xml');

        $response->assertStatus(200);

        $xml = simplexml_load_string($response->getContent());

        $this->assertNotFalse($xml);
        $this->assertCount(2, $xml->links->link);

        $this->assertStringContainsString('routeros-7.12.1-arm.npk', $response->getContent());
        $this->assertStringContainsString('tr069-client-7.12.1-arm.npk', $response->getContent());
        $this->assertStringNotContainsString('wireless-7.12.1-arm.npk', $response->getContent());
    }

    public function test_wireless_upgrade_contains_three_packages()
    {
        $response = $this->get('/mikrotik/downloads/7.12.1/arm/wireless/generate-upgrade-xml.xml');

        $response->assertStatus(200);

        $xml = simplexml_load_string($response->getContent());

        $this->assertNotFalse($xml);
        $this->assertCount(3, $xml->links->link);

        $this->assertStringContainsString('routeros-7.12.1-arm.npk', $response->getContent());
        $this->assertStringContainsString('tr069-client-7.12.1-arm.npk', $response->getContent());
        $this->assertStringContainsString('wireless-7.12.1-arm.npk', $response->getContent());
    }
}
