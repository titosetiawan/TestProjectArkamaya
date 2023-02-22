<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tb_m_project', function (Blueprint $table) {
            $table->id('id');
            $table->string('project_name');
            $table->unsignedBigInteger('client_id');
            $table->date('project_start');
            $table->date('project_end');
            $table->char('project_status');

            $table->foreign('client_id')->references('id')->on('tb_m_client')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_project');
    }
};
