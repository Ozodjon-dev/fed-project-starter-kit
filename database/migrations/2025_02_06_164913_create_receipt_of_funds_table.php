<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_of_funds', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date');
            $table->string('bank_account');
            $table->string('debit_chart_of_account');
            $table->string('credit_chart_of_account');
            $table->foreignId('contract_id')->nullable()->constrained('contracts')->onDelete('cascade');
            $table->string('article')->nullable();
            $table->text('details');
            $table->decimal('amount', 15, 2)
                ->default(0.00)
                ->nullable()
                ->unsigned()
                ->index();
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
        Schema::dropIfExists('receipt_of_funds');
    }
};
