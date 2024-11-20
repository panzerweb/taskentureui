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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('priority_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
<<<<<<< Updated upstream
                // Dropping the foreign key column
                $table->dropForeign(['priority_id']);
                $table->dropColumn('priority_id');
            });
=======
            // Dropping the foreign key and column
            $table->dropForeign(['priority_id']);
            $table->dropColumn('priority_id');
        });
>>>>>>> Stashed changes
    }
};
