<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSession;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submission(Request $request) {
        $scale_multiplier = 1.428;
        $user = Auth::user();
        $session = UserSession::where('user_id', $user->id)->first();
        $last_question = $session->current_question;
        $questions = json_decode($session->details, true);
        $index = intval($request->question_no) - 1;
        $index = strval($index);
        $questions[$index]['answer'] = intval($request->answered);
        if($questions[$index]['is_positive'] == 0) {
            $questions[$index]['score'] = (intval($request->answered * -1) + 8 ) * $scale_multiplier;
        } else {
            $questions[$index]['score'] = intval($request->answered) * $scale_multiplier;
        }
        $updated_questions = json_encode($questions);
        $session->details = $updated_questions;
        if($last_question != 108) {
            $session->current_question = intval($request->question_no);
        }
        $session->save();
    }

    public function completion() {
        return view('completion');
    }

    public function summary() {
        $user = Auth::user();
        $session = UserSession::where('user_id', $user->id)->first();
        $attribute_score = $session->final_attribute_score;
        $education_score = $session->education_score;
        $experience_score =  $session->experience_score;
        $affiliation_score = $session->affiliation_score;
        $total_score = $attribute_score + $education_score + $experience_score + $affiliation_score;
        return view('summary', compact('attribute_score', 'education_score', 'experience_score', 'affiliation_score', 'total_score'));
    }
    
}
