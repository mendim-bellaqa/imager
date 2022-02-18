<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->nullable();
            $table->string('folder_name')->nullable();
            $table->string('path')->nullable();
            $table->string('status')->default('DRAFT');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('datetime')->nullable();
            $table->timestamps();
        });
        Schema::disableForeignKeyConstraints();
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
        $table->dropForeign(['user_id']);
    }
}