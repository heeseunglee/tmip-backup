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
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement', '사용자 관리') }}</li>
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
                            <header><h4 class="text-light">클래스 개설 요청 현황</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-dataTable">
                                <thead>
                                <tr>
                                    <th>고객사</th>
                                    <th>교육 과정</th>
                                    <th>교육 형태</th>
                                    <th>교육 기간</th>
                                    <th>미팅 희망일</th>
                                    <th>승인 담당자</th>
                                    <th>작업</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $not_confirmed_requested_courses = \RequestedCourse::where('is_confirmed', false)->get();
                                ?>
                                @foreach($not_confirmed_requested_courses as $course)
                                    <tr>
                                        <td>{{ $course->company->name }}</td>
                                        <td>
                                            <?php
                                                $curriculum_id_array = explode(',', $course->curriculum);
                                            ?>
                                            @foreach($curriculum_id_array as $curriculum_id)
                                                {{ \CourseSubType::find($curriculum_id)->name }}<br/>
                                            @endforeach
                                        </td>
                                        <td>{{ $course->course_type }}</td>
                                        <td>{{ explode(' ', $course->start_datetime)[0] }}
                                            ~
                                            {{ explode(' ', $course->end_datetime)[0] }}
                                        </td>
                                        <td>{{ $course->meeting_datetime }}</td>
                                        <td>{{ $course->hr->consultant->user->name_kor }}</td>
                                        <td class="text-center">
                                            <span class="label label-primary">
                                                {{ HTML::linkRoute('Trinity.Consultant.coursesManagement.requestedCourses.confirm',
                                                                    '승인하기',
                                                                    array('requested_course_id' => $course->id)) }}
                                            </span>
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