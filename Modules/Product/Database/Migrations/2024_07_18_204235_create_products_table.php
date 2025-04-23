<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('uuid');
            $table->string('code')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('warranty')->nullable();
            $table->integer('tax_id')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('points')->nullable();
            $table->string('alternate_code')->nullable();
            $table->string('location')->nullable();
            $table->string('bulk_code')->nullable();
            $table->string('alert')->nullable();
            $table->string('observations')->nullable();
            $table->string('use_profitability')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('enabled')->nullable();
            $table->string('enabled_add_to_cart')->nullable();
            $table->string('offer')->nullable();
            $table->string('hot')->nullable();
            $table->integer('rating_count')->nullable();

            //relaciones
            $table->integer('unit_of_measure_id')->nullable()->index('unit_of_measure_id');
            $table->integer('category_id')->nullable()->index('category_id');
            $table->integer('sub_category_id')->nullable()->index('sub_category_id');
            $table->integer('brand_id')->nullable()->index('brand_id');
            $table->integer('supplier_id')->nullable()->index('supplier_id');
            $table->integer('product_combo_id')->nullable();

            //stock
            $table->integer('stock_base_unit')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->integer('stock_units_per_item')->nullable();
            $table->integer('stock_total')->nullable();
            $table->integer('stock_critical_level')->nullable();

            // Precios en USD
            $table->decimal('cost_price_usd_ex_tax', 15, 2)->nullable();
            $table->decimal('cost_price_usd_in_tax', 15, 2)->nullable();
            $table->decimal('sale_price_usd_ex_tax', 15, 2)->nullable();
            $table->decimal('sale_price_usd_in_tax', 15, 2)->nullable();
            $table->decimal('crossed_out_price_usd', 15, 2)->nullable();

            // Precios en Pesos
            $table->decimal('cost_price_pesos_ex_tax', 15, 2)->nullable();
            $table->decimal('cost_price_pesos_in_tax', 15, 2)->nullable();
            $table->decimal('sale_price_pesos_ex_tax', 15, 2)->nullable();
            $table->decimal('sale_price_pesos_in_tax', 15, 2)->nullable();
            $table->decimal('crossed_out_price_pesos', 15, 2)->nullable();

            //descuentos
            $table->decimal('discount', 15, 2)->nullable();

            $table->integer('sort_order')->nullable();
            $table->tinyInteger('is_protected')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
