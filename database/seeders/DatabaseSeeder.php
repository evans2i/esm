<?php

namespace Database\Seeders;

use AttendanceStatusSeeder;
use BedStatusSeeder;
use BookStatusSeeder;
use DaySeeder;
use Illuminate\Database\Seeder;
use MonthSeeder;
use PaymentMethodSeeder;
use StudentStatusSeeder;
use TimeZoneTableSeeder;
use YearSeeder;

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
        $this->call(AttendanceStatusSeeder::class);
        $this->call(BookStatusSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(MonthSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(BedStatusSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(TimeZoneTableSeeder::class);
        // $this->call(AccountCategorySeeder::class);
        // $this->call(TransactionLedgerSeeder::class);
        // $this->call(CertificateTemplateSeeder::class);
        // $this->call(CustomerStatusSeeder::class);
    }
}
