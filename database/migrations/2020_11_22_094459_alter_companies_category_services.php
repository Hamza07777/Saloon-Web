<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesCategoryServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies_category_services', function (Blueprint $table) {

            $table->integer('service_id')->after('category_id');

            $table->dropColumn('name');
            $table->dropColumn('description')->nullable();
            $table->dropColumn('image'); // s3 bucket or CDN URL

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
