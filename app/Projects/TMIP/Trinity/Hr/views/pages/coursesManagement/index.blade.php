@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Hr/coursesManagement/index.js') }}
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
            <?php
                $requested_courses = \RequestedCourse::all();
            ?>
            @if ($requested_courses->count() > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-head style-primary">
                                <header><h4 class="text-light">신규 클래스 요청 현황</h4></header>
                            </div>
                            <div class="box-body">
                                <table class="table table-hover table-dataTable">
                                    <thead>
                                    <tr>
                                        <th>진행 상태</th>
                                        <th>교육 과정</th>
                                        <th>학생 수</th>
                                        <th>교육 형태</th>
                                        <th>미팅 희망일</th>
                                        <th>시작일</th>
                                        <th>종료일</th>
                                        <th>장소</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requested_courses as $requested_course)
                                        <?php
                                            $curriculum_id_array = explode(',', $requested_course->curriculum);
                                        ?>
                                        <tr>
                                            <td>
                                            @if($requested_course->is_confirmed)
                                                <span class="label label-success">승인 완료</span>
                                            @else
                                                <span class="label label-default">승인 대기</span>
                                            @endif
                                            </td>
                                            <td>
                                            @foreach($curriculum_id_array as $curriculum_id)
                                                {{ \CourseSubType::find($curriculum_id)->name }}<br/>
                                            @endforeach
                                            </td>
                                            <td>{{ $requested_course->number_of_students }}</td>
                                            <td>{{ $requested_course->course_type }}</td>
                                            <td>{{ $requested_course->meeting_datetime }}</td>
                                            <td>{{ explode(' ', $requested_course->start_datetime)[0] }}</td>
                                            <td>{{ explode(' ', $requested_course->end_datetime)[0] }}</td>
                                            <td>{{ $requested_course->location }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>클래스</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection