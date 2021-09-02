<?php

namespace Tests\Feature;

use App\User;
use AvoRed\Framework\Database\Models\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $customer = factory(User::class)->create(['password' => 'abcd1234']);
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


}
