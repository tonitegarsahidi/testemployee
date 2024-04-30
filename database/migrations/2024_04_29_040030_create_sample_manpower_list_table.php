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
        Schema::create('SampleManpowerList', function (Blueprint $table) {
            $table->id();
            $table->string('nric4Digit');
            $table->string('name');
            $table->string('manpowerId');
            $table->string('designation');
            $table->string('project');
            $table->string('team');
            $table->string('supervisor');
            $table->date('joinDate');
            $table->date('resignDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SampleManpowerList');
    }
};
