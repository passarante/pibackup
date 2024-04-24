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
        Schema::create('backup_transactions', function (Blueprint $table) {
            $table->id();
            $table->string("vkn");
            $table->string("db_name")->nullable();
            $table->string("file_name")->nullable();
            $table->string("backup_name");
            $table->string("type");
            $table->text("description")->nullable();
            $table->decimal("remaining_disk_space")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_transactions');
    }
};
