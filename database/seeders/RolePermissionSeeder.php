<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected array $resources = [
        'sanpham',
        'categories',
        'thuonghieu',
        'bienthe',
        'users',
    ];

    protected array $actions = [
        'viewAny',
        'view',
        'create',
        'update',
        'delete',
    ];
    public function run(): void
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Tạo tất cả permissions
        $this->createPermissions();

        // Tạo roles
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $customer = Role::create(['name' => 'customer']);

        // Super Admin có tất cả quyền
        $superAdmin->givePermissionTo(Permission::all());

        // Admin có quyền quản lý sản phẩm, categories, thuonghieu, bienthe
        $admin->givePermissionTo([
            'viewAny.sanpham',
            'view.sanpham',
            'create.sanpham',
            'update.sanpham',
            'delete.sanpham',
            'viewAny.categories',
            'view.categories',
            'create.categories',
            'update.categories',
            'delete.categories',
            'viewAny.thuonghieu',
            'view.thuonghieu',
            'create.thuonghieu',
            'update.thuonghieu',
            'delete.thuonghieu',
            'viewAny.bienthe',
            'view.bienthe',
            'create.bienthe',
            'update.bienthe',
            'delete.bienthe',
            // 'viewAny.orders',
            // 'view.orders',
            // 'update.orders',
            'viewAny.users',
            'view.users',
        ]);

        // Editor chỉ có quyền xem và chỉnh sửa sản phẩm
        $editor->givePermissionTo([
            'viewAny.sanpham',
            'view.sanpham',
            'create.sanpham',
            'update.sanpham',
            'viewAny.categories',
            'view.categories',
            'viewAny.thuonghieu',
            'view.thuonghieu',
            'viewAny.bienthe',
            'view.bienthe',
        ]);

        // Customer chỉ xem sản phẩm và quản lý orders của mình
        // $customer->givePermissionTo([
        //     'viewAny.sanpham',
        //     'view.sanpham',
        //     'viewAny.orders',
        //     'view.orders',
        // ]);

        // Tạo users mẫu
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminUser->assignRole('super-admin');

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole('admin');

        $editorUser = User::create([
            'name' => 'Editor User',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $editorUser->assignRole('editor');

        $customerUser = User::create([
            'name' => 'Customer User',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $customerUser->assignRole('customer');

        $this->command->info('Roles, Permissions và Users đã được tạo!');
        $this->command->info('Super Admin: superadmin@gmail.com / password');
        $this->command->info('Admin: admin@gmail.com / password');
        $this->command->info('Editor: editor@gmail.com / password');
        $this->command->info('Customer: customer@gmail.com / password');
    }

    protected function createPermissions(): void
    {
        foreach ($this->resources as $resource) {
            foreach ($this->actions as $action) {
                Permission::create([
                    'name' => "{$action}.{$resource}",
                    'guard_name' => 'web',
                ]);
            }
        }

        $this->command->info('✓ Đã tạo ' . (count($this->resources) * count($this->actions)) . ' permissions');
    }
}
