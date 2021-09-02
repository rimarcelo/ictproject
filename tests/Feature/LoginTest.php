<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use AvoRed\Framework\Database\Models\Customer;
use Laravel\Dusk\Browser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $password = 'testpassword';
        $customer = factory(Customer::class)->create(['password' => $password]);

        $this->browse(function (Browser $browser) use ($customer, $password) {
            $email = $customer->email;
            $browser->visit('/login')
                    // ->assertSee(__('avored.pages.login.title'))
                    ->type('#email', $email)
                    ->type('#password', $password)
                    ->press(__('avored.btn.sign_in'));
            $firstName = $customer->first_name;
            $lastName = $customer->last_name;
            $browser->visit('/account')
                    ->assertSee($firstName)
                    ->assertSee($lastName)
                    ;
        });
    }
}
