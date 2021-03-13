<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_roles()
    {
        $this->actingAsAdmin();

        Role::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.roles.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_role_details()
    {
        $this->actingAsAdmin();

        $role = Role::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.roles.show', $role))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_roles_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.roles.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_role()
    {
        $this->actingAsAdmin();

        $rolesCount = Role::count();

        $response = $this->post(
            route('dashboard.roles.store'),
            Role::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $role = Role::all()->last();

        $this->assertEquals(Role::count(), $rolesCount + 1);

        $this->assertEquals($role->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_roles_edit_form()
    {
        $this->actingAsAdmin();

        $role = Role::factory()->create();

        $this->get(route('dashboard.roles.edit', $role))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_role()
    {
        $this->actingAsAdmin();

        $role = Role::factory()->create();

        $response = $this->put(
            route('dashboard.roles.update', $role),
            Role::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $role->refresh();

        $response->assertRedirect();

        $this->assertEquals($role->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_role()
    {
        $this->actingAsAdmin();

        $role = Role::factory()->create();

        $rolesCount = Role::count();

        $response = $this->delete(route('dashboard.roles.destroy', $role));

        $response->assertRedirect();

        $this->assertEquals(Role::count(), $rolesCount - 1);
    }

    /** @test */
    public function it_can_filter_roles_by_name()
    {
        $this->actingAsAdmin();

        Role::factory()->create([
            'name' => 'Foo',
        ]);

        Role::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.roles.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('roles.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
