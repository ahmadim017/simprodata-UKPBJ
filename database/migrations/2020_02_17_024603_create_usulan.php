<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nousul');
            $table->string('namapaket');
            $table->date('tglterima');
            $table->integer('pagu');
            $table->integer('hps');
            $table->string('ta');
            $table->string('sumberdana');
            $table->integer('id_opd')->nullable();
            $table->string('kategori');
            $table->string('jangkawaktu');
            $table->string('mak');
            $table->string('usul');
            $table->string('file_usulan');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();

            $table->foreign('id_opd')->references('id')->on('opd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulan');
    }
}
