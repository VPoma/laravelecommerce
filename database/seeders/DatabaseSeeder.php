<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('products');
        Storage::disk('public')->makeDirectory('products');
        /*
        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');
        */
        
        // User::factory(10)->create();

        User::factory()->create([
           'name' => 'Victor Poma',
           'email' => 'victor@poma.com',
           'password' => bcrypt('victorpoma'),
        ]);

        $this->call([
            FamilySeeder::class,
        ]);
        
        /*Product::factory(150)->create();*/

        // Asegurar que la carpeta exista
        Storage::disk('public')->makeDirectory('products');

        // Creamos los productos
        Product::factory(150)->create()->each(function ($product) {
            try {
                // Descargamos una imagen real
                $imageContent = Http::get('https://picsum.photos/640/480')->body();
                
                // Extraemos el nombre del archivo del path generado por el factory
                $filename = basename($product->image_path);
                
                // Guardamos el archivo físico en storage/app/public/products/
                Storage::disk('public')->put('products/' . $filename, $imageContent);
            } catch (\Exception $e) {
                // Si falla la descarga, al menos no se detiene el seeder
                dump("No se pudo descargar la imagen para: " . $product->name);
            }
        });

    }
}
