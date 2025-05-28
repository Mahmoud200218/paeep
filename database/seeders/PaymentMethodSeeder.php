<?php

namespace Database\Seeders;

use App\Models\Payments\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Visa',
            'slug' => 'visa',
            'description' => 'Visa Payment description for payment method',
            'icon' => 'Visa Payment',
            'status' => 'active',
            'options' => [
                'publishable_key' => '',
                'secret_key' => '',
            ]
        ]);
    }
}
