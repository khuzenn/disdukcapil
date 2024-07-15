<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_called_count_to_antrians_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCalledCountToAntriansTable extends Migration
{
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->integer('called_count')->default(0);
        });
    }

    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropColumn('called_count');
        });
    }
}
