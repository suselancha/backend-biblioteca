<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'api','name' => 'register_rol']);
        Permission::create(['guard_name' => 'api','name' => 'list_rol']);
        Permission::create(['guard_name' => 'api','name' => 'edit_rol']);
        Permission::create(['guard_name' => 'api','name' => 'delete_rol']);

        Permission::create(['guard_name' => 'api','name' => 'register_book']);
        Permission::create(['guard_name' => 'api','name' => 'list_book']);
        Permission::create(['guard_name' => 'api','name' => 'edit_book']);
        Permission::create(['guard_name' => 'api','name' => 'delete_book']);
        Permission::create(['guard_name' => 'api','name' => 'profile_book']);

        // Permission::create(['guard_name' => 'api','name' => 'register_patient']);
        // Permission::create(['guard_name' => 'api','name' => 'list_patient']);
        // Permission::create(['guard_name' => 'api','name' => 'edit_patient']);
        // Permission::create(['guard_name' => 'api','name' => 'delete_patient']);
        // Permission::create(['guard_name' => 'api','name' => 'profile_patient']);

        // Permission::create(['guard_name' => 'api','name' => 'register_staff']);
        // Permission::create(['guard_name' => 'api','name' => 'list_staff']);
        // Permission::create(['guard_name' => 'api','name' => 'edit_staff']);
        // Permission::create(['guard_name' => 'api','name' => 'delete_staff']);

        // Permission::create(['guard_name' => 'api','name' => 'register_appointment']);
        // Permission::create(['guard_name' => 'api','name' => 'list_appointment']);
        // Permission::create(['guard_name' => 'api','name' => 'edit_appointment']);
        // Permission::create(['guard_name' => 'api','name' => 'delete_appointment']);

        // Permission::create(['guard_name' => 'api','name' => 'register_specialty']);
        // Permission::create(['guard_name' => 'api','name' => 'list_specialty']);
        // Permission::create(['guard_name' => 'api','name' => 'edit_specialty']);
        // Permission::create(['guard_name' => 'api','name' => 'delete_specialty']);

        // Permission::create(['guard_name' => 'api','name' => 'show_payment']);
        // Permission::create(['guard_name' => 'api','name' => 'edit_payment']);

        // Permission::create(['guard_name' => 'api','name' => 'activitie']);
        // Permission::create(['guard_name' => 'api','name' => 'calendar']);

        // Permission::create(['guard_name' => 'api','name' => 'expense_report']);
        // Permission::create(['guard_name' => 'api','name' => 'invoice_report']);

        // Permission::create(['guard_name' => 'api','name' => 'settings']);


        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'api','name' => 'socio']);
        $role1->givePermissionTo('list_book');
        $role1->givePermissionTo('profile_book');

        // $role2 = Role::create(['guard_name' => 'api','name' => 'admin']);
        // $role2->givePermissionTo('publish articles');
        // $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['guard_name' => 'api','name' => 'administrador']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
             'name' => 'Socio 1',
             'surname' => 'Socio 1',
             'email' => 'dominiolibre@gmail.com',
             'password' => bcrypt('12345678'),
             'dni' => '27493492'
        ]);
        $user->assignRole($role1);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'surname' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'dni' => '47813213'
        ]);
        $user->assignRole($role3);
    }
}