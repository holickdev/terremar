<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Ejecutar las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Campo 'id' como clave primaria de tipo bigInt
            $table->string('state', 50); // Campo 'state' de tipo varchar(50)
            $table->string('municipality', 50); // Campo 'municipality' de tipo varchar(50)
            $table->string('parish', 50); // Campo 'parish' de tipo varchar(50)
            $table->string('point_reference', 50); // Campo 'point_reference' de tipo varchar(50)
            $table->string('social_class', 50); // Campo 'social_class' de tipo varchar(50)
            $table->timestamps(); // Campos 'created_at' y 'updated_at'

            // Puedes agregar restricciones adicionales si es necesario, como claves foráneas
        });
    }

    /**
     * Deshacer las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses'); // Elimina la tabla 'addresses' si existe
    }
};
