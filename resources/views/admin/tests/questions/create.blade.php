@extends('admin.layouts.app')

@section('content')
{!! Form::open(array('route' => 'question.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('test_id', 'Test_id:') !!}
			{!! Form::select('test_id', $tests, null, ['placeholder' => 'Выберите тест..']) !!}
		</li>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::textarea('title') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::select('type', array('0' => 'Один верный', '1' => 'Множество верных'), null, ['placeholder' => 'Выберите тип ответов']) !!}
		</li>

		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
@endsection

@section('scripts')


@endsection