<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faculty_id');
            $table->string('test_name');
            $table->string('stream_id');
            $table->string('subject_id');
            $table->string('No_of_q');
            $table->string('right_a');
            $table->string('wrong_a');
            $table->string('total_marks');
            $table->string('test_date');
            $table->string('test_time');
            $table->string('test_status');
            $table->string('test_create_date');
            $table->string('test_duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
