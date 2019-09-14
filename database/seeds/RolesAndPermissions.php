<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit portfolios']);
        Permission::create(['name' => 'delete portfolios']);
        Permission::create(['name' => 'publish portfolios']);
        Permission::create(['name' => 'watch portfolios']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo('watch portfolios');

        // or may be done by chaining
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('edit portfolios');
        $role->givePermissionTo('publish portfolios');
        $role->givePermissionTo('watch portfolios');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
