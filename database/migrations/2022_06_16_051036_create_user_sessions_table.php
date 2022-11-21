<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserSession;

class CreateUserSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->unsigned()->index()->nullable();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->boolean('is_tnc_checked')->default(0)->nullable();
            $table->json('details');
            $table->json('attribute_score_details')->nullable();
            $table->smallInteger('attribute_score')->length(2)->nullable();
            $table->tinyInteger('final_attribute_score')->length(2)->nullable();
            $table->tinyInteger('education_score')->length(2)->nullable();
            $table->tinyInteger('experience_score')->length(2)->nullable();
            $table->tinyInteger('affiliation_score')->length(2)->nullable();
            $table->boolean('current_question')->default(0)->nullable();
            UserSession::addSlugColumn($table);
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
        Schema::dropIfExists('user_sessions');
    }
}
