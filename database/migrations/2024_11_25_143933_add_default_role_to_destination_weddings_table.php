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
    Schema::table('destination_weddings', function (Blueprint $table) {
        $table->string('role')->default('bride')->change();
    });
}

public function down()
{
    Schema::table('destination_weddings', function (Blueprint $table) {
        $table->string('role')->nullable()->change();  // or whatever the original setting was
    });
}

};
