<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUmat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Umat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('nama_baptis')->nullable();
            $table->text('alamat');
            $table->string('no_telp')->nullable();
            $table->string('pekerjaan');
            $table->integer('status_meninggal');
            $table->integer('status_umat_aktif');
            
            $table->integer('keluarga_id')->unsigned();
            $table->integer('lingkungan_id')->unsigned()->nullable();
            $table->integer('paroki_id')->unsigned()->nullable();
            $table->foreign('keluarga_id')->references('id')->on('Keluarga');
            $table->foreign('lingkungan_id')->references('id')->on('Lingkungan');
            $table->foreign('paroki_id')->references('id')->on('Paroki');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Umat');
    }
}
