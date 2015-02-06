@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Student/firstLogin/firstLogin.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkRoute('Trinity.index', '홈') }}</li>
            <li>{{ HTML::linkRoute('Trinity.Student.coursesManagement', '클래스 관리') }}</li>
            <li class="active">전체 보기</li>
        </ol>
        @include('flash::message')
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>전체 보기</small></h3>
        </div>
        <div class="section-body">
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">클래스 전체보기</h4></header>
                        </div>
                        <div class="box-body">

                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END BASIC TABLE -->
        </div>
    </section>
@stop