@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/tooltipster/tooltipster.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/userManagement/usersRegistration.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/tooltipster/jquery.tooltipster.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.usersRegistration', '사용자 추가') }}</li>
        </ol>
        @include('flash::message')
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 사용자 관리 <small>사용자 추가</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>사용자 추가</strong></h4></header>
                        </div>
                        <div class="box-body">
                            <div class="box">
                                <div class="box-head">
                                    <ul class="nav nav-tabs nav-justified style-support3" data-toggle="tabs">
                                        <li class="active"><a href="#student_sign_up"><i class="fa fa-fw fa-user"></i> 학생 추가</a></li>
                                        <li><a href="#instructor_sign_up"><i class="fa fa-fw fa-gears"></i> 교수진 추가</a></li>
                                        <li><a href="#hr_sign_up"><i class="fa fa-fw fa-star"></i> HR 추가</a></li>
                                    </ul>
                                </div>
                                <div class="box-body tab-content">

                                    <div class="tab-pane active" id="student_sign_up">
                                    {{ Form::open(array('action' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpStudentsManually',
                                    'class' => 'form-horizontal form-validate','role' => 'form')) }}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-lg-3 col-sm-2">
                                                        <label for="company_select" class="control-label">고객사</label>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-9">
                                                        <select name="company_select" id="company_select" class="form-control" required="">
                                                            <option value="">선택하세요</option>
                                                            @foreach($companies as $company)
                                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-sm-1"></div>
                                            </div>

                                            <div class="col-lg-6">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button id="add_student_row" type="button" class="btn btn-success"><i class="fa flaticon-plus24"></i></button>
                                                <button id="remove_student_row" type="button" class="btn btn-danger"><i class="fa flaticon-minus17"></i></button>
                                            </div>
                                        </div>


                                        {{ Form::hidden('number_of_students', 1, array('id' => 'number_of_students')) }}

                                        <br/>

                                        <div id="student_row_1" class="row">
                                            <div class="col-lg-12">
                                                <div class="box">
                                                    <div class="box-head box-head-xs style-support3">
                                                        <header><h5 class="text-light">학생 <strong>#1</strong></h5></header>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <div class="col-lg-3 col-sm-2">
                                                                <label for="student_name_1" class="control-label">이름</label>
                                                            </div>
                                                            <div class="col-lg-9 col-sm-10">
                                                                <input type="text" name="student_name_1" id="student_name_1" class="form-control" placeholder="이름" required="" data-rule-minlength="2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-3 col-sm-2">
                                                                <label for="student_email_1" class="control-label">이메일</label>
                                                            </div>
                                                            <div class="col-lg-9 col-sm-10">
                                                                <input type="email" name="student_email_1" id="student_email_1" class="form-control" placeholder="이메일" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer text-right">
                                            <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                        </div>
                                    {{ Form::close() }}
                                    </div>
                                    <div class="tab-pane" id="instructor_sign_up">
                                    {{ Form::open(array('action' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpInstructorsManually',
                                    'class' => 'form-horizontal form-validate','role' => 'form')) }}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button id="add_instructor_row" type="button" class="btn btn-success"><i class="fa flaticon-plus24"></i></button>
                                                <button id="remove_instructor_row" type="button" class="btn btn-danger"><i class="fa flaticon-minus17"></i></button>
                                            </div>
                                        </div>
                                        {{ Form::hidden('number_of_instructors', 1, array('id' => 'number_of_instructors')) }}
                                        <br/>
                                        <div id="instructor_row_1" class="row">
                                            <div class="col-lg-12">
                                                <div class="box">
                                                    <div class="box-head box-head-xs style-support3">
                                                        <header><h5 class="text-light">교수진 <strong>#1</strong></h5></header>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <div class="col-lg-3 col-sm-2">
                                                                <label for="instructor_name_1" class="control-label">이름</label>
                                                            </div>
                                                            <div class="col-lg-9 col-sm-10">
                                                                <input type="text" name="instructor_name_1" id="instructor_name_1" class="form-control" placeholder="이름" required="" data-rule-minlength="2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-3 col-sm-2">
                                                                <label for="instructor_email_1" class="control-label">이메일</label>
                                                            </div>
                                                            <div class="col-lg-9 col-sm-10">
                                                                <input type="email" name="instructor_email_1" id="instructor_email_1" class="form-control" placeholder="이메일" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer text-right">
                                            <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                        </div>
                                    {{ Form::close() }}
                                    </div>
                                    <div class="tab-pane" id="hr_sign_up">
                                    {{ Form::open(array('action' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpHrsManually',
                                    'class' => 'form-horizontal form-validate','role' => 'form')) }}
                                        <div class="form-group">
                                            <div class="col-lg-3 col-sm-2">
                                                <label for="hr_name" class="control-label">이름</label>
                                            </div>
                                            <div class="col-lg-9 col-sm-10">
                                                <input type="text" name="hr_name" id="hr_name" class="form-control" placeholder="이름" required="" data-rule-minlength="2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-sm-2">
                                                <label for="hr_email_1" class="control-label">이메일</label>
                                            </div>
                                            <div class="col-lg-9 col-sm-10">
                                                <input type="email" name="hr_email" id="hr_email" class="form-control" placeholder="이메일" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-sm-2">
                                                <label for="consultant_select" class="control-label">담당 컨설턴트</label>
                                            </div>
                                            <div class="col-lg-9 col-sm-10">
                                                <select name="consultant_select" id="consultant_select" class="form-control" required="">
                                                    <option value="">선택하세요</option>
                                                    @foreach($consultants as $consultant)
                                                        <option value="{{ $consultant->id }}">{{ $consultant->user->name_kor }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-sm-2">
                                                <label for="company_select" class="control-label">고객사</label>
                                            </div>
                                            <div class="col-lg-9 col-sm-10">
                                                <select name="company_select" id="company_select" class="form-control" required="">
                                                    <option value="">선택하세요</option>
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-footer text-right">
                                            <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                        </div>
                                    {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection