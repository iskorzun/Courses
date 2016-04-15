<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Test;

class TestController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    dd(213234234);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    $categories = Category::lists('title', 'id')->toArray();
   // dd($categories);
    return view('admin.tests.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(TestRequest $request)
  {
    //dd($request->get('title'));
    $test = new Test(array(
      'title' => $request->get('title'),
      'description' => $request->get('description'),
      'category_id' => $request->get('category_id'),
    ));

    $test->save();

    return \Redirect::route('test.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

    return view('admin.test');
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

  public function data()
  {

    $select = DB::select('SELECT
                          `a`.`id` as `a_id`,
                          `a`.`title` as `a_title`,
                          `q`.`id` as `q_id`,
                          `q`.`title` as `q_title`,
                          `q`.`type` as `q_type`
                              FROM `answers` a
                                  LEFT JOIN `questions` `q` ON `a`.`question_id` = `q`.`id`

                              WHERE `q`.`test_id` = 1');

    $answers = array();
    foreach ($select as $k =>$v){
      $answers[$k]['id'] = $v->a_id;
      $answers[$k]['title'] = $v->a_title;
      $answers[$k]['question_id'] = $v->q_id;
    }

    $q_num = array();
    $questions = array();
    $count = 0;
    foreach ($select as $k =>$v){
      if (!in_array($v->q_id, $q_num)) {
        $q_num[] = $v->q_id;
        $questions[$count]['id'] = $v->q_id;
        $questions[$count]['title'] = $v->q_title;
        $questions[$count]['type'] = $v->q_type;
        $count++;
      }
    }

    $data['questions'] = $questions;
    $data['answers'] = $answers;
    $data['count'] = count($questions);




    $array = [
      'questions' => [
        0 => [
          'id' => 21,
          'title' => 'Вопрос №1 первого теста',
          'type' => 1,
        ],
        1 => [
          'id' => 15,
          'title' => 'Вопрос №2 первого теста',
          'type' => 2,
        ],
      ],
      'answers' => [
        0 => [
          'id' => 223,
          'title' => 'Ответ номер 1 вопрос 21',
          'question_id' => 21,
        ],
        1 => [
          'id' => 234,
          'title' => 'Ответ номер 2 вопрос 21',
          'question_id' => 21,
        ],
        2 => [
          'id' => 134,
          'title' => 'Ответ номер 3 вопрос 21',
          'question_id' => 21,
        ],
        3 => [
          'id' => 244,
          'title' => 'Ответ номер 4 вопрос 21',
          'question_id' => 21,
        ],
        4 => [
          'id' => 555,
          'title' => 'Ответ номер 1 вопрос 15',
          'question_id' => 15,
        ],
        5 => [
          'id' => 122,
          'title' => 'Ответ номер 2 вопрос 15',
          'question_id' => 15,
        ],
        6 => [
          'id' => 411,
          'title' => 'Ответ номер 3 вопрос 15',
          'question_id' => 15,
        ],
        7 => [
          'id' => 423,
          'title' => 'Ответ номер 4 вопрос 15',
          'question_id' => 15,
        ],
      ],
      'count' => 2,
    ];

    return response()->json($data);
  }
  
}

?>