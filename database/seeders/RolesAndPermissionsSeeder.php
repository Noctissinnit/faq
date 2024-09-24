<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $staff = Role::create(["name" => "staff"]);
        $manager = Role::create(["name" => "manager"]);
        $admin = Role::create(["name" => "admin"]);

        // Permissions
        $createArticlePermission = Permission::create([
            "name" => "create_article",
        ]);
        $readArticlePermission = Permission::create(["name" => "read_article"]);
        $editArticlePermission = Permission::create(["name" => "edit_article"]);
        $deleteArticlePermission = Permission::create([
            "name" => "delete_article",
        ]);

        // Staff Permissions
        $staff->givePermissionTo($readArticlePermission);

        // Manager Permissions
        $manager->givePermissionTo(
            $createArticlePermission,
            $readArticlePermission,
            $editArticlePermission,
            $deleteArticlePermission
        );

        // Admin Permissions
        $admin->givePermissionTo(
            $createArticlePermission,
            $readArticlePermission,
            $editArticlePermission,
            $deleteArticlePermission
        );
    }
}
