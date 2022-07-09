<?php
/** @noinspection PhpUnhandledExceptionInspection */
namespace App\Tests\Api;

use App\Tests\Tools\AbstractAPITestCase;

class GreetingsTest extends AbstractAPITestCase
{
    public const API_OPTIONS_DEFAULTS = [
        'base_uri' => 'http://localhost',
    ];

    public function testCreateGreeting()
    {
        $expectedId = '850b71ab-0dc2-4ad8-9993-8a290bae4463';
        $this->loadFixtures(['fixtures/greeting.yaml']);

        $response = $this->getClient()->request(
            'GET',
            '/greetings/'.$expectedId,
            ['headers' => [
                'Accept' => 'application/json'
            ]],
        );

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(200);

        $this->assertJsonContains([
            'id' => '850b71ab-0dc2-4ad8-9993-8a290bae4463',
            'name' => 'hola',
        ]);
    }
}
