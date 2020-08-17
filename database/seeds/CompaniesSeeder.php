<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name'=> 'Empresa 1',
            'address' => 'Dirección 1',
            'rfc' => 'abcdefghijrtf',
            'email' => 'empresa1@empresa.com'
        ]);
    }
}
