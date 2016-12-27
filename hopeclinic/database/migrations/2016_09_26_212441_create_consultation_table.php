<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('complaints')->nullable();
            $table->text('tests')->nullable();
            $table->float('weight');
            $table->float('temperature');
            $table->float('bp');
            $table->boolean('HIVStatus');
            $table->boolean('insurance');
            
            $table->integer('patient_id')->unsigned()->index();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
