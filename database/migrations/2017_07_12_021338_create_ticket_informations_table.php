<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source');
            $table->timestamps();
        });

        Schema::create('sla_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sla_plan');
            $table->timestamps();
        });

        Schema::create('help_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->timestamps();
        });

        Schema::create('assignees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assignee');
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
        Schema::dropIfExists('ticket_sources');
        Schema::dropIfExists('sla_plans');
        Schema::dropIfExists('help_topics');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('assignees');
    }
}
