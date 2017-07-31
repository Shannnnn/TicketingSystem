<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('priority');
            $table->timestamps();
        });

        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('remark');
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
        Schema::dropIfExists('priority_levels');
        Schema::dropIfExists('ticket_statuses');
        Schema::dropIfExists('remarks');
    }
}
