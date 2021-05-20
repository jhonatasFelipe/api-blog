<?php

use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: jhonatas
 * Date: 21/11/2019
 * Time: 10:04
 */

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create();
    }
}