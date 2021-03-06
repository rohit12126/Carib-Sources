<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCusformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name',100);
            $table->string('l_name',100);
            $table->string('email',100);
            $table->text('address');
            $table->string('city',50);
            $table->string('zip',20);
            $table->string('c_name',100);
            $table->string('c_address',100);
            $table->string('c_city',50);
            $table->string('c_zip',20);
            $table->text('ftags');
            $table->string('i_file',100);
            $table->decimal('daily_from', 10, 2);
            $table->decimal('daily_to', 10, 2);
            $table->decimal('month_from', 10, 2);
            $table->decimal('month_to', 10, 2);
            $table->decimal('year_from', 10, 2);
            $table->decimal('year_to', 10, 2);
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('cusforms');
    }
}
