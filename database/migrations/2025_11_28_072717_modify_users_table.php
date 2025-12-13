<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            // Hapus kolom lama
            $table->dropColumn('name');
            $table->dropTimestamps(); // menghapus created_at & updated_at

            // Tambah kolom baru
            $table->string('nama_depan');
            $table->string('nama_belakang');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // rollback
            $table->string('name');
            $table->timestamps();
            $table->dropColumn(['nama_depan', 'nama_belakang']);
        });
    }

};
