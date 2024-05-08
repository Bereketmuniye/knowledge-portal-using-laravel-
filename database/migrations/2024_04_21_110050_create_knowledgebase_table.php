<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeBaseTable extends Migration
{
    public function up()
    {
        Schema::create('knowledge_base', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('knowledge_base');
    }

};
