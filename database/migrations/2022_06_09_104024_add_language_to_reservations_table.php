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
        Schema::connection('mysql_sloow')->table('reservations', function (Blueprint $table) {
            $table->string('language')->after('other_info')->default('lu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_sloow')->table('reservations', function (Blueprint $table) {
            $table->dropColumn('language');
        });
    }
};
