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
        Schema::create('field_licence_area', function (Blueprint $table) {
            $table->foreignId('field_id')->nullable()->constrained('field');
            $table->foreignId('licence_area_id')->nullable()->constrained('licence_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_licence_area');
    }
};
