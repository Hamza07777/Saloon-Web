<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->string('currency'); // e.g. AED / USD / SAR / PKR etc
            // $table->string('brand');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->text('phone_number')->nullable();
            $table->text('whatsapp_number')->nullable();
            $table->text('rating')->nullable();
            $table->text('total_reviews')->nullable();
            $table->text('latitude');
            $table->text('longitude');
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->text('business_hours')->nullable(); // will store weekly office hours in json or serialize format
            $table->text('license_path')->nullable(); // s3 bucket URL
            $table->text('logo_path')->nullable(); // s3 bucket or CDN URL
            $table->boolean('status')->default(true); // will store true / false (by default true);
            $table->enum('saloon_type', ['women','men','unisex']);
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
        Schema::dropIfExists('companies');
    }
}
