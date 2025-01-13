<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary()->unsigned();
            $table->string('registration_number');
            $table->date('registration_date');
            $table->string('type');
            $table->string('number');
            $table->date('date');
            $table->string('contractor');
            $table->string('category');
            $table->string('details');
            $table->string('article');
            $table->string('amount');
            $table->date('term');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
