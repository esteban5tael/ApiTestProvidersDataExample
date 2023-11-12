<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // proveedores

        for ($i = 1; $i <= 500; $i++) {

            Provider::create([
                'user_id' => rand(1, 2),
                'dni' => $i . ' - 123',
                'name' => $i . ' - Proveedor 0' . $i,
                'description' => $i . ' - Proveedor 0' . $i,
                'email' => 'Proveedor01@Proveedor01.com',
                'address' => 'Direccion Proveedor 01',
                'phone' => '123',
            ]);
        }
    }
}
