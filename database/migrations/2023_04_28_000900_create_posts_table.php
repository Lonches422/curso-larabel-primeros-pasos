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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//id de la tabla
            $table->string("title", 500)->nullable();//titulo de la tabla
            $table->text("description")->nullable();//descripcion de la tabla
            $table->string("slug", 500)->nullable();//la url
            $table->text("content")->nullable();//el contenido. Este no se va a limitar, puede ser muy largo
            $table->string("image")->nullable();//la imagen, esta tampoco se limita porque sabra Dios cuantas letras son para la base64 xDDDD
            $table->enum("posted", ['yes', 'not'])->nullable();//este no supe que era xD. Creo que es como el estatus
            $table->timestamps();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
