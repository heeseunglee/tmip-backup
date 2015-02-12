@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/coursesManagement/index.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement', '클래스 관리') }}</li>
            <li class="active">클래스 개설 요청 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>클래스 개설 요청 관리</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">클래스 개설 요청 현황</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-dataTable">
                                <thead>
                                <tr>
                                    <th width="100px;">상태</th>
                                    <th>고객사</th>
                                    <th>학생수</th>
                                    <th>교육 과정</th>
                                    <th>교육 형태</th>
                                    <th>미팅 희망일</th>
                                    <th>담당자</th>
                                    <th>승인자</th>
                                    <th width="100px;">작업</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requested_courses as $requested_course)
                                    <tr>
                                        <td>
                                            @if($requested_course->is_confirmed)
                                                <span class="label label-success">승인 완료</span>
                                            @else
                                                <span class="label label-warning">승인 대기</span>
                                            @endif
                                        </td>
                                        <td>{{ $requested_course->company->name }}</td>
                                        <td>
                                            {{ $requested_course->number_of_students - 10 }} - {{ $requested_course->number_of_students }}명
                                        </td>
                                        <td>
                                            <?php
                                                $curriculum_id_array = explode(',', $requested_course->curriculum);
                                            ?>
                                            @foreach($curriculum_id_array as $curriculum_id)
                                                {{ \CourseSubType::find($curriculum_id)->name }}<br/>
                                            @endforeach
                                        </td>
                                        <td>{{ $requested_course->course_type }}</td>
                                        <td>{{ $requested_course->meeting_datetime }}</td>
                                        <td>{{ $requested_course->hr->consultant->user->name_kor }}</td>
                                        <td>
                                            @if(!is_null($requested_course->consultant))
                                                {{ $requested_course->consultant->user->name_kor }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($requested_course->is_confirmed)
                                                <span class="label label-primary">
                                                {{ HTML::linkRoute('Trinity.Consultant.coursesManagement.preCourses.show',
                                                                '조회',
                                                                array('pre_course_id' => $requested_course->preCourse->id)) }}
                                            </span>
                                            @else
                                                <span class="label label-primary">
                                                {{ HTML::linkRoute('Trinity.Consultant.coursesManagement.requestedCourses.confirm',
                                                                '승인하기',
                                                                array('requested_course_id' => $requested_course->id)) }}
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection