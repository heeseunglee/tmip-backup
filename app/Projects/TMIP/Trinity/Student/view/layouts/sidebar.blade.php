<ul class="main-menu">
    <?php
        $current_url = \Request::url();
    ?>
    <li @if(strpos($current_url, 'coursesManagement')) class = "active expanded" @endif>
        <a href="javascript:void(0);">
            <i class="fa fa-file fa-fw"></i><span class="title">클래스 관리</span> <span class="expand-sign">+</span>
        </a>
        <ul>
            <li><a href="{{ URL::route('Trinity.Student.coursesManagement.index') }}"
                @if(strpos($current_url, 'coursesManagement/index')) class = "active" @endif>전체 보기</a></li>
            <li><a href="{{ URL::route('Trinity.Student.coursesManagement.showIndividual') }}"
                @if(strpos($current_url, 'coursesManagement/showIndividual')) class = "active" @endif>개별 보기</a></li>
        </ul>
    </li>
</ul>