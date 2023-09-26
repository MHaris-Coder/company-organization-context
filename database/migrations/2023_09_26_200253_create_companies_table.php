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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_group_id')->nullable()
                ->constrained('company_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('location_id')->nullable()
                ->constrained('locations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
