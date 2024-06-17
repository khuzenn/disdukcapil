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
            // Add the purpose_id column if it doesn't exist
            if (!Schema::hasColumn('antrians', 'purpose_id')) {
                $table->unsignedBigInteger('purpose_id');
            }

            // Add the foreign key constraint
            $table->foreign('purpose_id')->references('id')->on('purposes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['purpose_id']);
            
            // Then drop the column if it exists
            if (Schema::hasColumn('antrians', 'purpose_id')) {
                $table->dropColumn('purpose_id');
            }
        });
    }
};
