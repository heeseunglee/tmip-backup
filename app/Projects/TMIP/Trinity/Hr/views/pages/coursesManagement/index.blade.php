@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')

@endsection

@section('additional_js_includes')

@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Hr.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Hr.coursesManagement', '사용자 관리') }}</li>
            <li class="active">전체 보기</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>전체 보기</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>HR</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection