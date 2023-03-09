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
        Schema::create('bot_log_messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('api_token_id')->nullable()->comment('Идентификатор системного токена')->constant();
            $table->string('token')->nullable()->comment('Токен в запросе');
            $table->jsonb('request_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bot_log_messages');
    }
};
