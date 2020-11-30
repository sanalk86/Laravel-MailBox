<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FetchedEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('emails', function (Blueprint $table) {
          $table->id();
          $table->string('from');
          $table->string('to');
          $table->string('sent_date');
          $table->string('subject');
          $table->integer('uid');
          $table->integer('msgno');
          $table->tinyInteger('seen');
          $table->longText('mbox');
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
        //
    }
}
