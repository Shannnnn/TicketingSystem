<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assigned_to');
            $table->string('department');
            $table->string('help_topic');
            $table->string('priority');
            $table->string('product');
            $table->string('brand');
            $table->string('ticket_source');
            $table->string('description');
            $table->string('product_summary');
            $table->string('sla_plan');
            $table->string('remarks');
            $table->integer('client_id');
            $table->integer('user_id');
            $table->date('turn_over_date');
            $table->date('scheduled_date')->nullable();
            $table->string('ticket_status');
            $table->string('warranty');
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
        Schema::dropIfExists('tickets');
    }
}
