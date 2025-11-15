<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('receivers', function (Blueprint $table) {
            $table->foreignId('id_sender')
                  ->after('id_receiver') // o donde prefieras
                  ->constrained('senders', 'id_sender')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('receivers', function (Blueprint $table) {
            $table->dropForeign(['id_sender']);
            $table->dropColumn('id_sender');
        });
    }
};
