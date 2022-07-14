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
        Schema::create('tbl_surat_kuasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biodata_id');
            $table->string('nama1', 255)->nullable();
            $table->string('nama2', 255)->nullable();
            $table->string('nama3', 255)->nullable();
            $table->string('no1', 255)->nullable();
            $table->string('no2', 255)->nullable();
            $table->string('tempat_lahir1', 255)->nullable();
            $table->string('tempat_lahir2', 255)->nullable();
            $table->date('tanggal_lahir1')->nullable();
            $table->date('tanggal_lahir2')->nullable();
            $table->string('no_hp1', 255)->nullable();
            $table->string('no_hp2', 255)->nullable();
            $table->string('alamat1', 255)->nullable();
            $table->string('alamat2', 255)->nullable();
            $table->string('nopol', 255)->nullable();
            $table->string('merk', 255)->nullable();
            $table->string('no_rangka', 255)->nullable();
            $table->string('no_mesin', 255)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('biodata_id')->references('id')->on('tbl_biodata')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_master_surat_kuasa');
    }
};
