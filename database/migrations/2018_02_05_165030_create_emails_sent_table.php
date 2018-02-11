<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsSentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sent_emails', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('sent_to')->unsigned()->nullable();
            $table->foreign('sent_to')->references('id')->on('customers')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('picture_url')->nullable();
            $table->text('end_text')->nullable();
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
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
        Schema::drop('sent_emails');
    }
}
