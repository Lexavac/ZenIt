<?php

namespace Database\Seeders;

use App\Models\Tb_customer;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random = Str::random(10);

        DB::beginTransaction();

        try {
            $enchanter = Tb_customer::insert(array_merge([
                'username' => 'enchanter',
                        'password' => 'admin',
                        'is_admin' => '1',
                        'firstname' => 'Tomura',
                        'lastname' => 'Shigaraki',
                        'email' => 'lexa@admin.com',
                        'phoneNumber' => '0895351066695',
                        'adress' => 'tokyo',
                        'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                        'remember_token' => 'yokososakasama',
                        'google_id' => null,
            ]));

            $caster = Tb_customer::insert(array_merge([
                'username' => 'caster',
                        'password' => bcrypt('207'),
                        'is_admin' => true,
                        'firstname' => 'seller',
                        'lastname' => 'seller',
                        'email' => 'lexa@seller.com',
                        'phoneNumber' => '0895351066695',
                        'adress' => 'sky',
                        'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                        'remember_token' => $random
            ]));

            $warrior = Tb_customer::insert(array_merge([
                'username' => 'warrior',
                        'password' => bcrypt('207'),
                        'is_admin' => true,
                        'firstname' => 'customer',
                        'lastname' => 'customer',
                        'email' => 'lexa@gmail.com',
                        'phoneNumber' => '0895351066695',
                        'adress' => 'sky',
                        'created_at'=>  '2022-10-27 00:05:15',
                        'updated_at'=> '2022-10-27 00:05:15',
                        'remember_token' => $random
            ]));

            $role_enchanter = Role::create(['username' => 'enchanter']);
            $role_caster = Role::create(['username' => 'caster']);
            $role_warrior = Role::create(['username' => 'warrior']);

            $permission = Permission::create(['username' => 'read role']);
            $permission = Permission::create(['username' => 'create role']);
            $permission = Permission::create(['username' => 'update role']);
            $permission = Permission::create(['username' => 'delete role']);

            $enchanter->assignRole('enchanter');
            $caster->assignRole('pro');
            $warrior->assignRole('newbie');

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

        }

    }
}
