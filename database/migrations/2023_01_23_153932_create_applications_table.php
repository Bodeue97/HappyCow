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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('cattle');
            $table->date('application_date')->format('YYYY-MM-DD')->nullable();
            $table->decimal('price', 12,2, true)->default(0);
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->unsignedBigInteger('reserved_by')->nullable();
            $table->boolean('paid_for')->default(false);
            $table->string('account_number');
            $table->foreign('transport_id')
                ->references('id')
                ->on('transports')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('reserved_by')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('seller_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
