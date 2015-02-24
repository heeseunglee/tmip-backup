@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/datetimepicker/DateTimePicker.min.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/select2/select2.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Hr/coursesManagement/newCourses/request.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/moment/moment.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/datetimepicker/DateTimePicker.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/select2/select2.min.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkRoute('Trinity.index', '홈') }}</li>
            <li>{{ HTML::linkRoute('Trinity.Hr.coursesManagement', '클래스 관리') }}</li>
            <li class="active">신규 클래스 개설요청</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>신규 클래스 개설요청</small></h3>
        </div>
        <div class="section-body">
            @include('flash::message')
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">기본 정보</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-banded no-margin">
                                <tbody>
                                <tr>
                                    <td><strong>회사명</strong></td>
                                    <td class="text-center">{{ $current_user->userable->company->name }}</td>
                                    <td><strong>HR 담당자</strong></td>
                                    <td class="text-center">{{ $current_user->name_kor }}</td>
                                    <td><strong>담당 컨설턴트</strong></td>
                                    <td class="text-center">{{ $current_user->userable->consultant->user->name_kor }}</td>
                                </tr>
                                <tr>
                                    <td><strong>총 클래스 수</strong></td>
                                    <td class="text-center">{{ $current_user->userable->company->courses->count() }}</td>
                                    <td><strong>총 학생 수</strong></td>
                                    <td class="text-center">{{ $current_user->userable->company->students->count() }}</td>
                                    <td colspan="2" class="text-center">{{ date("Y-m-d H:i:s") }} 기준</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END BASIC TABLE -->
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">신규 클래스 개설요청</h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open(array('class' => 'form-horizontal form-banded form-validate',
                                                'role' => 'form')) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('curriculum', '희망과정 선택', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-8">
                                            {{ Form::text('curriculum', '', array('class' => 'form-control',
                                                                                'required' => '')) }}
                                        </div>
                                        <div class="col-sm-1">
                                            {{ Form::button('검색', array('class' => 'btn btn-primary',
                                                                        'id' => 'curriculum_popup_open')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('number_of_students', '수강생 수', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('number_of_students',
                                                array('' => '선택하세요',
                                                    '10' => '0 - 10명',
                                                    '20' => '10 - 20명',
                                                    '30' => '20 - 30명',
                                                    '40' => '30 - 40명',
                                                    '50' => '40 - 50명',
                                                    '60' => '50 - 60명',
                                                    '70' => '60 - 70명',
                                                    '80' => '70 - 80명'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('course_type', '희망과정 선택', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('course_type',
                                                array('' => '선택하세요',
                                                    '그룹 교육' => '그룹 교육',
                                                    '1:1 교육' => '1:1 교육',
                                                    '인텐시브 교육' => '인텐시브 교육',
                                                    '이그제큐티브 교육' => '이그제큐티브 교육'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('instructor_type', '희망 강사 타입', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('instructor_type',
                                                array('' => '선택하세요',
                                                    'KR' => '한국인 (원어민 레벨)',
                                                    'F4' => '재외국민 (F4 비자 보유자)',
                                                    'F2' => '원어민 (F2 비자 보유자)',
                                                    'F5' => '원어민 (F5 비자 보유자)'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('instructor_gender', '희망 강사 성별', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('instructor_gender',
                                                array('' => '선택하세요',
                                                    'M' => '남',
                                                    'F' => '여'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('instructor_career', '희망 강사 경력', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('instructor_career',
                                                array('' => '선택하세요',
                                                    '3' => '3년 이상',
                                                    '5' => '5년 이상',
                                                    '10' => '10년 이상',
                                                    '15' => '15년 이상'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('start_date', '희망 시작일', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-5">
                                            <?php
                                            $now = new DateTime("now");
                                            $min_date = $now->modify('+14 day');
                                            ?>
                                            {{ Form::text('start_date', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'date',
                                                                                    'data-format' => 'yyyy-MM-dd',
                                                                                    'readonly' => '',
                                                                                    'data-min' => $min_date->format('Y-m-d'))) }}
                                        </div>
                                        <div class="col-sm-4">
                                            {{ Form::text('start_time', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'time',
                                                                                    'data-format' => 'HH:mm',
                                                                                    'readonly' => '')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('end_date', '희망 종료일', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-5">
                                            {{ Form::text('end_date', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'date',
                                                                                    'data-format' => 'yyyy-MM-dd',
                                                                                    'readonly' => '')) }}
                                        </div>
                                        <div class="col-sm-4">
                                            {{ Form::text('end_time', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'time',
                                                                                    'data-format' => 'HH:mm',
                                                                                    'readonly' => '')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('running_days', '희망 요일', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('running_days',
                                                array('1' => '월',
                                                    '2' => '화',
                                                    '3' => '수',
                                                    '4' => '목',
                                                    '5' => '금',
                                                    '6' => '토',
                                                    '7' => '일'), null,
                                                    array('required' => '',
                                                        'multiple' => 'multiple',
                                                        'class' => 'form-control',
                                                        'name' => 'running_days[]')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('location', '희망 교육 장소', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::text('location', '', array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('level_test', '레벨테스트 여부', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::select('level_test',
                                                array('' => '선택하세요',
                                                    true => 'Y',
                                                    false => 'N'), '',
                                                    array('required' => '', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('meeting_date', '희망 미팅 날짜', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-5">
                                            {{ Form::text('meeting_date', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'date',
                                                                                    'data-format' => 'yyyy-MM-dd',
                                                                                    'readonly' => '')) }}
                                        </div>
                                        <div class="col-sm-4">
                                            {{ Form::text('meeting_time', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-field' => 'time',
                                                                                    'data-format' => 'HH:mm',
                                                                                    'readonly' => '')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('other_requests', '기타 요청사항', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::textarea('other_requests', '',
                                        array('class' => 'form-control',
                                                'rows' => '5',
                                                'placeholder' => '기타 요청사항을 적어주세요')) }}
                                </div>
                            </div>
                            <div class="form-footer text-right">
                                {{ Form::submit('양식 전송하기', array('class' => 'btn btn-primary')) }}
                            </div>
                            {{ Form::close() }}
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END BASIC TABLE -->
        </div>
    </section>
    <div id="dtBox"></div>
@stop