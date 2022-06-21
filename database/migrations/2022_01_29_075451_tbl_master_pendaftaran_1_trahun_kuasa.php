<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMasterPendaftaran1TrahunKuasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pendaftaran_1_tahun_kuasa', function (Blueprint $table) {
            $table->id();
            // $table->string('jenis', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biodata_id');
            $table->string('nopol', 100)->nullable();
            $table->string('merk', 255)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('no_rangka', 100)->nullable();
            $table->string('no_mesin', 100)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('ktp', 255)->nullable();
            $table->string('pajak', 255)->nullable();
            $table->string('stnk', 255)->nullable();
            $table->string('bpkb', 255)->nullable();
            $table->string('surat_kuasa', 255)->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
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
        Schema::dropIfExists('tbl_master_pendaftaran_1_tahun_kuasa');
    }
}
