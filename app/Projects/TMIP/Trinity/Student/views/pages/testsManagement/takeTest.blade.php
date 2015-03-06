
<?php
    $question_pool = \LvlTestMc::find($lvl_test->lvl_test_mc_id);
    $lvl_test_proceed_step = \DB::table('students_attend_pre_courses')
                                ->where('lvl_test_id', $lvl_test->id)
                                ->first()
                                ->lvl_test_proceed_step;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-head style-primary">
                <header><h4 class="text-light">테스트 진행 ::: 남은 시간 : <strong id="countdown"></strong></h4></header>
            </div>
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt class="lvl_test">입문 1.</dt>
                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($question_pool->question_1)->question }}</dd>
                    <dt class="lvl_test">&nbsp;</dt>
                    <dd class="lvl_test">&nbsp;</dd>
                    <dt class="lvl_test"></dt>
                    <dd class="lvl_test">
                        <label class="radio-inline">
                            <input type="radio" name="answer_1" value="1">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_1)->example_1 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_1" value="2">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_1)->example_2 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_1" value="3">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_1)->example_3 }}
                        </label>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="lvl_test">입문 2.</dt>
                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($question_pool->question_2)->question }}</dd>
                    <dt class="lvl_test">&nbsp;</dt>
                    <dd class="lvl_test">&nbsp;</dd>
                    <dt class="lvl_test"></dt>
                    <dd class="lvl_test">
                        <label class="radio-inline">
                            <input type="radio" name="answer_2" value="1">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_2)->example_1 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_2" value="2">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_2)->example_2 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_2" value="3">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_2)->example_3 }}
                        </label>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="lvl_test">입문 3.</dt>
                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($question_pool->question_3)->question }}</dd>
                    <dt class="lvl_test">&nbsp;</dt>
                    <dd class="lvl_test">&nbsp;</dd>
                    <dt class="lvl_test"></dt>
                    <dd class="lvl_test">
                        <label class="radio-inline">
                            <input type="radio" name="answer_3" value="1">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_3)->example_1 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_3" value="2">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_3)->example_2 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_3" value="3">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_3)->example_3 }}
                        </label>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="lvl_test">입문 4.</dt>
                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($question_pool->question_4)->question }}</dd>
                    <dt class="lvl_test">&nbsp;</dt>
                    <dd class="lvl_test">&nbsp;</dd>
                    <dt class="lvl_test"></dt>
                    <dd class="lvl_test">
                        <label class="radio-inline">
                            <input type="radio" name="answer_4" value="1">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_4)->example_1 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_4" value="2">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_4)->example_2 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_4" value="3">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_4)->example_3 }}
                        </label>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="lvl_test">입문 5.</dt>
                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($question_pool->question_5)->question }}</dd>
                    <dt class="lvl_test">&nbsp;</dt>
                    <dd class="lvl_test">&nbsp;</dd>
                    <dt class="lvl_test"></dt>
                    <dd class="lvl_test">
                        <label class="radio-inline">
                            <input type="radio" name="answer_5" value="1">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_5)->example_1 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_5" value="2">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_5)->example_2 }}
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="answer_5" value="3">
                            {{ \LvlTestMcPoolBeginner::find($question_pool->question_5)->example_3 }}
                        </label>
                    </dd>
                </dl>
                <p class="text-center">
                    <button type="button" class="btn btn-primary" onclick="submitTest({{ $lvl_test_id }})">시험 제출하기</button>
                    <button type="button" class="btn btn-danger" onclick="pauseTest({{ $lvl_test_id }})">시험 일시 정지</button>
                </p>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>

<script>
    var currentTime = {{ \DB::table('students_attend_pre_courses')
                                        ->where('lvl_test_id', $lvl_test->id)
                                        ->first()
                                        ->lvl_test_time_left }};

    $(document).ready(function() {

        var displayMessage = true;

        $(window).bind('beforeunload', function(){
            //the custom message for page unload doesn't work on Firefox
            if(displayMessage){
                var message = '시험이 일시 정지 되었습니다.';
                return message;
            }
        });

        $('*').hover(
                function(){displayMessage = false;},
                function(){displayMessage = true;}
        );

    });

    $(document).ready(function() {
        var test_timer = new (function() {
            var $countdown;
            var $form;
            var decrementTime = 70;

            $(function() {

                // Setup the timer
                $countdown = $('#countdown');
                test_timer.Timer = $.timer(updateTimer, decrementTime, true);

            });

            function updateTimer() {

                // Output timer position
                var timeString = formatTime(currentTime);
                $countdown.html(timeString);

                // If timer is complete, trigger alert
                if (currentTime == 0) {
                    test_timer.Timer.stop();
                    alert('시험 시간이 종료되었습니다.');
                    //타이머 종료 후 작업 추가
                    return;
                }

                // Increment timer position
                currentTime -= decrementTime;
                if (currentTime < 0) currentTime = 0;

            }

            this.resetCountdown = function() {

                // Get time from form
                var newTime = parseInt($form.find('input[type=text]').val()) * 1000;
                if (newTime > 0) {currentTime = newTime;}

                // Stop and reset timer
                test_timer.Timer.stop().once();

            };

        });

        // Common functions
        function pad(number, length) {
            var str = '' + number;
            while (str.length < length) {str = '0' + str;}
            return str;
        }
        function formatTime(time) {
            time = time / 10;
            var min = parseInt(time / 6000),
                    sec = parseInt(time / 100) - (min * 60),
                    hundredths = pad(time - (sec * 100) - (min * 6000), 2);
            return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
        }
    });
</script>