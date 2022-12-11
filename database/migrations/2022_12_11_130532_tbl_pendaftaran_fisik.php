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
        Schema::create('tbl_pendaftaran_fisik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biodata_id');
            $table->string('tempat', 255)->nullable();
            $table->string('nopol', 100)->nullable();
            $table->string('no_rangka', 100)->nullable();
            $table->string('no_mesin', 100)->nullable();
            $table->string('file', 255)->nullable();
            $table->date('tanggal')->nullable();
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
        Schema::dropIfExists('tbl_pendaftaran_fisik');
    }
};
