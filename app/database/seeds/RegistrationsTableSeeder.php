<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registrations')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'name' =>'テスト商品',
            'amount' => 10000,
            'memo' => 'test',
            'image' =>100,
            'comments' => 'test',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),

        ]);
    }
}
