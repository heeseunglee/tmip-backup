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
            <li class="active">Pre 클래스 학생 등록</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 관리 <small>Pre 클래스 학생 등록</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <?php
                $count = 0;
            ?>
            @foreach($pre_courses as $pre_course)
                @if($count % 4 == 0)
                    <div class="row">
                @endif
                    <div class="col-md-3">
                        <div class="box box-type-pricing">
                            <div class="box-body text-center style-primary">
                                <h2 class="text-light">{{ $pre_course->company->name }}</h2>
                                <div class="price">
                                    <h2><span class="text-xxxl">{{ $pre_course->students->count() }}</span></h2> <span>/{{ $pre_course->number_of_students }}명</span>
                                </div>
                                <br>
                                <?php
                                    $days_array = array(
                                        1 => '월',
                                        2 => '화',
                                        3 => '수',
                                        4 => '목',
                                        5 => '금',
                                        6 => '토',
                                        7 => '일',
                                    );
                                    $curriculum_id_array = explode(',', $pre_course->curriculum);
                                    $curriculums = \CourseSubType::find($curriculum_id_array);
                                    foreach($curriculums as $curriculum) {
                                        $curriculum_array[] = $curriculum->name;
                                    }

                                    $running_days_array = explode(',', $pre_course->running_days);
                                    foreach($running_days_array as $running_day) {
                                        $running_days[] = $days_array[$running_day];
                                    }
                                ?>
                                <p class="opacity-50"><em>{{ implode(', ', $curriculum_array) }}</em></p>
                            </div>
                            <div class="box-body no-padding style-white">
                                <ul class="list-unstyled text-left">
                                    <li>시작 : {{ $pre_course->start_datetime }}</li>
                                    <li>종료 : {{ $pre_course->end_datetime }}</li>
                                    <li>{{ implode(', ', $running_days) }}</li>
                                   <li>{{ $pre_course->course_type }}</li>
                                </ul>
                            </div>
                            @if($pre_course->students->count() < $pre_course->number_of_students)
                                <div class="box-body style-white text-left">
                                    <a class="btn btn-inverse"
                                       href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents',
                                                        array('pre_course_id' => $pre_course->id)) }}">
                                        학생 등록
                                    </a>
                                </div>
                            @else
                                <div class="box-body style-white text-right">
                                    <a class="btn btn-warning"
                                       href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.modify',
                                                        array('pre_course_id' => $pre_course->id)) }}">
                                        클래스 수정
                                    </a>
                                    <a class="btn btn-success"
                                       href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.launch',
                                                        array('pre_course_id' => $pre_course->id)) }}">
                                        클래스 진행
                                    </a>
                                </div>
                            @endif
                        </div><!--end .box -->
                    </div><!--end .col-md-3 -->
                    <?php
                        $count++;
                    ?>
                @if($count % 4 == 0)
                    </div>
                @endif
            @endforeach
            @if($count == 1)
                </div>
            @endif
        </div><!--end .section-body -->
    </section>
@endsection