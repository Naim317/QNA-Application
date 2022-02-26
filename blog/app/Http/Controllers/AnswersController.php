<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        date_default_timezone_set("Asia/Dhaka");
        $request->validate([
            'body' => 'required',
        ]);
        $question->answers()->create(['body'=> $request->body, 'user_id' => \Auth::id()]);
        return back()->with('success', 'Your answer has been submitted succesfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,Answer $answer)
    {
        if (\Gate::denies('update-answer', $answer)){
            abort(403, "Access denied");
        }
        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        if (\Gate::denies('update-answer', $answer)){
            abort(403, "Access denied");
        }
        $answer->update($request->validate([
            'body' => 'required',
        ]));
        return redirect()->route('questions.show', $question->slug)->with('success', 'Your maessage has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Answer $answer)
    {
        if (\Gate::denies('delete-answer', $answer)){
            abort(403, "Access denied");
        }
        $answer->delete();
        return back()->with('success', "Your Answer has been deleted");
    }
}
