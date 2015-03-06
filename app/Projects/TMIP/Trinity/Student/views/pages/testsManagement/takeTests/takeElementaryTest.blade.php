@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkRoute('Trinity.index', '홈') }}</li>
            <li>{{ HTML::linkRoute('Trinity.Student.testsManagement', '테스트 관리') }}</li>
            <li class="active">테스트 진행</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 테스트 관리 <small>테스트 진행</small></h3>
        </div>
        <div class="section-body">
            @include('flash::message')
            adsfasdfasdfadsfadsfadsfasdf
        </div>
    </section>
@stop