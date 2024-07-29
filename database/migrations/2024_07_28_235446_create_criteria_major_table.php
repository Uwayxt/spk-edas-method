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
        Schema::create('criteria_major', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('criteria_id');
            $table->unsignedBiginteger('major_id');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria_major');
    }
};
