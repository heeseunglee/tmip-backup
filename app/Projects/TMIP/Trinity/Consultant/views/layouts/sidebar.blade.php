<ul class="main-menu">
    <?php
        $current_url = \Request::url();
    ?>
    <li @if(strpos($current_url, 'coursesManagement')) class = "active expanded" @endif>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">클래스 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Consultant.coursesManagement.index') }}"
                    @if(strpos($current_url, 'coursesManagement/index')) class = "active" @endif>전체 보기</a></li>
            <li @if(strpos($current_url, 'preCourses')) class = "active expanded" @endif>
                <a href="javascript:void(0);">
                    <span class="expand-sign">+</span> <span class="title">Pre 클래스 관리</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li>
                        <a href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.index') }}"
                            @if(strpos($current_url, 'preCourses/index')) class = "active" @endif>
                            <span class="title">전체 보기</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.create') }}"
                            @if(strpos($current_url, 'preCourses/create')) class = "active" @endif>
                            <span class="title">Pre 클래스 개설</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents') }}"
                        @if(strpos($current_url, 'preCourses/registerStudents')) class = "active" @endif>
                            <span class="title">Pre 클래스 학생 등록</span>
                        </a>
                    </li>
                </ul><!--end /submenu -->
            </li>
            <li><a href="{{ URL::route('Trinity.Consultant.coursesManagement.requestedCourses.index') }}"
                    @if(strpos($current_url, 'coursesManagement/requestedCourses')) class = "active" @endif>
                    클래스 개설 요청 관리
                    <?php
                        $requested_courses_to_be_confirmed = \RequestedCourse::where('is_confirmed', false)->get();
                        $number_of_requested_courses_to_be_confirmed = $requested_courses_to_be_confirmed->count();
                    ?>
                    @if($number_of_requested_courses_to_be_confirmed > 0)
                        <span class="badge">{{ $number_of_requested_courses_to_be_confirmed }}</span>
                    @endif
                </a>
            </li>
        </ul>

    <li @if(strpos($current_url, 'usersManagement')) class = "active expanded" @endif>
        <a href="javascript:void(0);" >
            <i class="fa fa-file fa-fw"></i><span class="title">사용자 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.index') }}"
                @if(strpos($current_url, 'usersManagement/index')) class = "active" @endif>전체 보기</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.hrs') }}"
                @if(strpos($current_url, 'usersManagement/hrs')) class = "active" @endif>HR 관리</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.instructors') }}"
                @if(strpos($current_url, 'usersManagement/instructors')) class = "active" @endif>교수진 관리</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.students') }}"
                @if(strpos($current_url, 'usersManagement/students')) class = "active" @endif>학생 관리</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.consultants') }}"
                @if(strpos($current_url, 'usersManagement/consultants')) class = "active" @endif>컨설턴트 관리</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.usersRegistration') }}"
                @if(strpos($current_url, 'usersManagement/usersRegistration')) class = "active" @endif>사용자 추가</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.jobPoolSignUpForm') }}"
                @if(strpos($current_url, 'usersManagement/jobPoolSignUpForm')) class = "active" @endif>잡풀 지원서 관리</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.msFirmSignUpForm') }}"
                @if(strpos($current_url, 'usersManagement/msFirmSignUpForm')) class = "active" @endif>중소기업 신청서 관리</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">고객사 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Consultant.clientsManagement.index') }}"
                    @if(strpos($current_url, 'clientsManagement/index')) class = "active" @endif>전체 보기</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.clientsManagement.registration') }}"
                @if(strpos($current_url, 'clientsManagement/registration')) class = "active" @endif>고객사 추가</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">비용 관리</span> <span class="expand-sign">+</span>
        </a>
    </li>

    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">커뮤니티</span> <span class="expand-sign">+</span>
        </a>
    </li>

    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">설문 조사</span> <span class="expand-sign">+</span>
        </a>
    </li>

    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">계정 관리</span> <span class="expand-sign">+</span>
        </a>
    </li>
</ul>