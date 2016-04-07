@extends('admin.layouts.app')

@section('content')
<div class="col-md-6">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Добавление ответов для вопросов теста</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('answer.store') }}" role="form" id="answer-form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="test_id">Тест</label>
                  <select name="test_id" class="form-control" id="test_id">
                    <option>...</option>
					@foreach($tests as $test)
                    	<option value="{{ $test->id }}">{{ $test->title }}</option>
                    @endforeach
                  </select>
                </div>
				<div class="form-group">
                  <label for="question_id">Вопрос</label>
                  <select name="question_id" class="form-control" id="question_id">
                    <option>...</option>

                  </select>
                </div>
				<div class="form-group">
                  <label for="title">Текст ответа</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Введите текст ответа">
                </div>
				<div class="form-group">
                  <label for="ball">Балл за ответ</label>
                  <input type="number" name="ball" class="form-control" id="ball" value="0">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Добавить ответ</button>
              </div>
            </form>
          </div>
</div>

<div class="col-md-6">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Новые ответы</h3>
			<div id="new-answers">

			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script>
	$('#test_id').change(function() {
		var testId = $(this).val();
		//console.log(testId);
		$.ajax({
			type: "POST",
			url: "{{ route('question.list') }}",
			data: { test_id: testId },
		}).done(function (data) {
			$.each(data, function( index, value ) {
				$('#question_id').append('<option value="' + value.id + '">' + value.title + '</option');
			});

		});
	});
	//отправка формы вопроса
	$('#answer-form').submit(function() {
		var formData = $(this).serializeArray();
		$.ajax({
			type: "POST",
			url: "{{ route('answer.store') }}",
			data: formData,
		}).done(function (data) {
			console.log(data);
			if (data.status == 'success'){
				$('#new-answers').append('<p>' + data.title + '</p>');
			}
		});
		return false;
	});

</script>
@endsection