<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('region');
            
            $table->double('lat', 25, 16);
            $table->double('long', 25, 16);
            $table->integer('confirmados');
            $table->integer('sospechosos');
            $table->integer('recuperados');
            $table->integer('negativos');
            $table->integer('muertos');
           
            //$table->timestamps();
            //$table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('casos');
    }
}
