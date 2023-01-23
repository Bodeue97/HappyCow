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
            $table->string('cattle');
            $table->date('application_date')->format('YYYY-MM-DD')->nullable();
            $table->decimal('price', 12,2, true)->default(0);
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('reserved')->default(false);
            $table->boolean('paid_for')->default(false);

            $table->foreign('transport_id')
                ->references('id')
                ->on('transports')
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
