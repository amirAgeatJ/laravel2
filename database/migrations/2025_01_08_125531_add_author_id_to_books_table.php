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
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->constrained()->onDelete('set null')->after('id');

            // Supprimer la colonne 'author' si elle existe
            if (Schema::hasColumn('books', 'author')) {
                $table->dropColumn('author');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Restaurer la colonne 'author' si elle a été supprimée
            if (!Schema::hasColumn('books', 'author')) {
                $table->string('author')->nullable()->after('id');
            }

            // Supprimer la clé étrangère et la colonne 'author_id'
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
};
