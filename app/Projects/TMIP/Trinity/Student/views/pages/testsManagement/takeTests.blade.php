@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/core/Student/testsManagement/takeTests.js') }}
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
                                                    @if($pre_course->pivot->lvl_test_status == "대기")
                                                        <span class="label style-gray">{{ $pre_course->pivot->lvl_test_status }}</span>
                                                    @elseif($pre_course->pivot->lvl_test_status == "진행 중")
                                                        <span class="label label-success">{{ $pre_course->pivot->lvl_test_status }}</span>
                                                    @else
                                                        <span class="label label-danger">{{ $pre_course->pivot->lvl_test_status }}</span>
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
                                                    @if($pre_course->pivot->lvl_test_status == "대기")
                                                        <button id="take_test" type="button" onclick="takeTest({{ $pre_course->pivot->lvl_test_id }})"
                                                                class="btn btn-xs btn-default btn-equal" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="테스트 진행">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    @elseif($pre_course->pivot->lvl_test_status == "진행 중")
                                                        <button type="button" onclick="takeTest({{ $pre_course->pivot->lvl_test_id }})"
                                                                class="btn btn-xs btn-default btn-equal" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="테스트 진행">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    @else
                                                        <a class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="결과 보기">
                                                            <i class="fa fa-copy"></i>
                                                        </a>
                                                    @endif
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

    <script>
        function takeTest(lvl_test_id) {
            window.open('popups/takeTest/' + lvl_test_id, 'popup', 'width=800px, height=600px, left=300px, top=200px, resizeable=false');
            $("#take_test").remove();
        }
    </script>
@stop