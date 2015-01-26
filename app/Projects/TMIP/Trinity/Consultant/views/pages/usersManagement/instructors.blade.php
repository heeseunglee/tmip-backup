@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
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
            <li><a href="../../html/.html">home</a></li>
            <li class="active">Blank</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard">
                <i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i>
                사용자 관리 <small>HR 관리</small>
            </h3>
        </div>
        <div class="section-body">

        </div><!--end .section-body -->
    </section>
@stop
