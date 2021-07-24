<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('name'); // e.g. AED / USD / SAR / PKR etc
            $table->string('email')->unique();
            $table->text('address');
            $table->text('phone_number')->nullable();
            $table->text('whatsapp_number')->nullable();
            $table->text('working_hours')->nullable(); // will store weekly office hours in json or serialize format// s3 bucket URL
            $table->text('image')->nullable(); // s3 bucket or CDN URL
            $table->text('start_time')->nullable();
            $table->text('end_time')->nullable();
            $table->text('services')->nullable();
            $table->enum('designation', ['manager','employee']);
            $table->boolean('status')->default(true); // will store true / false (by default true);

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
        Schema::dropIfExists('employees');
    }
}
