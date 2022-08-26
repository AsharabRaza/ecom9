<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_records = [
            'id'=>1, 'name'=>'Super Admin', 'type'=>'super_admin', 'vendor_id'=>0, 'mobile'=>'03164665195', 'email'=>'asharab@gamil.com'
            , 'password'=>'$2a$04$2yWugw5aFOqDKhvYkSRjEO3TC6iUe2ln6IHKaplKxu3re2UiaElme', 'image'=>'', 'status'=>1
        ];
        Admin::insert($admin_records);
    }
}
