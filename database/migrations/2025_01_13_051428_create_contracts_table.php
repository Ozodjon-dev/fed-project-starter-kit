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
            $table->id();
            $table->string('registration_number');
            $table->date('registration_date');
            $table->string('type');
            $table->string('number');
            $table->date('date');
            $table->string('contractor');
            $table->string('category')->nullable();
            $table->text('details')->nullable();
            $table->string('article')->nullable();
            $table->decimal('amount', 15, 2)
                ->default(0.00)
                ->nullable()
                ->unsigned()
                ->index();
            $table->date('term')->nullable();
            $table->string('status')->nullable();
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
