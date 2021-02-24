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
        $this->call(\StudentStatusSeeder::class);
        $this->call(\AttendanceStatusSeeder::class);
        $this->call(\BookStatusSeeder::class);
        $this->call(\YearSeeder::class);
        $this->call(\MonthSeeder::class);
        $this->call(\DaySeeder::class);
        $this->call(\BedStatusSeeder::class);
        // $this->call(AlertSettingSeeder::class);
        // $this->call(SmsTableSeeder::class);
//        $this->call(\MeetingTableSeeder::class);
        $this->call(\PaymentMethodSeeder::class);
        // $this->call(PaymentTableSeeder::class);
        $this->call(\TimeZoneTableSeeder::class);
        // $this->call(AccountCategorySeeder::class);
        // $this->call(TransactionLedgerSeeder::class);
        // $this->call(CertificateTemplateSeeder::class);
        // $this->call(CustomerStatusSeeder::class);
    }
}
