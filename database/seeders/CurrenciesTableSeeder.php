<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('currencies')->insert([
                ['name' => 'United States Dollar', 'code' => 'USD', 'symbol' => '$'],
                ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€'],
                ['name' => 'British Pound Sterling', 'code' => 'GBP', 'symbol' => '£'],
                ['name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥'],
                ['name' => 'Swiss Franc', 'code' => 'CHF', 'symbol' => 'CHF'],
                ['name' => 'Canadian Dollar', 'code' => 'CAD', 'symbol' => 'CA$'],
                ['name' => 'Australian Dollar', 'code' => 'AUD', 'symbol' => 'A$'],
                ['name' => 'New Zealand Dollar', 'code' => 'NZD', 'symbol' => 'NZ$'],
                ['name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥'],
                ['name' => 'Swedish Krona', 'code' => 'SEK', 'symbol' => 'kr'],
                ['name' => 'Norwegian Krone', 'code' => 'NOK', 'symbol' => 'kr'],
                ['name' => 'Danish Krone', 'code' => 'DKK', 'symbol' => 'kr'],
                ['name' => 'Russian Ruble', 'code' => 'RUB', 'symbol' => '₽'],
                ['name' => 'Indian Rupee', 'code' => 'INR', 'symbol' => '₹'],
                ['name' => 'Brazilian Real', 'code' => 'BRL', 'symbol' => 'R$'],
                ['name' => 'Mexican Peso', 'code' => 'MXN', 'symbol' => 'MX$'],
                ['name' => 'South African Rand', 'code' => 'ZAR', 'symbol' => 'R'],
                ['name' => 'Singapore Dollar', 'code' => 'SGD', 'symbol' => 'S$'],
                ['name' => 'Hong Kong Dollar', 'code' => 'HKD', 'symbol' => 'HK$'],
                ['name' => 'South Korean Won', 'code' => 'KRW', 'symbol' => '₩'],
                ['name' => 'Turkish Lira', 'code' => 'TRY', 'symbol' => '₺'],
                ['name' => 'Saudi Riyal', 'code' => 'SAR', 'symbol' => '﷼'],
                ['name' => 'United Arab Emirates Dirham', 'code' => 'AED', 'symbol' => 'د.إ'],
                ['name' => 'Israeli Shekel', 'code' => 'ILS', 'symbol' => '₪'],
                ['name' => 'Egyptian Pound', 'code' => 'EGP', 'symbol' => 'E£'],
                ['name' => 'Kenyan Shilling', 'code' => 'KES', 'symbol' => 'KSh'],
                ['name' => 'Nigerian Naira', 'code' => 'NGN', 'symbol' => '₦'],
                ['name' => 'Argentine Peso', 'code' => 'ARS', 'symbol' => 'AR$'],
                ['name' => 'Chilean Peso', 'code' => 'CLP', 'symbol' => 'CL$'],
                ['name' => 'Colombian Peso', 'code' => 'COP', 'symbol' => 'CO$'],
                ['name' => 'Philippine Peso', 'code' => 'PHP', 'symbol' => '₱'],
                ['name' => 'Pakistani Rupee', 'code' => 'PKR', 'symbol' => '₨'],
                ['name' => 'Bangladeshi Taka', 'code' => 'BDT', 'symbol' => '৳'],
                ['name' => 'Vietnamese Dong', 'code' => 'VND', 'symbol' => '₫'],
                ['name' => 'Thai Baht', 'code' => 'THB', 'symbol' => '฿'],
                ['name' => 'Indonesian Rupiah', 'code' => 'IDR', 'symbol' => 'Rp'],
                ['name' => 'Malaysian Ringgit', 'code' => 'MYR', 'symbol' => 'RM'],
                ['name' => 'Polish Zloty', 'code' => 'PLN', 'symbol' => 'zł'],
                ['name' => 'Czech Koruna', 'code' => 'CZK', 'symbol' => 'Kč'],
                ['name' => 'Hungarian Forint', 'code' => 'HUF', 'symbol' => 'Ft'],
                ['name' => 'Romanian Leu', 'code' => 'RON', 'symbol' => 'lei'],
                ['name' => 'Bulgarian Lev', 'code' => 'BGN', 'symbol' => 'лв'],
                ['name' => 'Icelandic Krona', 'code' => 'ISK', 'symbol' => 'kr'],
                ['name' => 'Croatian Kuna', 'code' => 'HRK', 'symbol' => 'kn'],
                ['name' => 'Serbian Dinar', 'code' => 'RSD', 'symbol' => 'дин'],
                ['name' => 'Ukrainian Hryvnia', 'code' => 'UAH', 'symbol' => '₴'],
                ['name' => 'Georgian Lari', 'code' => 'GEL', 'symbol' => '₾'],
                ['name' => 'Kazakhstani Tenge', 'code' => 'KZT', 'symbol' => '₸'],
                ['name' => 'Moroccan Dirham', 'code' => 'MAD', 'symbol' => 'DH'],
                ['name' => 'Tunisian Dinar', 'code' => 'TND', 'symbol' => 'د.ت'],
        ]);
    }
}