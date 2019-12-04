<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Frequent_question;

class AdministrateFrequentQuestionsController extends Controller
{
    public function index()
    {
      $frequentQuestions = Frequent_question::paginate(10);
      return view('frequentQuestions.administrateFrequentQuestions')->with('frequentQuestions', $frequentQuestions);
    }

    public function create()
    {
      return view('frequentQuestions.addFrequentQuestion');
    }

    public function save(Request $request)
    {
      $rules = [
        'question' => 'required|string|max:65535',
        'answer' => 'required|string|max:65535'
      ];
      $this->validate($request, $rules);
      $addFrequentQuestion = new Frequent_question();
      $addFrequentQuestion->question = $request->input('question');
      $addFrequentQuestion->answer = $request->input('answer');
      $addFrequentQuestion->save();
      return redirect()->route('administrateFrequentQuestions');
    }

    public function edit($id)
    {
      $frequentQuestion = Frequent_question::find($id);
      return view('frequentQuestions.editFrequentQuestion')->with('frequentQuestion', $frequentQuestion);
    }

    public function update(Request $request, $id)
    {
      $rules = [
        'question' => 'required|string|max:65535',
        'answer' => 'required|string|max:65535'
      ];
      $this->validate($request, $rules);
      $editFrequentQuestion = Frequent_question::find($id);
      $editFrequentQuestion->question = $request->input('question');
      $editFrequentQuestion->answer = $request->input('answer');
      $editFrequentQuestion->update();
      return redirect()->route('administrateFrequentQuestions');
    }

    public function show($id)
    {
      $frequentQuestion = Frequent_question::find($id);
      return view('frequentQuestions.detailsFrequentQuestion')->with('frequentQuestion', $frequentQuestion);
    }

    public function destroy(Request $request)
    {
      $id = $request->input('id');
      $frequentQuestion = Frequent_question::find($id);
      $frequentQuestion->delete();
      return redirect()->route('administrateFrequentQuestions');
    }
}
