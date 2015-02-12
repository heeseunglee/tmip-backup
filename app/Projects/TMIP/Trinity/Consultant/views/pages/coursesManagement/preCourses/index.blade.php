@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
@endsection

@section('additional_js_includes')
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement', '클래스 관리') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement.preCourses', 'Pre 클래스 관리') }}</li>
            <li class="active">전체 보기</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>Pre 클래스 전체 보기</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 : 진행 중</h4></header>
                        </div>
                        <?php
                            $ongoing_pre_courses = \PreCourse::where('status', '진행 중')->get();
                        ?>
                        <div class="box-body">
                            <table class="table table-hover table-dataTable">
                                <thead>
                                <tr>
                                    <th width="100px;">상태</th>
                                    <th>고객사</th>
                                    <th>인사 담당자</th>
                                    <th>학생수</th>
                                    <th>교육 과정</th>
                                    <th>레벨 테스트</th>
                                    <th width="100px;">작업</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 : 학생 등록</h4></header>
                        </div>
                        <?php
                            $pre_courses_to_be_registered = \PreCourse::where('status', '학생 등록')->get();
                        ?>
                        <div class="box-body">
                            <table class="table table-hover table-dataTable">
                                <thead>
                                <tr>
                                    <th width="100px;">상태</th>
                                    <th>고객사</th>
                                    <th>인사 담당자</th>
                                    <th>교육 과정</th>
                                    <th>레벨 테스트</th>
                                    <th width="100px;">작업</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pre_courses_to_be_registered as $pre_course)
                                    <tr>
                                        <td>
                                            <span class="label label-warning">{{ $pre_course->status }}</span>
                                        </td>
                                        <td>{{ $pre_course->company->name }}</td>
                                        <td>{{ $pre_course->hr->user->name_kor }}</td>
                                        <td>
                                            <?php
                                                $curriculum_id_array = explode(',', $pre_course->curriculum);
                                            ?>
                                            @foreach($curriculum_id_array as $curriculum_id)
                                                {{ \CourseSubType::find($curriculum_id)->name }}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($pre_course->level_test)
                                                Y
                                            @else
                                                N
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents',
                                                                    array('pre_course_id' => $pre_course->id)) }}">
                                                <span class="label label-primary">등록하기</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 : 완료</h4></header>
                        </div>
                        <?php
                            $completed_pre_courses = \PreCourse::where('status', '완료')->get();
                        ?>
                        <div class="box-body">
                            <table class="table table-hover table-dataTable">
                                <thead>
                                <tr>
                                    <th width="100px;">상태</th>
                                    <th>고객사</th>
                                    <th>인사 담당자</th>
                                    <th>학생수</th>
                                    <th>교육 과정</th>
                                    <th>레벨 테스트</th>
                                    <th width="100px;">작업</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection