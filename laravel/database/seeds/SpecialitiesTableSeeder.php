<?php

use Illuminate\Database\Seeder;
use App\Specialities;
class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$speciality = new Specialities;
    	$speciality->title = "Kick Boxing";
    	$speciality->description = "anasadeel@golpik.com";
    	
    	$speciality->save();
        
     }
}
