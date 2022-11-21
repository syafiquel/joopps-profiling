<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Question;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('content', 300);
            $table->bigInteger('dimension_id')->unsigned()->nullable()->index();
            $table->bigInteger('attribute_id')->unsigned()->nullable()->index();
            $table->boolean('is_positive');
            $table->boolean('is_displayed')->default(1);
            Question::addSlugColumn($table);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('questions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
