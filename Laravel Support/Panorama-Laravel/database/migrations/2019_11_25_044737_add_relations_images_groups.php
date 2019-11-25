<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsImagesGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_images', function (Blueprint $table) {
            $table->integer('group_id')->length(10)->nullable()->unsigned();
            $table->foreign('group_id')->references('id')->on('tbl_groups_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_images', function (Blueprint $table) {   
            $table->dropForeign('tbl_images_group_id_foreign');
            $table->dropColumn('group_id');
        });
    }
}
