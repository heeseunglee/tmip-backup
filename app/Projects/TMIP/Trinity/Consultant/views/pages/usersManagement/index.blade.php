@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/tooltipster/tooltipster.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/userManagement/index.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/tooltipster/jquery.tooltipster.min.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.index', '전체 보기') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 사용자 관리 <small>전체 보기</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>HR</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table_user_management_index">
                                <thead>
                                    <tr>
                                        <th>이름</th>
                                        <th>고객사 명</th>
                                        <th>담당 컨설턴트</th>
                                        <th>담당 클래스 수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hrs as $hr)
                                        <tr>
                                            <td>{{ $hr->user->name_kor }}</td>
                                            <td>{{ $hr->company->name }}</td>
                                            <td>{{ $hr->consultant->user->name_kor }}</td>
                                            <td>TODO</td>
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
                            <header><h4 class="text-light"><strong>교수진</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table_user_management_index">
                                <thead>
                                <tr>
                                    <th>이름</th>
                                    <th>담당 클래스 수</th>
                                    <th>강사 등급</th>
                                    <th>특화 분야</th>
                                    <th>경력</th>
                                    <th>국적</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($instructors as $instructor)
                                        <tr>
                                            <td>{{ $instructor->user->name_kor }}</td>
                                            <td>TODO</td>
                                            <td>TODO</td>
                                            <td>TODO</td>
                                            <td>TODO</td>
                                            <td>TODO</td>
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
                            <header><h4 class="text-light"><strong>학생</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table_user_management_index">
                                <thead>
                                <tr>
                                    <th>이름</th>
                                    <th>고객사</th>
                                    <th>부서</th>
                                    <th>직급</th>
                                    <th>수강 클래스 명</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->user->name_kor }}</td>
                                            <td>{{ $student->company->name }}</td>
                                            <td>{{ $student->deputy }}</td>
                                            <td>{{ $student->position }}</td>
                                            <td>TODO</td>
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
                            <header><h4 class="text-light"><strong>컨설턴트</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table class="table table_user_management_index">
                                <thead>
                                <tr>
                                    <th>이름</th>
                                    <th>담당 인사 담당자</th>
                                    <th>담당 고객사</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultants as $consultant)
                                    <tr>
                                        <td>{{ $consultant->user->name_kor }}</td>
                                        <?php
                                            $hrs = $consultant->hrs;
                                        ?>
                                        <td>
                                            <?php
                                                $hrs_count = $hrs->count()
                                            ?>
                                            @if ($hrs_count > 0)
                                                <?php
                                                    $names = "";
                                                    foreach($hrs as $hr) {
                                                        $names .= $hr->user->name_kor.'<br>';
                                                    }
                                                    $names = substr($names, 0, -4);
                                                ?>
                                                <span class="hr_tooltip"  data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="{{ $names }}">
                                                    {{ $hrs[0]->user->name_kor }}
                                                    @if ($hrs_count > 1)
                                                        외 {{ $hrs_count - 1 }}명
                                                    @endif
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($hrs_count > 0)
                                                <?php
                                                    $company_names = "";
                                                    $companies = $consultant->getCompanies();
                                                    $companies_count = $companies->count();
                                                    foreach($companies as $company) {
                                                        $company_names .= $company->name.'<br>';
                                                    }
                                                    $company_names = substr($company_names, 0, -4);
                                                ?>
                                                <span class="hr_tooltip"  data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $company_names }}">
                                                    {{ $companies[0]->name }}
                                                    @if ($companies_count > 1)
                                                        외 {{ $companies_count - 1 }}개
                                                    @endif
                                                </span>
                                            @else
                                                -
                                            @endif
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