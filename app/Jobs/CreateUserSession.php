<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\UserSession;
use App\Models\Question;
use App\Models\User;
use App\Models\Job;


class CreateUserSession implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $user_id;
    private $job_id;

    public function __construct($user_id, $job_id)
    {
        $this->user_id = $user_id;
        $this->job_id = $job_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $question_count = 0;
        $questions = collect();


        $leadership_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 1]])->inRandomOrder()->limit(4);
        $leadership_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 1]])->inRandomOrder()->limit(2)->union($leadership_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 0;
            }
            $questions = $questions->merge($leadership_questions);
            $question_count = count($questions);
        } while($question_count < 6);


        $judgement_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 2]])->inRandomOrder()->limit(4);
        $judgement_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 2]])->inRandomOrder()->limit(2)->union($judgement_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 6;
            }
            $questions = $questions->merge($judgement_questions);
            $question_count = count($questions);
        } while($question_count < 12);
        
        $agile_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 3]])->inRandomOrder()->limit(4);
        $agile_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 3]])->inRandomOrder()->limit(2)->union($agile_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 12;
            }
            $questions = $questions->merge($agile_questions);
            $question_count = count($questions);
        } while($question_count < 18);

        $pressure_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 4]])->inRandomOrder()->limit(4);
        $pressure_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 4]])->inRandomOrder()->limit(2)->union($pressure_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 18;
            }
            $questions = $questions->merge($pressure_questions);
            $question_count = count($questions);
        } while($question_count < 24);
        
        $emotion_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 5]])->inRandomOrder()->limit(4);
        $emotion_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 5]])->inRandomOrder()->limit(2)->union($emotion_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 24;
            }
            $questions = $questions->merge($emotion_questions);
            $question_count = count($questions);
        } while($question_count < 30);

        $ethical_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 6]])->inRandomOrder()->limit(4);
        $ethical_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 6]])->inRandomOrder()->limit(2)->union($ethical_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 30;
            }
            $questions = $questions->merge($ethical_questions);
            $question_count = count($questions);
        } while($question_count < 36);

        $result_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 7]])->inRandomOrder()->limit(4);
        $result_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 7]])->inRandomOrder()->limit(2)->union($result_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 36;
            }
            $questions = $questions->merge($result_questions);
            $question_count = count($questions);
        } while($question_count < 42);


        $purpose_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 8]])->inRandomOrder()->limit(4);
        $purpose_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 8]])->inRandomOrder()->limit(2)->union($purpose_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 42;
            }
            $questions = $questions->merge($purpose_questions);
            $question_count = count($questions);
        } while($question_count < 48);

        $entrepreneur_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 9]])->inRandomOrder()->limit(4);
        $entrepreneur_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 9]])->inRandomOrder()->limit(2)->union($entrepreneur_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 48;
            }
            $questions = $questions->merge($entrepreneur_questions);
            $question_count = count($questions);
        } while($question_count < 54);

        $listener_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 10]])->inRandomOrder()->limit(4);
        $listener_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 10]])->inRandomOrder()->limit(2)->union($listener_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 54;
            }
            $questions = $questions->merge($listener_questions);
            $question_count = count($questions);
        } while($question_count < 60);

        $thinker_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 11]])->inRandomOrder()->limit(4);
        $thinker_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 11]])->inRandomOrder()->limit(2)->union($thinker_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 60;
            }
            $questions = $questions->merge($thinker_questions);
            $question_count = count($questions);
        } while($question_count < 66);


        $solver_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 12]])->inRandomOrder()->limit(4);
        $solver_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 12]])->inRandomOrder()->limit(2)->union($solver_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 66;
            }
            $questions = $questions->merge($solver_questions);
            $question_count = count($questions);
        } while($question_count < 72);

        $data_interpreter_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 13]])->inRandomOrder()->limit(4);
        $data_interpreter_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 13]])->inRandomOrder()->limit(2)->union($data_interpreter_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 72;
            }
            $questions = $questions->merge($data_interpreter_questions);
            $question_count = count($questions);
        } while($question_count < 78);

        $digital_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 14]])->inRandomOrder()->limit(4);
        $digital_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 14]])->inRandomOrder()->limit(2)->union($digital_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 78;
            }
            $questions = $questions->merge($digital_questions);
            $question_count = count($questions);
        } while($question_count < 84);


        $team_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 15]])->inRandomOrder()->limit(4);
        $team_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 15]])->inRandomOrder()->limit(2)->union($team_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 84;
            }
            $questions = $questions->merge($team_questions);
            $question_count = count($questions);
        } while($question_count < 90);


        $human_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 16]])->inRandomOrder()->limit(4);
        $human_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 16]])->inRandomOrder()->limit(2)->union($human_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 90;
            }
            $questions = $questions->merge($human_questions);
            $question_count = count($questions);
        } while($question_count < 96);


        $communicator_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 17]])->inRandomOrder()->limit(4);
        $communicator_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 17]])->inRandomOrder()->limit(2)->union($communicator_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 96;
            }
            $questions = $questions->merge($communicator_questions);
            $question_count = count($questions);
        } while($question_count < 102);


        $learner_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 1], ['attribute_id', '=', 18]])->inRandomOrder()->limit(4);
        $learner_questions = Question::select('id as question_id', 'content as question', 'is_positive', 'attribute_id')->where([['is_positive',  '=', 0], ['attribute_id', '=', 18]])->inRandomOrder()->limit(2)->union($learner_questions)->get();

        do {
            if($question_count > 0) {
                $question_count = 102;
            }
            $questions = $questions->merge($learner_questions);
            $question_count = count($questions);
        } while($question_count < 108);

        $questions = $questions->shuffle();
        $user = User::find($this->user_id);
        if($user->job->need_certification && !is_null($user->job->education->certification_code) && 
            $user->job->education->certification_code >= 20) {
            $this->education_score = 10;
        } else if($user->education_id >= $user->job->education_id) {
            $this->education_score = 10;
        } else {
            $this->education_score = 0;
        }
        if($user->affiliation) {
            $this->affiliation_score = 5;
        } else {
            $this->affiliation_score = 0;
        }
        if($user->experience >= $user->job->experience) {
            $this->experience_score = 20;
        } else {
            $this->experience_score = 0;
        }
        
        $data = array(
            'details' => $questions->toJson(),
            'user_id' => $this->user_id,
            'job_id' => $this->job_id,
            'education_score' => $this->education_score,
            'experience_score' => $this->experience_score,
            'affiliation_score' => $this->affiliation_score
        );

        UserSession::create($data);
        
        return $questions->toArray();
    }
}
