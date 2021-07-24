<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('purpose_categories', 'propose_categories');
        Schema::rename('purpose_services', 'propose_services');
        Schema::rename('purpose_brands', 'propose_brands');

        Schema::dropIfExists('purpose_categories');
        Schema::dropIfExists('purpose_services');
        Schema::dropIfExists('purpose_brands');
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
