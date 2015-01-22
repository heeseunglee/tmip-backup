@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/tooltipster/tooltipster.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/userManagement/jobPoolSignUpForm.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/tooltipster/jquery.tooltipster.min.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.jobPoolSignUpForm', '잡풀 지원서 관리') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 잡풀 지원서 <small>관리</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>Job Pool 지원서</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table id="table_jobPool_signUp_form" class="table">
                                <thead>
                                <tr>
                                    <td>이름</td>
                                    <td>성별</td>
                                    <td>비자 종류</td>
                                    <td>학교 이름</td>
                                    <td>강의 경력</td>
                                    <td>선호 지역</td>
                                    <td>보기</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($signup_forms as $form)
                                    <tr>
                                        <td>{{ $form->name_kor }}</td>
                                        <td>@if($form->gender == 'M') 남성 @else 여성 @endif</td>
                                        <td>{{ $form->visa_type }}</td>
                                        <td>{{ $form->name_of_last_school }}</td>
                                        <td>{{ $form->career_years }}</td>
                                        <td>
                                        @foreach($form->preferedAreas as $area)
                                            {{ $area->name }}
                                        @endforeach
                                        </td>
                                        <td>
                                            <a href="jobPoolSignUpForm/{{ $form->id }}">
                                                <i class="flaticon-magnifier10"></i>
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
        </div>
    </section>
@endsection