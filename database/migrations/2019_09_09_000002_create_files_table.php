<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use function foo\func;

class CreateFilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id'); //primary key
            $table->string('stored_file_name', 200)->nullable(false);
            $table->string('file_name', 100)->nullable(false);
            $table->float('size')->nullable(false);
            $table->string('type', 20)->nullable(false);
            $table->tinyInteger('status')->default(0)->nullable(false);
            $table->unsignedBigInteger('id_owner')->nullable(false);
            $table->timestamps();
        });

        Schema::table('files', function (Blueprint $table) {
            $table->foreign('id_owner')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
