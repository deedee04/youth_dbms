<?php

use Illuminate\Database\Seeder;

class ModelHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->insert([
            [
                'permission_id' => 5,
                'model_type' => 'App\User',
                'model_id' => 1
            ],
            [
                'permission_id' => 7,
                'model_type' => 'App\User',
                'model_id' => 2
            ],
        ]);
    }
}
