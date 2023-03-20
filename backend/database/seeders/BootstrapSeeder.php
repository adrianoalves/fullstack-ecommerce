<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Image;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductProvider;
use Database\Seeders\Concerns\PrintsToCLI;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BootstrapSeeder extends Seeder
{
    use PrintsToCLI;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider = ProductProvider::find(1);
        $brazilianProductCollection = Http::products()->get( $provider->slug )->json();

        foreach ( $brazilianProductCollection as $product ) {
            $data = [
                'name' => $product['nome'],
                'product_id' => $product['id'], // product id from provider
            ];
            $values = [
                'category_id' => Category::query()->firstOrCreate(['name' => $product['categoria']])->id, // category
                'product_provider_id' => $provider->id, // department
                'department_id' => Department::query()->firstOrCreate(['name' => $product['departamento']])->id, // department
                'material_id' => Material::query()->firstOrCreate(['name' => $product['material']])->id, // material
                'description' => $product['descricao'],
                'price' => $product['preco'],
            ];

            $productModel = Product::query()->updateOrCreate($data, $values);
            $imageModel = Image::query()->updateOrCreate([ 'uri' => $product['imagem']]); // image

            $this->output("Brazilian ProductCollection added: {$productModel->name}");

            ProductImage::query()->updateOrCreate([
                'image_id' => $imageModel->id,
                'product_id' => $productModel->id,
            ]);
        }

        $provider = ProductProvider::find(2);
        $europeanProductCollection = Http::products()->get( $provider->slug )->json();

        foreach ( $europeanProductCollection as $product ) {
            $data = [
                'name' => $product['name'],
                'product_id' => $product['id'], // product id from provider
            ];
            $values = [
                'product_provider_id' => $provider->id, // department
                'material_id' => Material::query()->firstOrCreate( ['name' => $product['details']['material']] )->id, // material
                'description' => $product['description'],
                'price' => $product['price'],
            ];

            $productModel = Product::query()->updateOrCreate($data, $values);

            $productDetailsData = [
                'has_discount' => $product['hasDiscount'],
                'discount_value' => $product['discountValue'],
                'additional' => [
                    'adjective' => $product['details']['adjective']
                ]
            ];

            $productDetailModel = ProductDetails::query()->firstOrCreate(
                [ 'product_id' => $productModel->id ],
                $productDetailsData
            );

            $this->output("ProductCollection Details added for {$productModel->name}");

            foreach ( $product['gallery'] as $galleryImage ) {

                $imageModel = Image::query()->updateOrCreate( [ 'uri' => $galleryImage ] ); // image
                ProductImage::query()->updateOrCreate([
                    'image_id' => $imageModel->id,
                    'product_id' => $productModel->id,
                ]);
            }

            $this->output("European ProductCollection added: {$productModel->name}");
        }

    }
}
