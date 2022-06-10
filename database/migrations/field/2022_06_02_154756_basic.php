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
        Schema::create('field', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('degree_of_development');
            $table->string('polygon');
            $table->foreignId('licence_area_id')->nullable()->constrained('licence_area');
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
        Schema::dropIfExists('field');
    }
};
