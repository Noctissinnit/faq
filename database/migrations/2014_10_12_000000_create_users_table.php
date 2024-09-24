<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // kolom id_user
            $table->string('name'); // kolom nama
            $table->string('email'); // kolom email
            $table->text('alamat')->nullable(); // kolom alamat
            $table->string('password'); // kolom password
            $table->enum('departements', ['jaringan', 'programming', 'technical_support']); 
            $table->string('telp', 15)->nullable(); // kolom telp dengan panjang maksimal 15 karakter
            $table->string('foto')->nullable(); // kolom foto, nullable jika tidak wajib
            $table->timestamps(); // kolom created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
