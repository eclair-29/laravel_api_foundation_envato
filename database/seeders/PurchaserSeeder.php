<?php

namespace Database\Seeders;

use App\Models\Purchaser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Purchaser::factory()
            ->count(25)
            ->hasInvoices(10)
            ->create();

        Purchaser::factory()
            ->count(100)
            ->hasInvoices(5)
            ->create();

        Purchaser::factory()
            ->count(10)
            ->create();
    }
}
