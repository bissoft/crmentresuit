<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('created_by');
            $table->string('subject');
            $table->integer('customer_contact_id');
            $table->integer('department_id');
            $table->integer('project_id')->nullable();
            $table->string('email_cc');
            $table->string('tag_id');
            $table->integer('assigned_to')->nullable();
            $table->integer('ticket_status_id')->nullable();
            $table->integer('ticket_priority_id')->nullable();
            $table->integer('ticket_service_id')->nullable();
            $table->integer('pre_defined_replies_id')->nullable();
            $table->text('details')->nullable();
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
