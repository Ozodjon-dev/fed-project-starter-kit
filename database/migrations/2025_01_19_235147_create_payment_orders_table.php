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
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date');
            $table->string('applicant');
            $table->string('applicant_bank_account');
            $table->string('applicant_tin');
            $table->string('applicant_bank_name');
            $table->string('applicant_bank_code');
            $table->decimal('amount', 15, 2)
                ->default(0.00)
                ->nullable()
                ->unsigned()
                ->index();
            $table->string('contractor');
            $table->string('beneficiary_bank_account');
            $table->string('beneficiary_tin');
            $table->string('beneficiary_bank_name');
            $table->string('beneficiary_bank_code');
            $table->string('amount_in_words');
            $table->text('details');
            $table->string('debit_chart_of_account');
            $table->string('credit_chart_of_account');
            $table->foreignId('contract_id')->nullable()->constrained('contracts')->onDelete('cascade');
            $table->string('article')->nullable();
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
        Schema::dropIfExists('payment_orders');
    }
};
