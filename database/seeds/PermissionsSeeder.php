<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            DB::table('permissions')->insert([
               ['name'=>'can create youth','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can create organization','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can create partners','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can create user','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'super admin','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can send mail','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can view','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
               ['name'=>'can create community engagement','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ]);
        
        
    }
}
