@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Hr/firstLogin/firstLogin.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li class="active">첫 로그인 페이지</li>
        </ol>
        @include('flash::message')
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 첫 로그인 페이지 <small>추가 정보 입력</small></h3>
        </div>
        <div class="section-body">
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">추가 정보 입력</h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open(array('action' => 'Trinity.Hr.firstLogin.signUp',
                                                'class' => 'form-horizontal form-bordered form-validate',
                                                'role' => 'form',
                                                'files' => true)) }}
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('password', '새로운 비밀번호', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::password('password', array('class' => 'form-control',
                                                                        'required' => '',
                                                                        'data-rule-minlength' => '6')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('confirm_password', '비밀번호 확인', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::password('confirm_password', array('class' => 'form-control',
                                                                                'required' => '',
                                                                                'data-rule-equalto' => '#password')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('name_eng', '영문 이름', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::text('name_eng', '', array('class' => 'form-control', 'required' => '')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('phone_number', '개인 연락처', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::text('phone_number', '', array('class' => 'form-control',
                                                                            'required' => '',
                                                                            'data-inputmask' => "'mask': '99999999999'")) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {{ Form::label('profile_image', '프로필 이미지', array('class' => 'control-label')) }}
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::file('profile_image') }}
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