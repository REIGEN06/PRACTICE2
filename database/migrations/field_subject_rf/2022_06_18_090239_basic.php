<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_subject_rf', function (Blueprint $table) {
            $table->foreignId('field_id')->nullable()->constrained('field');
            $table->foreignId('subject_rf_id')->nullable()->constrained('subject_rf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_subject_rf');
    }
};
