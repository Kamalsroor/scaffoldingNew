<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    /** @test */
    public function it_can_display_list_of_customers()
    {
        $this->actingAsAdmin();

        Customer::factory()->create(['name' => 'Kamel']);

        $response = $this->get(route('dashboard.customers.index'));

        $response->assertSuccessful();

        $response->assertSee('Kamel');
    }

    /** @test */
    public function it_can_display_customer_details()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create(['name' => 'Kamel']);

        $response = $this->get(route('dashboard.customers.show', $customer));

        $response->assertSuccessful();

        $response->assertSee('Kamel');
    }

    /** @test */
    public function it_can_display_customer_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('customers.actions.create'));
    }

    /** @test */
    public function it_can_create_customers()
    {
        $this->actingAsAdmin();

        $customersCount = Customer::count();

        $response = $this->postJson(
            route('dashboard.customers.store'),
            Customer::factory()->raw([
                'name' => 'Customer',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount + 1);
    }

    /** @test */
    public function it_can_display_customer_edit_form()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->get(route('dashboard.customers.edit', $customer));

        $response->assertSuccessful();

        $response->assertSee(trans('customers.actions.edit'));
    }

    /** @test */
    public function it_can_update_customers()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->put(
            route('dashboard.customers.update', $customer),
            Customer::factory()->raw([
                'name' => 'Customer',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $customer->refresh();

        $this->assertEquals($customer->name, 'Customer');
    }

    /** @test */
    public function it_can_delete_customer()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $customersCount = Customer::count();

        $response = $this->delete(route('dashboard.customers.destroy', $customer));
        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount - 1);
    }

    /** @test */
    public function it_can_filter_customers_by_name()
    {
        $this->actingAsAdmin();

        Customer::factory()->create(['name' => 'Kamel']);

        Customer::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.customers.index', [
            'name' => 'kamal',
        ]))
            ->assertSuccessful()
            ->assertSee('Kamel')
            ->assertDontSee('Mohamed');
    }

    /** @test */
    public function it_can_filter_customers_by_email()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name' => 'FooBar1',
            'email' => 'user1@demo.com',
        ]);

        Customer::factory()->create([
            'name' => 'FooBar2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.customers.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }

    /** @test */
    public function it_can_filter_customers_by_phone()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name' => 'FooBar1',
            'phone' => '123',
        ]);

        Customer::factory()->create([
            'name' => 'FooBar2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.customers.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }
}
