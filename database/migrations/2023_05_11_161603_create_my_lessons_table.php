<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('tenBaiHoc');
            $table->string('linkVideo');
            $table->string('tenBaiTap');
            $table->string('moTaBaiTap');
            $table->integer('trangThai');
            $table->integer('giaoVienID');
            $table->integer('idBaiHoc')->nullable();
            $table->unsignedBigInteger('my_chapter_id');
            $table->foreign('my_chapter_id')->references('id')->on('my_chapters')->onDelete('cascade');
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
        Schema::dropIfExists('my_lessons');
    }
}
