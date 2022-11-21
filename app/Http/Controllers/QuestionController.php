<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Models\UserSession;
use App\Models\Attribute;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    private $current_question;
    private $page;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        $attribute_names = array();
        $attribute_scores = array();
	$expected_scores = array();
        $user = Auth::user();
        $questions = UserSession::where('user_id', $user->id)->first();
        $this->current_question = $questions->current_question;
        if($this->current_question == 0 && $questions->is_tnc_checked == 1) {
            return view('question');
        } else if($this->current_question == 108) {
            $scores = json_decode($questions->attribute_score_details);
            $attributes = Attribute::select('id', 'name')->where('is_displayed', 1)->get();
	    $answers = Answer::where('job_id', $user->job_id)
		->whereHas('attribute', function(Builder $query) {
			$query->where('is_displayed', 1);
		})
                ->orderBy('attribute_id', 'asc')
                ->select('expected_answer')->get();
            foreach($answers as $answer) {
                array_push($expected_scores, $answer->expected_answer);
            }
            foreach($attributes as $attribute) {
                $index = $attribute->id;
                array_push($attribute_names, $attribute->name);
                $score = $scores->$index;
                array_push($attribute_scores, $score);
            }
            // $attribute_scores = collect($attribute_scores)->map(function ($score) {
            //     return round(($score / 7) * 10);
            // })->toArray();
            $user_name = $user->name;
            $user_job = $user->job->name;
            return view('result', compact('attribute_names', 'attribute_scores', 'expected_scores', 'user_name', 'user_job'));
        } else if($this->current_question == 0 && $questions->is_tnc_checked == 0) {
            return view('intro');
        } else {
            $questions = json_decode($questions->details);
            $question = $questions[$this->current_question];
            $question->no = $this->current_question;
            return view('question', compact('question'));
        }
        
    }

    public function tnc() {
        $user = Auth::user();
        $questions = UserSession::where('user_id', $user->id)->first();
        $questions->is_tnc_checked = 1;
        $questions->save();
        return view('question');
    }

    public function show(Request $request) {
        $user = Auth::user();
        $questions = UserSession::where('user_id', $user->id)->first();
        if(isset($request->page)) {
            $this->current_question = $request->page;
        } else {
            $this->current_question = $questions->current_question;
        }
        
        $this->page = intval($this->current_question) + 1;
        $questions = json_decode($questions->details);
        $question = $questions[$this->current_question];
        $question->no = $this->page;
        return response()->json($question);
    }

    public function verify() {
        $user = Auth::user();
        $questions = UserSession::where('user_id', $user->id)->first();
        $questions = json_decode($questions->details);
        $response = new \StdClass();
        $response->status = 1;
        foreach($questions as $index => $payload) {
            if(!isset($payload->answer)) {
                $response->status = 0;
                $response->index = $index;
                return response()->json($response);
            }
        }   
    }
    

}
