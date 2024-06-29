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
        Schema::table('antrians', function (Blueprint $table) {
            $table->string('status')->default('waiting'); // Add default status
        });
    }

    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
