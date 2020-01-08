<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePagesTableAddMetaData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add meta data
        //also add page url... for routing. 
        Schema::table('pages', function (Blueprint $table) {
            $table->string('meta_title', 200)->nullable();
            $table->string('meta_description', 200)->nullable();
            $table->string('page_url', 200)->nullable();
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
