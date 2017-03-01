<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatecontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('email');
            $table->longText('messages');
            $table->string('domain');

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('contacts', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
