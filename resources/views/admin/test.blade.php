@extends('admin.layouts.app')

@section('content')
<div class="col-md-6">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Добавление ответов для вопросов теста</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div id="box-answers" class="form-group">

                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button id="start-test" data-test="1" class="btn btn-primary">Начать тест</button>
				<button id="next-question" class="btn btn-info pull-right hidden">Ответить</button>
				<button id="btn-result" class="btn btn-info pull-right hidden">Показать результаты</button>
              </div>
          </div>
</div>


@endsection


@section('scripts')
<script>

	var TEST = {
		currentQuestion: 0,
		testData: {},
		questionsCount: 0,
		'answersIds': [],

		init: function ( data ) {
			this.testData = data;
			this.questionsCount = data.count;
			this.nextQuestion();
		},

		nextQuestion: function () {
			$('#box-answers').text('');
			if ( this.currentQuestion + 1 <= this.questionsCount ) {
				//Выводим назавание вопроса
				$('.box-title').text(this.testData.questions[this.currentQuestion].title + 'Вопрос ' + (this.currentQuestion + 1) + '/' + this.questionsCount);
				//Выводим ответы
				if ( this.testData.questions[this.currentQuestion].type === 1 ) {
					for ( var i = 0; i < this.testData.answers.length; i++ ) {
						if (this.testData.answers[i].question_id === this.testData.questions[this.currentQuestion].id ) {
							$('#box-answers').append('<div class="radio"><label><input type="radio" name="answer" value="' + this.testData.answers[i].id + '">' + this.testData.answers[i].title + '</label></div>');
						}
					}
				}else if ( this.testData.questions[this.currentQuestion].type === 2 ) {
					for ( var i = 0; i < this.testData.answers.length; i++ ) {
						if (this.testData.answers[i].question_id === this.testData.questions[this.currentQuestion].id ) {
							$('#box-answers').append('<div class="checkbox"><label><input type="checkbox" name="answer" value="' + this.testData.answers[i].id + '">' + this.testData.answers[i].title + '</label></div>');
						}
					}
				}
				this.currentQuestion += 1;
			} else {
				$('#next-question').addClass('hidden');
				$('#btn-result').removeClass('hidden');
			}

		},
		showResult: function() {
			console.dir(this.answersIds);
		},

		addAnswerId: function() {
			var that = this;
			$('[name="answer"]:checked').each(function(i, elem) {
				console.dir(elem.value);
				that.answersIds.push(elem.value);

			});

		},


	};



	$('#start-test').click(function() {
		var testId = $(this).data('test');
		$.ajax({
			type: "POST",
			url: "{{ route('test.data') }}",
			data: { test_id: testId },
		}).done(function (data) {
			console.dir(data);
			TEST.init(data);
			$('#next-question').removeClass('hidden');

		});
		return false;
	});

	$('#next-question').click( function() {
		TEST.addAnswerId();
		TEST.nextQuestion();
	});

	$('#btn-result').click( function() {
		TEST.showResult();
	});

</script>
@endsection