<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_diagnose');
            $table->string('tanggal_diagnosis');
            $table->string('hasil_diagnosis');
            $table->string('persentase_diagnosis');
            $table->string('status_pasien');

            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('id_diagnose')->references('id')->on('diagnosees')->onDelete('cascade');
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
        Schema::dropIfExists('histories');
    }
}
