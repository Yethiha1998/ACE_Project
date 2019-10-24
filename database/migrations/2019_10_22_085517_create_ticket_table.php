<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('ticketid');
            $table->string('ticket_type');
            $table->string('price');
            $table->integer('eventid')->unsigned();
            $table->foreign('eventid')->references('eventid')->on('event')->onDelete('cascade');
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
        Schema::dropIfExists('ticket');
        $table->dropForeign('table_eventid_foreign');
        $table->dropIndex('table_eventid_index');
        $table->dropColumn('eventid');
    }
}
