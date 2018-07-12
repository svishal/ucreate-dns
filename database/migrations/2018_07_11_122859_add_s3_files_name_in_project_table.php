<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddS3FilesNameInProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_details', function (Blueprint $table) {
              $table->dropColumn('ssl');
              $table->string('ssl_crt_file')->nullable();
              $table->string('ssl_server_key_file')->nullable();
              $table->string('ssl_csr_file')->nullable();
              $table->string('delegate_access')->nullable();
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
           $table->string('ssl')->nullable();
           $table->dropColumn('ssl_crt_file');
           $table->dropColumn('ssl_server_key_file');
           $table->dropColumn('ssl_csr_file');
           $table->dropColumn('delegate_access');
            
        });
    }
}
