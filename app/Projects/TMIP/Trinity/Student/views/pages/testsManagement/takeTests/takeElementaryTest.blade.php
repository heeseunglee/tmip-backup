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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 테스트 진행 <small>초급편</small></h3>
        </div>
        <div class="section-body">
            @include('flash::message')
            <?php
            $lvl_test_mc = \LvlTestMc::find($lvl_test->lvl_test_mc_id);
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">테스트 진행 - 초급 - ::: 남은 시간 : <strong id="countdown"></strong></h4></header>
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
                                    $q6 = \LvlTestMcPoolElementary::find($lvl_test_mc->question_6);
                                    $q7 = \LvlTestMcPoolElementary::find($lvl_test_mc->question_7);
                                    $q8 = \LvlTestMcPoolElementary::find($lvl_test_mc->question_8);
                                    $q9 = \LvlTestMcPoolElementary::find($lvl_test_mc->question_9);
                                    $q10 = \LvlTestMcPoolElementary::find($lvl_test_mc->question_10);
                                ?>
                                <dt class="lvl_test">초급 1.</dt>
                                <dd class="lvl_test">{{ $q6->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_6" value="1" @if($lvl_test_mc->answer_6 == 1) checked="" @endif>
                                        {{ $q6->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_6" value="2" @if($lvl_test_mc->answer_6 == 2) checked="" @endif>
                                        {{ $q6->example_2 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_6" value="3" @if($lvl_test_mc->answer_6 == 3) checked="" @endif>
                                        {{ $q6->example_3 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_6" value="4" @if($lvl_test_mc->answer_6 == 4) checked="" @endif>
                                        {{ $q6->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="lvl_test">초급 2.</dt>
                                <dd class="lvl_test">{{ $q7->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_7" value="1" @if($lvl_test_mc->answer_7 == 1) checked="" @endif>
                                        {{ $q7->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_7" value="2" @if($lvl_test_mc->answer_7 == 2) checked="" @endif>
                                        {{ $q7->example_2 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_7" value="3" @if($lvl_test_mc->answer_7 == 3) checked="" @endif>
                                        {{ $q7->example_3 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_7" value="4" @if($lvl_test_mc->answer_7 == 4) checked="" @endif>
                                        {{ $q7->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="lvl_test">초급 3.</dt>
                                <dd class="lvl_test">{{ $q8->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_8" value="1" @if($lvl_test_mc->answer_8 == 1) checked="" @endif>
                                        {{ $q8->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_8" value="2" @if($lvl_test_mc->answer_8 == 2) checked="" @endif>
                                        {{ $q8->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_8" value="3" @if($lvl_test_mc->answer_8 == 3) checked="" @endif>
                                        {{ $q8->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_8" value="4" @if($lvl_test_mc->answer_8 == 4) checked="" @endif>
                                        {{ $q8->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <blockquote>
                                    <small>{{ $q9->text }}</small>
                                </blockquote>
                                <dt class="lvl_test">초급 4.</dt>
                                <dd class="lvl_test">{{ $q9->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_9" value="1" @if($lvl_test_mc->answer_9 == 1) checked="" @endif>
                                        {{ $q9->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_9" value="2" @if($lvl_test_mc->answer_9 == 2) checked="" @endif>
                                        {{ $q9->example_2 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <blockquote>
                                    <small>{{ $q10->text }}</small>
                                </blockquote>
                                <dt class="lvl_test">초급 5.</dt>
                                <dd class="lvl_test">{{ $q10->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_10" value="1" @if($lvl_test_mc->answer_10 == 1) checked="" @endif>
                                        {{ $q10->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_10" value="2" @if($lvl_test_mc->answer_10 == 2) checked="" @endif>
                                        {{ $q10->example_2 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_10" value="3" @if($lvl_test_mc->answer_10 == 3) checked="" @endif>
                                        {{ $q10->example_3 }}
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