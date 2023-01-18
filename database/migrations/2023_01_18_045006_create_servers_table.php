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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('label');
            $table->string('os');
            $table->string('ip')->default('00.00.00.00');
            $table->string('region');
            $table->enum('status', ['active', 'pending', 'failed'])->default('active');
            $table->string('provider_plan');
            $table->string('plan_monthly_cost');
            $table->string('cpu');
            $table->string('ram');
            $table->string('bandwidth');
            $table->string('disk');
            $table->string('sub_id');
            $table->string('database');
            $table->string('webserver');
            $table->string('temp_pass');
            $table->date('provisioned_at')->now();

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
        Schema::dropIfExists('servers');
    }
};
