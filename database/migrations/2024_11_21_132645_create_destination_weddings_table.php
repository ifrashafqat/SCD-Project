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
    Schema::create('destination_weddings', function (Blueprint $table) {
        $table->id();
        $table->string('role');
        $table->string('bride_name');
        $table->string('groom_name');
        $table->string('address');
        $table->string('phone');
        $table->string('email');
        $table->date('event_date')->nullable();
        $table->string('season')->nullable();
        $table->integer('guest_count');
        $table->string('destination');
        $table->string('referral')->nullable();
        $table->string('specialist')->nullable();
        $table->text('additional_details')->nullable();
        $table->string('heard_about')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */

     
    public function down(): void
    {
        Schema::dropIfExists('destination_weddings');
    }
};
