<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_deals', function (Blueprint $table) {

            $table->id();
            $table->integer('company_id');
            $table->string('title');
            $table->text('description');
            $table->text('banner'); // s3 bucket or CDN URL
            $table->double('price'); // deal price
            $table->string('currency'); // read from company if not available then get from user
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            // $table->string('services');
            $table->boolean('status')->default(true);

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
        Schema::dropIfExists('companies_deals');
    }
}
