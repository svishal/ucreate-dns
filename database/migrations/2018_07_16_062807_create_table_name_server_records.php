<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNameServerRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_server_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('a')->nullable();
            $table->text('aaaa')->nullable();
            $table->text('cname')->nullable();
            $table->text('mx')->nullable();
            $table->text('ns')->nullable();
            $table->text('ptr')->nullable();
            $table->text('soa')->nullable();
            $table->text('srv')->nullable();
            $table->text('txt')->nullable();
            $table->text('caa')->nullable();
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
        Schema::dropIfExists('name_server_records');
    }
}
