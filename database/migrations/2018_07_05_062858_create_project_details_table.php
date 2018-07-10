<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->foreign('project_id')->references('id')->on('projects');
            $table->string('domain_registrar')->nullable();
            $table->string('registrant')->nullable();
            $table->string('contact')->nullable();
            $table->string('name_servers')->nullable();
            $table->string('website_title')->nullable();
            $table->string('website_description')->nullable();
            $table->string('language')->nullable();
            $table->string('server_type')->nullable();
            $table->string('hosted_on')->nullable();
            $table->string('dnssec')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('created_date')->nullable();
            $table->string('expires_date')->nullable();
            $table->string('address')->nullable();
            $table->string('alexa_rank')->nullable();
            $table->string('ssl')->nullable();
            $table->string('ssl_expiry')->nullable();
            $table->string('ssl_type')->nullable();
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
        Schema::dropIfExists('project_details');
    }
}
