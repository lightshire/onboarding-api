<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('checklist_id')->index();
            $table->date('deadline_at');
            $table->string('name');
            $table->string('description');
            $table->boolean('is_required');
            $table->string('status');
            $table->boolean('is_completed');
            $table->integer('user_id')->index();
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
        Schema::dropIfExists('user_checklists');
    }
}
