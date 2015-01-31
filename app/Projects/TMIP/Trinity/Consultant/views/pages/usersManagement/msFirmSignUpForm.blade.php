@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/tooltipster/tooltipster.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/tooltipster/jquery.tooltipster.min.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.msFirmSignUpForm', '중소기업 신청서 관리') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 중소기업 신청서 <small>관리</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>중소기업 신청서</strong> 전체 보기</h4></header>
                        </div>
                        <div class="box-body">
                            <table id="table_msFirm_signUp_form" class="table">
                                <thead>
                                <tr>
                                    <td>고객사 명</td>
                                    <td>담당자 성명</td>
                                    <td>담당자 연락처(회사)</td>
                                    <td>담당자 연락처(개인)</td>
                                    <td>담당자 이메일</td>
                                    <td>등록 학생 수</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td><a href="{{ URL::route('Trinity.Consultant.usersManagement.msFirmSignUpForm',
                                         array('form_id' => $company->id)) }}">{{ $company->name }}</a></td>
                                        <td>{{ $company->applicant_name }}</td>
                                        <td>{{ $company->applicant_work_contact }}</td>
                                        <td>{{ $company->applicant_private_contact }}</td>
                                        <td><a href="mailto:{{ $company->applicant_email }}">{{ $company->applicant_email }}</a></td>
                                        <td>{{ $company->students->count() }}</td>
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