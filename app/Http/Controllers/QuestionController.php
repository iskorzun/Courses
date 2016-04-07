<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $tests = Test::lists('title', 'id')->toArray();
   // dd($categories);
    return view('admin.tests.questions.create', compact('tests'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(QuestionRequest $request)
  {
    $test = new Question(array(
      'title' => $request->get('title'),
      'test_id' => $request->get('test_id'),
      'type' => $request->get('type'),
    ));

    $test->save();

    return \Redirect::route('question.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  public function showList(Request $request) {
    $test_id = $request->get('test_id');
    $questions = Question::whereTestId($test_id)->get();
    return $questions;
  }
  
}

?>