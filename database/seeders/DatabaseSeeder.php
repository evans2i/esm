<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(StudentStatusSeeder::class);
        $this->call(GeneralSettingSeeder::class);
        $this->call(BookStatusSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(MonthSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(BedStatusSeeder::class);
        $this->call(PaymentMethodSeeder::class);
    }
}
