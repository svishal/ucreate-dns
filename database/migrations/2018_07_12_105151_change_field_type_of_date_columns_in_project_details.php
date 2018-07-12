<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldTypeOfDateColumnsInProjectDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_details', function (Blueprint $table) {
            $table->dropColumn('created_date');
            $table->dropColumn('expires_date');
            $table->dropColumn('ssl_expiry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_details', function (Blueprint $table) {
            $table->string('created_date')->nullable()->change();
            $table->string('expires_date')->nullable()->change();
            $table->string('ssl_expiry')->nullable()->change();
        });
    }
}
