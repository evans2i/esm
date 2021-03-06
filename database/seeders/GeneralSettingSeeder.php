<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'last_updated_by' => 1,
                'institute' => 'Evan School',
                'salogan' =>'Performance Depend On Good Education and Love From Parents and Teachers',
                'moto' => 'Education For Future Generation',
                'vision' => 'Bring Quality and Better Generation With Fear OF God',
                'mission' => 'Exciting Are Coming Soon! Just Demo',
                'about' =>'We really excited to tell you this In our School Success is not Option All of Our Student every Year They Went Far In Education',
                'status' => 1,
                'owner' => 'Evans Mwakalonge',
                'long' => 120,
                'lat' => 210,
                'location' => "Dodoma",
                'copyright' => 'All copyright Reserved',
                'address' => 'Where You are',
                'phone' => "(New) 780 097 896",
                'email' => 'emailme@app.em',
                'website' => 'http://kalonge.herokuapp.com',
                'favicon' => '',
                'logo' => '/organization/logo.jpg',
                'type' => 'secondary',
                'facebook' => '#',
                'twitter' => '#',
                'linkedIn' => '#',
                'youtube' => '#',
                'googlePlus' => '#',
                'instagram' => '#',
                'whatsApp' => 'to be added',
                'public_registration' => 0
            ],
        ]);
    }
}
