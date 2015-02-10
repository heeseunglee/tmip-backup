@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')

@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/coursesManagement/requestedCourses/confirm.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement', '클래스 관리') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.coursesManagement.requestedCourses', '클래스 개설 요청 관리') }}</li>
            <li class="active">승인</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>클래스 개설 요청 승인</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">클래스 개설 요청 승인</h4></header>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    $hr_user = $requested_course->hr->user;
                                    ?>
                                    <div class="col-sm-3 style-inverse no-padding">
                                        <div class="holder">
                                            {{ HTML::image('user/profileImage/big/'.$hr_user->id,
                                                            '',
                                                            array('class' => 'img-rounded img-responsive')) }}
                                        </div>
                                        <div class="box-body style-inverse">
                                            <p class="text-support5-alt">
                                                <span class="text-xl text-light">{{ $hr_user->name_kor }}</span><br>
                                                <span class="text-sm">{{ $hr_user->userable->company->name }} 인사 담당자</span>
                                            </p>
                                        </div>
                                        <div class="box-body style-inverse">
                                            <address class="text-support5-alt">
                                                <abbr title="개인 연락처"><i class="fa fa-phone fa-fw"></i></abbr> {{ $hr_user->phone_number }}<br>
                                                <abbr title="회사 연락처"><i class="fa fa-building-o fa-fw"></i></abbr> {{ $hr_user->userable->company->contact_number_1 }}<br>
                                                @if ($hr_user->userable->company->contact_number_2 != null)
                                                    <abbr title="회사 연락처2"><i class="fa fa-building-o fa-fw"></i></abbr> {{ $hr_user->userable->company->contact_number_2 }}<br>
                                                @endif
                                                <abbr title="이메일"><i class="fa fa-at fa-fw"></i></abbr> {{ $hr_user->account_email }}
                                            </address>
                                        </div>
                                    </div><!--end .col-sm-3 -->
                                    <!-- END PROFILE SIDEBAR -->

                                    <!-- START PROFILE CONTENT -->
                                    <div class="col-sm-9">
                                        <div class="alert alert-warning">
                                            <i class="fa fa-check-square-o"></i> 해당 인삼담당자와 유선 통화후 승인을 진행해 주시기 바랍니다.
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div id="modify_input_insert" class="col-sm-12">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th width="20%;">분류</th>
                                                            <th width="80%;">입력값</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>교육 과정</td>
                                                            <td>
                                                                <?php
                                                                $curriculum_id_array = explode(',', $requested_course->curriculum);
                                                                ?>
                                                                @foreach($curriculum_id_array as $id)
                                                                    {{ \CourseSubType::find($id)->name }} /
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>학생 수</td>
                                                            <td>
                                                                {{ $requested_course->number_of_students - 10}}
                                                                 -
                                                                {{ $requested_course->number_of_students }} 명
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>교육 형태</td>
                                                            <td>{{ $requested_course->course_type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>강사 비자 종류</td>
                                                            <td>{{ $requested_course->instructor_type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>강사 성별</td>
                                                            <td>@if($requested_course->instructor_gender == 'M') 남성 @else 여성 @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>강사 경력</td>
                                                            <td>{{ $requested_course->instructor_career }}년 이상</td>
                                                        </tr>
                                                        <tr>
                                                            <td>시작일</td>
                                                            <td>{{ $requested_course->start_datetime }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>종료일</td>
                                                            <td>{{ $requested_course->end_datetime }}</td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                                $days_array = array(
                                                                    '1' => '월',
                                                                    '2' => '화',
                                                                    '3' => '수',
                                                                    '4' => '목',
                                                                    '5' => '금',
                                                                    '6' => '토',
                                                                    '7' => '일',
                                                                );
                                                                $course_days_array = explode(',', $requested_course->running_days);
                                                            ?>
                                                            <td>수강 요일</td>
                                                            <td>
                                                            @foreach($course_days_array as $day)
                                                                {{ $days_array[$day] }},
                                                            @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>장소</td>
                                                            <td>{{ $requested_course->location }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>미팅 희망일</td>
                                                            <td>{{ $requested_course->meeting_datetime }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="text-center">
                                                                추가 요청사항
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                {{ $requested_course->other_requests }}
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .col-sm-12 -->
                                    <!-- END PROFILE CONTENT -->
                                </div>
                            </div>

                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="hr_confirmed" class="btn btn-primary">인사 담당자 확인</button>
                                    <button id="modify_inputs" class="btn btn-primary" disabled="disabled">수정하기</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection