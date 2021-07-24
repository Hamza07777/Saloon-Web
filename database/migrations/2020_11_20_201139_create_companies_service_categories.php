<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesServiceCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_service_categories', function (Blueprint $table) {

            $table->id();
            $table->integer('company_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable(); // s3 bucket or CDN image URL
            $table->boolean('status')->default(true); // will store true / false

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies_service_categories');
    }
}
