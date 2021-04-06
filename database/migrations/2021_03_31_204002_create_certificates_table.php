<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('texto_1')->default('Certificamos que');
            $table->string('texto_2')->default('participou do evento intitulado');
            $table->string('texto_3')->default('na Universidade .......... com');
            $table->string('texto_4');
            $table->string('texto_5');
            $table->string('carga_horaria', 255)->nullable();
            $table->string('assinatura_1_imagem', 255)->nullable();
            $table->string('assinatura_1_nome', 255)->nullable();
            $table->string('assinatura_1_texto', 255)->nullable();
            $table->string('assinatura_2_imagem', 255)->nullable();
            $table->string('assinatura_2_nome', 255)->nullable();
            $table->string('assinatura_2_texto', 255)->nullable();
            $table->string('assinatura_3_imagem', 255)->nullable();
            $table->string('assinatura_3_nome', 255)->nullable();
            $table->string('assinatura_3_texto', 255)->nullable();
            $table->enum('empresa_logo', ["YES","NO"]);
            $table->enum('evento_logo', ["YES","NO"]);
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
        Schema::dropIfExists('certificates');
    }
}
