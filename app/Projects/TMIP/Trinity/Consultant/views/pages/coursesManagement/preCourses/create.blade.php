@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/select2/select2.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/coursesManagement/preCourses/create.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/moment/moment.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.ko.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/select2/select2.min.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkRoute('Trinity.index', '홈') }}</li>
            <li>{{ HTML::linkRoute('Trinity.Consultant.coursesManagement', '클래스 관리') }}</li>
            <li class="active">Pre 클래스 개설</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>Pre 클래스 개설</small></h3>
        </div>
        <div class="section-body">
            @include('flash::message')
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 개설</h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open(array('class' => 'form-horizontal form-banded form-validate',
                                                'role' => 'form')) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('company', '고객사', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            <?php
                                            $companies = \Company::all();
                                            $companies_id_array = array('' => '선택하세요');
                                            foreach($companies as $company) {
                                                $companies_id_array[$company->id] = $company->name;
                                            }
                                            ?>
                                            {{ Form::select('company',
                                                            $companies_id_array,
                                                            '',
                                                            array('required' => '',
                                                                'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="hr_list">

                                </div>
                            </div>
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
                                                    '80' => '70 - 80명'),
                                                    '',
                                                    array('required' => '',
                                                        'class' => 'form-control')) }}
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
                                            {{ Form::label('start_datetime', '희망 시작일', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::text('start_datetime', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-time-component' => 30)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {{ Form::label('end_datetime', '희망 종료일', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::text('end_datetime', '', array('required' => '',
                                                                                    'class' => 'form-control',
                                                                                    'data-time-component' => 30)) }}
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
                                            {{ Form::label('meeting_datetime', '희망 미팅 날짜', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-9">
                                            {{ Form::text('meeting_datetime', '', array('required' => '', 'class' => 'form-control',
                                                                                            'data-time-component' => 30)) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
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
@stop