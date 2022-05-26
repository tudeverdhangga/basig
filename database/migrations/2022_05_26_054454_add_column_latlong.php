<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLatlong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('coordinate');
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('latitude')->after('image');
            $table->string('longitude')->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('coordinate');
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
}
