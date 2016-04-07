<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AnswerRequest;
use App\Http\Controllers\Controller;
use App\Models\Test;

class AnswerController extends Controller {

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
    $tests = Test::all('title', 'id');
    return view('admin.tests.answers.create', compact('tests'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(AnswerRequest $request)
  {
    $test = new Answer(array(
      'title' => $request->get('title'),
      'question_id' => $request->get('question_id'),
      'ball' => $request->get('ball'),
    ));

    $test->save();

    return response()->json(['status' => 'success', 'title' => $request->get('title')]);
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
  
}

?>