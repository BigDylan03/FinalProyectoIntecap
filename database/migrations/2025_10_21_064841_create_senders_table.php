<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('senders', function (Blueprint $table) {
        $table->id('id_sender');
        $table->string('first_name', 50);
        $table->string('middle_name', 50)->nullable();
        $table->string('paternal_name', 50);
        $table->string('maternal_name', 50)->nullable();
        $table->string('phone', 15);
        $table->string('email', 100)->unique();
        $table->foreignId('id_state')->constrained('states', 'id_state')->cascadeOnDelete();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senders');
    }
};
