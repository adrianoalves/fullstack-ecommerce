<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'products';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id')->nullable(false)->comment('product id from provider');
            $table->foreignIdFor(\App\Models\ProductProvider::class);
            $table->foreignIdFor(\App\Models\Material::class);
            $table->foreignIdFor(\App\Models\Category::class)->nullable();
            $table->foreignIdFor(\App\Models\Department::class)->nullable();
            $table->string('name', 40)->nullable(false);
            $table->string('description', 512)->nullable(false);
            $table->unsignedDecimal('price', 8, 2);
            $table->enum('status', \App\Models\Enums\DefaultStatus::values())->default(\App\Models\Enums\DefaultStatus::ACTIVE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
