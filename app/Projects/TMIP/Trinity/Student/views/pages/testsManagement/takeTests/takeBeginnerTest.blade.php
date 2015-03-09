@extends('TrinityStudentView::layouts.takeTests.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-timer/jquery.timer.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Student/testsManagement/takeTests/take.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkRoute('Trinity.index', '홈') }}</li>
            <li>{{ HTML::linkRoute('Trinity.Student.testsManagement', '테스트 관리') }}</li>
            <li class="active">테스트 진행</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 테스트 진행 <small>입문편</small></h3>
        </div>
        <div class="section-body">
            @include('flash::message')
            <?php
                $lvl_test_mc = \LvlTestMc::find($lvl_test->lvl_test_mc_id);
                $lvl_test_proceed_step = \DB::table('students_attend_pre_courses')
                        ->where('lvl_test_id', $lvl_test->id)
                        ->first()
                        ->lvl_test_proceed_step;
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">테스트 진행 - 입문 - ::: 남은 시간 : <strong id="countdown"></strong></h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open() }}
                                <input name="lvl_test_time_left"
                                       type="hidden"
                                       value="{{ \DB::table('students_attend_pre_courses')
                                                        ->where('lvl_test_id', $lvl_test_id)
                                                        ->first()
                                                        ->lvl_test_time_left }}"/>
                                <dl class="dl-horizontal">
                                    <?php
                                        $q1 = \LvlTestMcPoolBeginner::find($lvl_test_mc->question_1);
                                    ?>
                                    <dt class="lvl_test">입문 1.</dt>
                                    <dd class="lvl_test">{{ $q1->question }}</dd>
                                    <dt class="lvl_test">&nbsp;</dt>
                                    <dd class="lvl_test">&nbsp;</dd>
                                    <dt class="lvl_test"></dt>
                                    <dd class="lvl_test">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_1" value="1" @if($lvl_test_mc->answer_1 == 1) checked="" @endif>
                                            {{ $q1->example_1 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_1" value="2" @if($lvl_test_mc->answer_1 == 2) checked="" @endif>
                                            {{ $q1->example_2 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_1" value="3" @if($lvl_test_mc->answer_1 == 3) checked="" @endif>
                                            {{ $q1->example_3 }}
                                        </label>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="lvl_test">입문 2.</dt>
                                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_2)->question }}</dd>
                                    <dt class="lvl_test">&nbsp;</dt>
                                    <dd class="lvl_test">&nbsp;</dd>
                                    <dt class="lvl_test"></dt>
                                    <dd class="lvl_test">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_2" value="1" @if($lvl_test_mc->answer_2 == 1) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_2)->example_1 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_2" value="2" @if($lvl_test_mc->answer_2 == 2) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_2)->example_2 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_2" value="3" @if($lvl_test_mc->answer_2 == 3) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_2)->example_3 }}
                                        </label>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="lvl_test">입문 3.</dt>
                                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_3)->question }}</dd>
                                    <dt class="lvl_test">&nbsp;</dt>
                                    <dd class="lvl_test">&nbsp;</dd>
                                    <dt class="lvl_test"></dt>
                                    <dd class="lvl_test">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_3" value="1" @if($lvl_test_mc->answer_3 == 1) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_3)->example_1 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_3" value="2" @if($lvl_test_mc->answer_3 == 2) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_3)->example_2 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_3" value="3" @if($lvl_test_mc->answer_3 == 3) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_3)->example_3 }}
                                        </label>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="lvl_test">입문 4.</dt>
                                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_4)->question }}</dd>
                                    <dt class="lvl_test">&nbsp;</dt>
                                    <dd class="lvl_test">&nbsp;</dd>
                                    <dt class="lvl_test"></dt>
                                    <dd class="lvl_test">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_4" value="1" @if($lvl_test_mc->answer_4 == 1) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_4)->example_1 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_4" value="2" @if($lvl_test_mc->answer_4 == 2) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_4)->example_2 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_4" value="3" @if($lvl_test_mc->answer_4 == 3) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_4)->example_3 }}
                                        </label>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="lvl_test">입문 5.</dt>
                                    <dd class="lvl_test">{{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_5)->question }}</dd>
                                    <dt class="lvl_test">&nbsp;</dt>
                                    <dd class="lvl_test">&nbsp;</dd>
                                    <dt class="lvl_test"></dt>
                                    <dd class="lvl_test">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_5" value="1" @if($lvl_test_mc->answer_5 == 1) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_5)->example_1 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_5" value="2" @if($lvl_test_mc->answer_5 == 2) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_5)->example_2 }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_5" value="3" @if($lvl_test_mc->answer_5 == 3) checked="" @endif>
                                            {{ \LvlTestMcPoolBeginner::find($lvl_test_mc->question_5)->example_3 }}
                                        </label>
                                    </dd>
                                </dl>
                                <div class="form-footer text-center">
                                    {{ Form::submit('시험 제출하기', array('type' => 'button',
                                                                        'class' => 'btn btn-primary',
                                                                        'name' => 'submit')) }}
                                    {{ Form::submit('시험 일시정지', array('type' => 'button',
                                                                        'class' => 'btn btn-danger',
                                                                        'name' => 'pause')) }}
                                </div>
                            {{ Form::close() }}
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
        </div>
    </section>
@stop