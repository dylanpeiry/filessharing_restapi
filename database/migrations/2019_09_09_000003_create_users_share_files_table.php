<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersShareFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_share_files', function (Blueprint $table) {
            $table->unsignedBigInteger('id_file')->nullable(false);
            $table->unsignedBigInteger('id_user')->nullable(false);

            $table->primary(['id_file','id_user']);
            $table->timestamp('shared_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
        });

        Schema::table('users_share_files',function (Blueprint $table){
            $table->foreign('id_file')->references('id')->on('files');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_share_files');
    }
}
