<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('spec_rows', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->integer('row_identifier');
            $table->unsignedBigInteger('spec_id');
            $table->string('priority')->default('0'); // Changed to string to allow letters
            $table->string('version')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('spec_id')->references('id')->on('specs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spec_rows');
    }
};
