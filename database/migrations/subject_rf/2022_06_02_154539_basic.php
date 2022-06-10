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
        Schema::create('subject_rf', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('shortname');
            $table->foreignId('federal_district_id')->nullable()->constrained('federal_district');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_rf');
    }
};
