<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('campu_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 255)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->longText('palestrante')->nullable();
            $table->longText('publico')->nullable();
            $table->date('data')->nullable();
            $table->string('carga_horaria', 255)->nullable();
            $table->string('horario', 255)->nullable();
            $table->string('local', 255)->nullable();
            $table->string('local_url', 255)->nullable();
            $table->string('duracao', 255)->nullable();
            $table->string('capacidade', 255)->nullable();
            $table->string('recursos', 255)->nullable();
            $table->string('certificado', 255)->nullable();
            $table->string('certificado_url', 255)->default('certificado');
            $table->string('preview_url', 255)->default('preview');
            $table->string('token', 255)->nullable();
            $table->string('logo')->nullable();
            $table->enum('active_certficado', ["PUBLISHED","DRAFT"])->default('DRAFT');
            $table->enum('active', ["PUBLISHED","CANCELED","DRAFT"])->default('DRAFT');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
