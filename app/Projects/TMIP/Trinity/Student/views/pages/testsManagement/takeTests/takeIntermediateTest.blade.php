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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 테스트 진행 <small>중급편</small></h3>
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
                            <header><h4 class="text-light">테스트 진행 - 중급 - ::: 남은 시간 : <strong id="countdown"></strong></h4></header>
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
                                    $q11 = \LvlTestMcPoolIntermediate::find($lvl_test_mc->question_11);
                                    $q12 = \LvlTestMcPoolIntermediate::find($lvl_test_mc->question_12);
                                    $q13 = \LvlTestMcPoolIntermediate::find($lvl_test_mc->question_13);
                                    $q14 = \LvlTestMcPoolIntermediate::find($lvl_test_mc->question_14);
                                    $q15 = \LvlTestMcPoolIntermediate::find($lvl_test_mc->question_15);
                                ?>
                                <dt class="lvl_test">중급 1.</dt>
                                <dd class="lvl_test">{{ $q11->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_11" value="1" @if($lvl_test_mc->answer_11 == 1) checked="" @endif>
                                        {{ $q11->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_11" value="2" @if($lvl_test_mc->answer_11 == 2) checked="" @endif>
                                        {{ $q11->example_2 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_11" value="3" @if($lvl_test_mc->answer_11 == 3) checked="" @endif>
                                        {{ $q11->example_3 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_11" value="4" @if($lvl_test_mc->answer_11 == 4) checked="" @endif>
                                        {{ $q11->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="lvl_test">중급 2.</dt>
                                <dd class="lvl_test">{{ $q12->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_12" value="1" @if($lvl_test_mc->answer_12 == 1) checked="" @endif>
                                        {{ $q12->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_12" value="2" @if($lvl_test_mc->answer_12 == 2) checked="" @endif>
                                        {{ $q12->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_12" value="3" @if($lvl_test_mc->answer_12 == 3) checked="" @endif>
                                        {{ $q12->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_12" value="4" @if($lvl_test_mc->answer_12 == 4) checked="" @endif>
                                        {{ $q12->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="lvl_test">중급 3.</dt>
                                <dd class="lvl_test">{{ $q13->text }}</dd>
                                <dt class="lvl_test">중급 3-1.</dt>
                                <dd class="lvl_test">{{ $q13->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_131" value="1" @if($lvl_test_mc->answer_131 == 1) checked="" @endif>
                                        {{ $q13->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_131" value="2" @if($lvl_test_mc->answer_131 == 2) checked="" @endif>
                                        {{ $q13->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_131" value="3" @if($lvl_test_mc->answer_131 == 3) checked="" @endif>
                                        {{ $q13->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_131" value="4" @if($lvl_test_mc->answer_131 == 4) checked="" @endif>
                                        {{ $q13->example_4 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test">중급 3-2.</dt>
                                <dd class="lvl_test">{{ $q13->question_2 }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_132" value="5" @if($lvl_test_mc->answer_132 == 5) checked="" @endif>
                                        {{ $q13->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_132" value="6" @if($lvl_test_mc->answer_132 == 6) checked="" @endif>
                                        {{ $q13->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_132" value="7" @if($lvl_test_mc->answer_132 == 7) checked="" @endif>
                                        {{ $q13->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_132" value="8" @if($lvl_test_mc->answer_132 == 8) checked="" @endif>
                                        {{ $q13->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="lvl_test">중급 4.</dt>
                                <dd class="lvl_test">{{ $q14->text }}</dd>
                                <dt class="lvl_test">중급 4-1.</dt>
                                <dd class="lvl_test">{{ $q14->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_141" value="1" @if($lvl_test_mc->answer_141 == 1) checked="" @endif>
                                        {{ $q14->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_141" value="2" @if($lvl_test_mc->answer_141 == 2) checked="" @endif>
                                        {{ $q14->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_141" value="3" @if($lvl_test_mc->answer_141 == 3) checked="" @endif>
                                        {{ $q14->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_141" value="4" @if($lvl_test_mc->answer_141 == 4) checked="" @endif>
                                        {{ $q14->example_4 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test">중급 4-2.</dt>
                                <dd class="lvl_test">{{ $q14->question_2 }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_142" value="5" @if($lvl_test_mc->answer_142 == 5) checked="" @endif>
                                        {{ $q14->example_1 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_142" value="6" @if($lvl_test_mc->answer_142 == 6) checked="" @endif>
                                        {{ $q14->example_2 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_142" value="7" @if($lvl_test_mc->answer_142 == 7) checked="" @endif>
                                        {{ $q14->example_3 }}
                                    </label>
                                </dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_142" value="8" @if($lvl_test_mc->answer_142 == 8) checked="" @endif>
                                        {{ $q14->example_4 }}
                                    </label>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <blockquote>
                                    <small>{{ $q15->text }}</small>
                                </blockquote>
                                <dt class="lvl_test">중급 5.</dt>
                                <dd class="lvl_test">{{ $q15->question }}</dd>
                                <dt class="lvl_test">&nbsp;</dt>
                                <dd class="lvl_test">&nbsp;</dd>
                                <dt class="lvl_test"></dt>
                                <dd class="lvl_test">
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_15" value="1" @if($lvl_test_mc->answer_15 == 1) checked="" @endif>
                                        {{ $q15->example_1 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_15" value="2" @if($lvl_test_mc->answer_15 == 2) checked="" @endif>
                                        {{ $q15->example_2 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_15" value="3" @if($lvl_test_mc->answer_15 == 3) checked="" @endif>
                                        {{ $q15->example_3 }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="answer_15" value="4" @if($lvl_test_mc->answer_15 == 4) checked="" @endif>
                                        {{ $q15->example_4 }}
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