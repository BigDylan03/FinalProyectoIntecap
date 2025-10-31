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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->foreignId('id_sender')->constrained('senders', 'id_sender')->cascadeOnDelete();
            $table->foreignId('id_receiver')->constrained('receivers', 'id_receiver')->cascadeOnDelete();
            $table->foreignId('sending_account')->constrained('accounts', 'id_account')->cascadeOnDelete();
            $table->foreignId('paying_account')->constrained('accounts', 'id_account')->cascadeOnDelete();
            $table->foreignId('origination_state_id')->constrained('states', 'id_state')->cascadeOnDelete();
            $table->foreignId('destination_state_id')->constrained('states', 'id_state')->cascadeOnDelete();
            $table->decimal('send_amount', 10, 2);
            $table->decimal('charge', 10, 2)->default(0);
            $table->string('status', 20)->default('pendiente');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
