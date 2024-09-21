<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    public function testStoreOrderSuccessfully()
    {
        $response = $this->postJson('/api/orders', [
            'order_number' => 'ORD123',
            'amount' => 1000,
            'currency' => 'TWD'
        ]);

        $response->assertStatus(200);
    }

    public function testStoreOrderValidationFail()
    {
        $response = $this->postJson('/api/orders', [
            'order_number' => '',
            'amount' => 1000,
            'currency' => 'INVALID'
        ]);

        $response->assertStatus(422);
    }
}
