<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaveType::create([
            'name' => 'Annual Leave',
            'code' => 'ANNUAL',
            'max_per_year' => 25,
            'is_paid' => true,
        ]);

        LeaveType::create([
            'name' => 'Sick Leave',
            'code' => 'SICK',
            'max_per_year' => 10,
            'requires_document' => true,
            'is_paid' => true,
        ]);

        LeaveType::create([
            'name' => 'Unpaid Leave',
            'code' => 'UNPAID',
            'is_paid' => false,
        ]);
    }
}
