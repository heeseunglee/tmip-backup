{{ Form::open(array('action' => array('\Trinity\Consultant\controllers\PostController@coursesManagementRequestedCoursesConfirm',
                                        'requested_course_id' => $requested_course->id),
                    'class' => 'form-horizontal form-banded form-validate',
                    'role' => 'form')) }}

    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('curriculum', '희망과정 선택', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-8">
            <?php
                $curriculum_id_array = explode(',', $requested_course->curriculum);
                $curriculum_array = array();
                foreach($curriculum_id_array as $id) {
                    $curriculum_array[] = \CourseSubType::find($id)->name;
                }
                $curriculum = implode(',', $curriculum_array);
            ?>
            {{ Form::text('curriculum', $curriculum, array('class' => 'form-control',
                                                        'required' => '',
                                                        'onclick' => 'openPopUp()')) }}
        </div>
        <div class="col-sm-1">
            {{ Form::button('검색', array('class' => 'btn btn-primary',
                                        'id' => 'curriculum_popup_open',
                                        'onclick' => 'openPopUp()')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('number_of_students', '수강생 수', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('number_of_students',
                            array('' => '선택하세요',
                                '10' => '0 - 10명',
                                '20' => '10 - 20명',
                                '30' => '20 - 30명',
                                '40' => '30 - 40명',
                                '50' => '40 - 50명',
                                '60' => '50 - 60명',
                                '70' => '60 - 70명',
                                '80' => '70 - 80명'),
                                $requested_course->number_of_students,
                                array('required' => '',
                                    'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('course_type', '희망과정 선택', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('course_type',
                array('' => '선택하세요',
                    '그룹 교육' => '그룹 교육',
                    '1:1 교육' => '1:1 교육',
                    '인텐시브 교육' => '인텐시브 교육',
                    '이그제큐티브 교육' => '이그제큐티브 교육'),
                    $requested_course->course_type,
                    array('required' => '', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('instructor_type', '희망 강사 타입', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('instructor_type',
                array('' => '선택하세요',
                    'KR' => '한국인 (원어민 레벨)',
                    'F4' => '재외국민 (F4 비자 보유자)',
                    'F2' => '원어민 (F2 비자 보유자)',
                    'F5' => '원어민 (F5 비자 보유자)'),
                    $requested_course->instructor_type,
                    array('required' => '', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('instructor_gender', '희망 강사 성별', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('instructor_gender',
                array('' => '선택하세요',
                    'M' => '남',
                    'F' => '여'),
                    $requested_course->instructor_gender,
                    array('required' => '', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('instructor_career', '희망 강사 경력', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('instructor_career',
                array('' => '선택하세요',
                    '3' => '3년 이상',
                    '5' => '5년 이상',
                    '10' => '10년 이상',
                    '15' => '15년 이상'),
                    $requested_course->instructor_career,
                    array('required' => '', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('start_date', '희망 시작일', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-5">
            {{ Form::text('start_date',
                        explode(" ", $requested_course->start_datetime)[0],
                        array('required' => '',
                                'class' => 'form-control',
                                'data-field' => 'date',
                                'data-format' => 'yyyy-MM-dd',
                                'readonly' => '')) }}
        </div>
        <div class="col-sm-4">
            {{ Form::text('start_time',
                        substr(explode(" ", $requested_course->start_datetime)[1], 0, -3),
                        array('required' => '',
                                'class' => 'form-control',
                                'data-field' => 'time',
                                'data-format' => 'HH:mm',
                                'readonly' => '')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('end_date', '희망 종료일', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-5">
            {{ Form::text('end_date',
                        explode(" ", $requested_course->end_datetime)[0],
                        array('required' => '',
                                'class' => 'form-control',
                                'data-field' => 'date',
                                'data-format' => 'yyyy-MM-dd',
                                'readonly' => '')) }}
        </div>
        <div class="col-sm-4">
            {{ Form::text('end_time',
                        substr(explode(" ", $requested_course->end_datetime)[1], 0, -3),
                        array('required' => '',
                                'class' => 'form-control',
                                'data-field' => 'time',
                                'data-format' => 'HH:mm',
                                'readonly' => '')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('running_days[]', '희망 요일', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9 text-center">
        @for($i = 1; $i <= 7; $i++)
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
                $checked = false;
                if(strpos($requested_course->running_days, "".$i) !== false)
                    $checked = true;
            ?>
            <label class="checkbox-inline">
                {{ Form::checkbox('running_days[]',
                                    $i,
                                    $checked) }} {{ $days_array[$i] }}
            </label>
        @endfor
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('location', '희망 교육 장소', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::text('location',
                            $requested_course->location,
                            array('required' => '',
                                'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('level_test', '레벨테스트 여부', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::select('level_test',
                array('' => '선택하세요',
                    true => 'Y',
                    false => 'N'),
                    $requested_course->level_test,
                    array('required' => '', 'class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('meeting_date', '희망 미팅 날짜', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-5">
            {{ Form::text('meeting_date',
                            explode(" ", $requested_course->meeting_datetime)[0],
                            array('required' => '',
                                    'class' => 'form-control',
                                    'data-field' => 'date',
                                    'data-format' => 'yyyy-MM-dd',
                                    'readonly' => '')) }}
        </div>
        <div class="col-sm-4">
            {{ Form::text('meeting_time',
                            substr(explode(" ", $requested_course->meeting_datetime)[1], 0, -3),
                            array('required' => '',
                                    'class' => 'form-control',
                                    'data-field' => 'time',
                                    'data-format' => 'HH:mm',
                                    'readonly' => '')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
            {{ Form::label('other_requests', '기타 요청사항', array('class' => 'control-label')) }}
        </div>
        <div class="col-sm-9">
            {{ Form::textarea('other_requests',
                                $requested_course->other_requests,
                                array('class' => 'form-control',
                                    'rows' => '5',
                                    'placeholder' => '기타 요청사항을 적어주세요')) }}
        </div>
    </div>
    <div class="form-footer text-right">
        {{ Form::submit('클래스 개설 요청 승인하기', array('class' => 'btn btn-success')) }}
    </div>

{{ Form::close() }}

<script>
    function openPopUp() {
        window.open('../curriculumPopUp',
                'popup',
                'width=800px, height=600px, left=0, top=0, resizeable=false');
    }
</script>