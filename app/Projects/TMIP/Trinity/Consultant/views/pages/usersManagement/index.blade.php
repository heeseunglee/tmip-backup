@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/simpleicon-interface/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/tooltipster/tooltipster.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/userManagement/index.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/tooltipster/jquery.tooltipster.min.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.index', '전체 보기') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 사용자 관리 <small>전체 보기</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">컨설턴트 담당 <strong>클래스</strong> 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="btn-group">
                                            <button class="btn btn-support1 dropdown-toggle" data-toggle="dropdown">
                                                컨설턴트 선택 <i class="fa fa-caret-down"></i>
                                            </button>
                                            <ul class="dropdown-menu animation-zoom">
                                                @foreach($consultants as $consultant)
                                                    <li>
                                                        <a href="#" class="link_users_management_index_ajax_consultant_course">
                                                            {{ Form::hidden('consultant_id', $consultant->id) }}
                                                            {{ $consultant->user->name_kor }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div id="insert"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="users_management_index_company_course_detail" class="col-sm-12"></div>
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
        </div>
        <div class="section-body hide">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">컨설턴트 담당 <strong>고객사</strong> 현황</h4></header>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="btn-group">
                                            <button class="btn btn-support1 dropdown-toggle" data-toggle="dropdown">
                                                컨설턴트 선택 <i class="fa fa-caret-down"></i>
                                            </button>
                                            <ul class="dropdown-menu animation-zoom">
                                                @foreach($consultants as $consultant)
                                                    <li>
                                                        <a href="#" class="link_users_management_index_ajax_consultant_course">
                                                            {{ Form::hidden('consultant_id', $consultant->id) }}
                                                            {{ $consultant->user->name_kor }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div id="insert"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="users_management_index_company_class_detail" class="col-sm-12"></div>
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
        </div>
    </section>
@endsection