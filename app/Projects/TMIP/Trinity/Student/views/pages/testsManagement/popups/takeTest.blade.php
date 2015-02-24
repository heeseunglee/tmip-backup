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
            <!-- START BASIC TABLE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">테스트 현황</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>테스트 명</th>
                                        <th>테스트 유형</th>
                                        <th>테스트 가능시간</th>
                                        <th>테스트 진행시간</th>
                                        <th>문항수</th>
                                        <th>진행도</th>
                                        <th class="text-right" style="width:90px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pre_courses as $pre_course)
                                        @if($pre_course->level_test)
                                            <tr>
                                                <td>
                                                    @if($pre_course->status == "진행 중")
                                                        <span class="label label-success">진행 중</span>
                                                    @else
                                                        <span class="label label-danger">완료</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $pre_course->company->name }} : {{ $pre_course->course_type }}
                                                </td>
                                                <td>
                                                    입과 테스트
                                                </td>
                                                <td>
                                                    30분
                                                </td>
                                                <td>
                                                    TODO
                                                </td>
                                                <td>
                                                    20문항
                                                </td>
                                                <td>
                                                    <div class="progress no-margin">
                                                        <div class="progress-bar progress-bar-success" style="width: 80%">
                                                            80%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></button>
                                                    <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
        </div>
    </section>
@stop