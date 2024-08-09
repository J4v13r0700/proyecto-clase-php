<?php

namespace Tests\Feature\PizzaApi;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PizzasControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_api_login_and_pizza_creation(): void
    {
        $response = $this->postJson('/api/v1/login', [
            "email" => "testjavier@dev.com",
            "password" => "12345678" 
        ]);

        $response->assertStatus(200);
        $token = $response->json('token');

        $protectedResponse = $this->withHeader('Authorization', 'Bearer '.$token)
                                ->postJson('/api/v1/pizzas', [
                                        "name" => "Pizza de Queso",
                                        "size" => "Familiar",
                                        "orden"=> 3,
                                        "ingredientes" => [1, 2, 5]
                                ]);

        $protectedResponse->assertStatus(200)
                        ->assertJsonStructure(['orden'])
                        ->assertJsonStructure(['pizza' => ['id']]);
        
    }


    public function test_the_api_to_get_ingredients(): void
    {
        $response = $this->postJson('/api/v1/login', [
            "email" => "testjavier@dev.com",
            "password" => "12345678" 
        ]);

        $response->assertStatus(200);
        $token = $response->json('token');

        $protectedResponse = $this->withHeader('Authorization', 'Bearer '.$token)
                                ->getJson('/api/v1/ingredientes');

        $protectedResponse->assertStatus(200)
                        ->assertJsonCount(3)
                        ->assertJsonStructure([
                            '*' => ["name", "cantidad", "created_at", "updated_at"]
                        ]);
        
    }
}
