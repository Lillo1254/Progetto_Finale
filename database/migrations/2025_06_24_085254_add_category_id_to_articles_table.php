<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            
            if (!Schema::hasColumn('articles', 'category_id')) {
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
            } else {
                
                $foreignKeys = DB::select("
                    SELECT CONSTRAINT_NAME 
                    FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
                    WHERE TABLE_NAME = 'articles' 
                    AND COLUMN_NAME = 'category_id' 
                    AND CONSTRAINT_SCHEMA = DATABASE()
                ");

                if (empty($foreignKeys)) {
                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            if (Schema::hasColumn('articles', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
};