<?php

namespace Database\Seeders;

use App\Models\Enums\DefaultStatus;
use App\Models\ProductProvider;
use Database\Seeders\Concerns\PrintsToCLI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductProviderSeeder extends Seeder
{
    use PrintsToCLI;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider = ProductProvider::query()->updateOrCreate([
            'name' => 'Brazilian Provider'
        ]);

        if( $provider ) {
            $this->output("New ProductCollection Provider added: {$provider->name}", 'Provider');
        }
        $provider = ProductProvider::query()->updateOrCreate([
            'name' => 'European Provider'
        ]);

        if( $provider ) {
            $this->output("New ProductCollection Provider added: {$provider->name}", 'Provider');
        }
    }
}
