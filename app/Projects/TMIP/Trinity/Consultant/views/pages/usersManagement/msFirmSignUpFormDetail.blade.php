@extends('TrinityCommonView::layouts.master')

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/wysihtml5/advanced.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wysihtml5/wysihtml5-0.4.0pre.min.js') }}
@endsection

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wysihtml5/wysihtml5.css') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.msFirmSignUpForm', '중소기업 신청서 관리') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard">{{ $company->name }} <small>중소기업 특화교육 신청서</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-printable style-transparent">
                        <div class="box-head">
                            <div class="tools">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body style-white">
                            <!-- START INVOICE HEADER -->
                            <div class="row">
                                <div class="col-xs-8">
                                    <h1 class="text-light">{{ $company->name }}</h1>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <h1 class="text-light text-gray-light"></h1>
                                </div>
                            </div>
                            <!-- END INVOICE HEADER -->

                            <br>
                            <!-- START INVOICE DESCRIPTION -->
                            <div class="row">
                                <div class="col-xs-4">
                                    <h4 class="text-light">고객사 주소</h4>
                                    <address>
                                        {{ $company->postcode_1 }} - {{ $company->postcode_2 }}<br>
                                        {{ $company->address_1 }}<br>
                                        {{ $company->address_2 }}<br>
                                    </address>
                                </div><!--end .col-md-4 -->
                                <div class="col-xs-4">
                                    <h4 class="text-light">담당자 정보</h4>
                                    <address>
                                        <strong>{{ $company->applicant_name }}</strong><br>
                                        {{ $company->applicant_deputy }} / {{ $company->applicant_position }}<br>
                                        <a href="mailto:{{ $company->applicant_email }}">{{ $company->applicant_email }}</a><br>
                                        <abbr title="Phone">P:</abbr> {{ $company->applicant_work_contact }}<br/>
                                        <abbr title="Phone">P:</abbr> {{ $company->applicant_private_contact }}
                                    </address>
                                </div><!--end .col-md-4 -->
                                <div class="col-xs-4">
                                </div>
                            </div><!--end .row -->
                            <!-- END INVOICE DESCRIPTION -->

                            <br>
                            <!-- START INVOICE PRODUCTS -->
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">이름</th>
                                            <th class="text-center">부서</th>
                                            <th class="text-center">직급</th>
                                            <th class="text-center">이메일</th>
                                            <th class="text-center">연락처</th>
                                            <th class="text-center">성별</th>
                                            <th class="text-center">나이</th>
                                            <th class="text-center">파견도시</th>
                                            <th class="text-center">레벨</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($company->students as $student)
                                            <tr>
                                                <td class="text-center">{{ $student->name }}</td>
                                                <td class="text-center">{{ $student->deputy }}</td>
                                                <td class="text-center">{{ $student->position }}</td>
                                                <td class="text-center"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                                                <td class="text-center">{{ $student->phone_number }}</td>
                                                <td class="text-center">@if($student->gender == 'M') 남 @else 여 @endif</td>
                                                <td class="text-center">{{ $student->age }}</td>
                                                <td class="text-center">{{ $student->city }}</td>
                                                <?php
                                                    $level_array = ['입문', '초급', '중급', '고급'];
                                                ?>
                                                <td class="text-center">{{ $level_array[$student->level - 1] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!--end .col-md-12 -->
                            </div><!--end .row -->
                            <!-- END INVOICE PRODUCTS -->

                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div><!--end .row -->
        </div><!--end .section-body -->
    </section>
@endsection