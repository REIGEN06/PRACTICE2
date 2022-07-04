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
        Schema::create('licence', function (Blueprint $table) {
            $table->id();
            $table->string('series');
            $table->string('number');
            $table->string('view');
            $table->date('date_of_receiving');
            $table->date('date_of_expiration');
            $table->date('date_of_annulment');
            $table->text('polygon')->nullable();
            $table->foreignId('previous_licence_id')->nullable()->constrained('licence');
            $table->foreignId('subsoil_user_id')->nullable()->constrained('subsoil_user');
            $table->foreignId('licence_area_id')->nullable()->constrained('licence_area');
            $table->foreignId('type_of_main_mineral_id')->nullable()->constrained('type_of_main_mineral');
            $table->foreignId('licence_condition_id')->nullable()->constrained('licence_condition');
            $table->foreignId('licence_status_id')->nullable()->constrained('licence_status');
            $table->foreignId('licence_author_id')->nullable()->constrained('licence_author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licence');
    }
};
