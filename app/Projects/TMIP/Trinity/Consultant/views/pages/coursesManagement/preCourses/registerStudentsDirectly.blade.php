@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/multi-select/multi-select.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/multi-select/jquery.multi-select.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/coursesManagement/preCourses/registerStudentsDirectly.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement', '클래스 관리') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement.preCourses', 'Pre 클래스 관리') }}</li>
            <li class="active">Pre 클래스 학생 등록</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>Pre 클래스 학생 등록</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 학생 등록 : 현재 {{ $pre_course->students->count() }}명 / 추가 {{ $pre_course->students->count() + 1 }}명</h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open(array('class' => 'form-horizontal form-validate form-banded',
                                                'role' => 'form')) }}
                                <?php
                                    //$students = $pre_course->company->students;
                                ?>
                                @if($students_list->count() > 0)
                                    <?php
                                        foreach($students_list as $student) {
                                            $students_array[$student->id] = $student->user->name_kor.' ('.$student->user->account_email.')';
                                        }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            {{ Form::label('existing_students', '기존 학생', array('class' => 'control-label')) }}
                                        </div>
                                        <div class="col-sm-10">
                                            {{ Form::select('existing_students',
                                                            $students_array,
                                                            null,
                                                            array('multiple' => 'multiple',
                                                                'class' => 'form-control',
                                                                'name' => 'existing_students[]')) }}
                                        </div>
                                    </div>
                                @endif
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button id="add_student_row" type="button" class="btn btn-success"><i class="fa flaticon-plus24"></i></button>
                                        <button id="remove_student_row" type="button" class="btn btn-danger"><i class="fa flaticon-minus17"></i></button>
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>
                                {{ Form::hidden('number_of_students', $pre_course->students->count() + 1) }}
                                @if($students_list->count() == 0)
                                    <div class="student_row row">
                                        <div class="box">
                                            <div class="box-head box-head-xs style-support3">
                                                <header><h5 class="text-light">학생 <strong>#{{ $pre_course->students->count() + 1 }}</strong></h5></header>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-2">
                                                        <label for="student_name[]" class="control-label">이름</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="student_name[]" class="form-control" placeholder="이름" required="" data-rule-minlength="2">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2">
                                                        <label for="student_email[]" class="control-label">이메일</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="student_email[]" class="form-control" placeholder="이메일" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{ Form::hidden('end_of_student_row') }}
                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection