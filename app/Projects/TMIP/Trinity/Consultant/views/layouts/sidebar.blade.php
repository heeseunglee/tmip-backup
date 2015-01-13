<ul class="main-menu">
    <?php
        $current_url = \Request::url();
    ?>
    <li @if(strpos($current_url, 'coursesManagement')) class = "active expanded" @endif>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">클래스 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Consultant.coursesManagement.index') }}" @if(strpos($current_url, 'coursesManagement/index')) class = "active" @endif>전체 보기</a></li>
        </ul>
    </li>
    <li @if(strpos($current_url, 'usersManagement')) class = "active expanded" @endif>
        <a href="javascript:void(0);" >
            <i class="fa fa-file fa-fw"></i><span class="title">사용자 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Consultant.usersManagement.index') }}" @if(strpos($current_url, 'usersManagement/index')) class = "active" @endif>전체 보기</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">고객사 관리</span> <span class="expand-sign">+</span>
        </a>
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