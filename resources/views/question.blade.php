@extends('layouts.app')

@section('content')
<div id="card-box" class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="alert-msg" class="alert alert-warning" role="alert">
                Please complete answering the following question.
            </div>
            <div class="card border-info mb-6">
                <div class="d-flex card-header bg-info text-white" id="h1">
                    <span id="question-no-span">{{ __('Question ') }} </span>
                </div>
                <div class="card-body d-flex">
                    <div class="container w-100"  style="margin-bottom:40px;">
                        <div class="row">
                            <input id="questionNo" type="hidden" name="question_no" value="" />
                            <input id="isAnswered" type="hidden" name="is_answered" value="" />
                            <div id="question-container">
                                {{ $question->question ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container flex-column d-flex justify-content-center align-items-center" style="margin-bottom:40px;">
                        <div class="flex-row">
                        <select id="example-square" name="rating" autocomplete="off" style="display: none;">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                        </div>
                        <div class="flex-row description">
                            <span>Strongly disagree</span> 
                            <span class="middle-neutral">Neutral</span> 
                            <span class="left-disagree">Strongly agree</span>
                        </div>
                </div>
                
                
            </div>
            <div class="container pagination-wrapper" style="margin-top:20px;">
                <!--<a class="btn btn-primary">Previous</a>-->
                <a id="btn-next" class="container-fluid btn btn-lg btn-primary btn-block">Next</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" defer>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

    $(function() {
      
            $.ajax({
                type:'GET',
                url:"{{route('question.next')}}",
                success:function(data, success, error) {
                    var questionText = "Question " + data.no + " / 108";
                    $('#question-no-span').text(questionText);

                    $('#question-container').html(data.question);
                    $('#questionNo').val(data.no);
                }
            });

            var questionId = $('#questionId').val();
            $('#example-square').barrating({
                theme: 'bars-square',
                showValues: true,
                showSelectedRating: false,
                hoverState: false,
                onSelect: function(value, text, event) {
                    var page = $('#questionNo').val();
                    $.ajax({
                        type:'POST',
                        url:"{{ route('answer.submission') }}",
                        data:{question_no: page, question_id: questionId, answered: value},
                        success:function(data) {
                            if(page === "108") {
                                $('#btn-next').text('Submit');
                            }
                            $('#isAnswered').val("1");
                        }
                    });
                }
            });
            $('#btn-next').click(function() {
                if($('#btn-next').text() === "Submit") {
                    var checkUrl = "{{ route('question.verify') }}";
                    var url = "{{ route('answer.completion') }}";
                    var url2 = "{{ route('question.next') }}";
                    $.ajax({
                            type:'GET',
                            url:checkUrl,
                            success:function(data, success, error) {
                                if(data.status === 0) {
                                    url2 = url2 + "?page=" + data.index;
                                    $.ajax({
                                        type:'GET',
                                        url:url2,
                                        success:function(data, success, error) {
                                            var questionText = "Question " + data.no;
                                            $('#question-no-span').text(questionText);
                                            $('#question-container').text(data.question);
                                            $('#questionNo').val(data.no);
                                            $('#example-square').barrating('clear');
                                            $('#isAnswered').val("");
                                            $('#alert-msg').show();
                                        }
                                    });
                                } else {
                                    $.ajax({
                                        type:'GET',
                                        url:url,
                                        success:function(data, success, error) {
                                            $("#card-box").html(data);
                                        }
                                    });
                                }
                            }
                        });
                       
                } else {
                    var check = $('#isAnswered').val();
                    if(check === "") {
                        alert("Please select an answer first!")
                    } else {
                        var page = $('#questionNo').val();
                        var url = "{{ route('question.next') }}" + "?page=" + page;
                        $.ajax({
                            type:'GET',
                            url:url,
                            success:function(data, success, error) {
                                var questionText = "Question " + data.no;
                                $('#question-no-span').text(questionText);
                                $('#question-container').text(data.question);
                                $('#questionNo').val(data.no);
                                $('#example-square').barrating('clear');
                                $('#isAnswered').val("");
                            }
                        });
                    }
                }
   
            });
            $('.br-widget a').addClass('space-out');
        });
</script>
@endsection
