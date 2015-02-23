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
            <li class="active">Pre 클래스 수정</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>Pre 클래스 수정</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header>
                                <h4 class="text-light">
                                    Pre 클래스 정보
                                </h4>
                            </header>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div id="modify_input_insert" class="col-sm-12">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                $curriculum_id_array = explode(',', $pre_course->curriculum);
                                                ?>
                                                @foreach($curriculum_id_array as $id)
                                                    {{ \CourseSubType::find($id)->name }} /
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ $pre_course->number_of_students }} 명
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->course_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->instructor_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>@if($pre_course->instructor_gender == 'M') 남성 @else 여성 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->instructor_career }}년 이상</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->start_datetime }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->end_datetime }}</td>
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
                                            $course_days_array = explode(',', $pre_course->running_days);
                                            ?>
                                            <td>
                                                @foreach($course_days_array as $day)
                                                    {{ $days_array[$day] }},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->location }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->meeting_datetime }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $pre_course->other_requests }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light">Pre 클래스 : 수정</h4></header>
                        </div>
                        <div class="box-body">
                            {{ Form::open() }}
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>이름</th>
                                        <th>이메일</th>
                                        <th>작업</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pre_course->students as $student)
                                            <tr>
                                                @if($student->is_first_login)
                                                    <td style="vertical-align: middle;"><span class="label label-warning">미 접속</span></td>
                                                @else
                                                    <td style="vertical-align: middle;"><span class="label label-success">접속</span></td>
                                                @endif
                                                <td>{{ $student->user->name_kor }}</td>
                                                <td>
                                                    <a href="mailto:{{ $student->user->account_email }}">{{ $student->user->account_email }}</a>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div data-toggle="buttons">
                                                        <label class="btn checkbox-inline btn-checkbox-danger-inverse">
                                                            <input name="cancel_registration_ids[]" type="checkbox" value="{{ $student->id }}"> 등록 해지
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-footer text-right">
                                    {{ Form::submit('양식 전송하기',
                                                array('class' => 'btn btn-primary')) }}
                                </div>
                            {{ Form::close() }}
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
        </div>
    </section>
@endsection