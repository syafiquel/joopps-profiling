<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use App\Models\UserSession;
use App\Models\Attribute;
use App\Models\Answer;

class UserSessionController extends Controller
{
    
    private $atrribute_score_total = 0;
    private $atrribute_score_array;
    private $expected_attribute_score;
 
    public function calculate() {
        $attribute_names = array();
        $attribute_scores = array();
	$expected_scores = array();
        $total_score = 0.0;
        $user = Auth::user();
        $user_session = UserSession::where('user_id', $user->id)->first();
        $user_scores = json_decode($user_session->details);
	$answers = Answer::where('job_id', $user->job_id)
	    ->whereHas('attribute', function(Builder $query) {
		$query->where('is_displayed', 1);
	    })
            ->orderBy('attribute_id', 'asc')
            ->select('expected_answer')->get();
        foreach($answers as $answer) {
            array_push($expected_scores, $answer->expected_answer);
        }
        foreach($user_scores as $user_score) {
            $this->attributeScoreAggregator($user_score);
        }

        foreach($this->atrribute_score_array as $key => $value) {
            $average_attribute_score = $this->roundedScoreAggregator($key, $value);
            $this->atrribute_score_total += $average_attribute_score;
        }
        $user_session->attribute_score_details = json_encode($this->atrribute_score_array);
        $user_session->attribute_score = $this->atrribute_score_total;
        $this->expected_attribute_score = intval(Answer::where('job_id', $user->job_id)->sum('expected_answer'));
        if($this->atrribute_score_total > $this->expected_attribute_score) {
            $this->atrribute_score_total = $this->expected_attribute_score;
        }
        $final_attribute_score = ($this->atrribute_score_total / $this->expected_attribute_score) * 65;
        $final_attribute_score = round($final_attribute_score);
        $user_session->final_attribute_score = $final_attribute_score;
        $user_session->save();
        $scores = json_decode($user_session->attribute_score_details);
        $attributes = Attribute::select('id', 'name')->where('is_displayed', 1)->get();
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
        return view('result-partial', compact('attribute_names', 'attribute_scores', 'expected_scores', 'user_name', 'user_job'));

    }

    private function attributeScoreAggregator($answer) {
        
        if(empty($this->atrribute_score_array)) {
            $this->atrribute_score_array = array($answer->attribute_id => $answer->score);
        } else {
            if(array_key_exists($answer->attribute_id, $this->atrribute_score_array)) {
                $this->atrribute_score_array[$answer->attribute_id] += $answer->score;
            } else {
                if(array_key_exists($answer->attribute_id, $this->atrribute_score_array)) {
                    $this->atrribute_score_array[$answer->attribute_id]= $this->atrribute_score_array[$answer->attribute_id-1]->score + $answer->score;
                } else {
                    $this->atrribute_score_array[$answer->attribute_id] = $answer->score;
                }
            }
        }
        
        
    }

    private function roundedScoreAggregator($key, $value) {
        $this->atrribute_score_array[$key] = round($value/6);
        return round($value/6);
    }
}
