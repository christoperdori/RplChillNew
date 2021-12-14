<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('status');
            $table->date('tanggal')->nullable();
            $table->string('surat')->nullable();
            $table->string('pesan')->nullable();
            $table->unsignedbigInteger('id_surat');
            $table->foreign('id_surat')->references('id')->on('suratkeluar')->onDelete('CASCADE');
            $table->unsignedbigInteger('id_dosen')->nullable();
            $table->foreign('id_dosen')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('suratmasuk');
    }
}
