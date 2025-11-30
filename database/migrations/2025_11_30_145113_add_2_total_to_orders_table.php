<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->integer('total_days')->default(0)->after('rent_date_end');
        $table->integer('total_price')->default(0)->after('total_days');
    });
}

public function down()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->dropColumn(['total_days', 'total_price']);
    });
}

};
