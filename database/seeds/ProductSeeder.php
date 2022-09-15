<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<200; $i++){
            DB::table('products')->insert([
                'name' => Str::random(10),
                'type' => Str::random(10)
            ]);
        }
        
    }
}
