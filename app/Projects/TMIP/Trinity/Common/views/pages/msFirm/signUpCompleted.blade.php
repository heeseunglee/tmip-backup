@extends('TrinityCommonView::layouts.msFirm.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
@endsection

@section('additional_js_includes')
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            {{ HTML::linkAction('Trinity.msFirm.signUp', '더만다린 중소기업 특화교육 신청') }}
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 신청 결과</h3>
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
                                    <h1 class="text-light"><strong>{{ $company->name }}</strong></h1>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <h1 class="text-light text-gray-light">교육신청서</h1>
                                </div>
                            </div>
                            <!-- END INVOICE HEADER -->

                            <br>

                            <!-- START INVOICE PRODUCTS -->
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">고객사 명</th>
                                            <th class="text-center">고객사 주소</th>
                                            <th class="text-center">담당자 성명</th>
                                            <th class="text-center">담당자 연락처(회사)</th>
                                            <th class="text-center">담당자 연락처(개인)</th>
                                            <th class="text-center">담당자 이메일</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{ $company->name }}</td>
                                            <td class="text-center">
                                                {{ $company->postcode_1 }} - {{ $company->postcode_2 }}<br/>
                                                {{ $company->address_1 }}<br/>
                                                {{ $company->address_2 }}
                                            </td>
                                            <td class="text-center">{{ $company->applicant_name }}</td>
                                            <td class="text-center">{{ $company->applicant_work_contact }}</td>
                                            <td class="text-center">{{ $company->applicant_private_contact }}</td>
                                            <td class="text-center">{{ $company->applicant_email }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div><!--end .col-md-12 -->
                            </div><!--end .row -->
                            <!-- END INVOICE PRODUCTS -->

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
                                            <th class="text-center">전화번호</th>
                                            <th class="text-center">성별</th>
                                            <th class="text-center">나이</th>
                                            <th class="text-center">파견도시</th>
                                            <th class="text-center">어학레벨</th>
                                            <th class="text-center">상태</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($students_added != null)
                                            @foreach($students_added as $id)
                                                <?php
                                                    $student = \MsFirmStudent::find($id);
                                                ?>
                                                <tr class="style-success">
                                                    <td class="text-center">{{ $student->name }}</td>
                                                    <td class="text-center">{{ $student->deputy }}</td>
                                                    <td class="text-center">{{ $student->position }}</td>
                                                    <td class="text-center">{{ $student->email }}</td>
                                                    <td class="text-center">{{ $student->phone_number }}</td>
                                                    <td class="text-center">@if($student->gender == 'M') 남성 @else 여성 @endif</td>
                                                    <td class="text-center">{{ $student->age }}</td>
                                                    <td class="text-center">{{ $student->city }}</td>
                                                    <?php
                                                        $level_array = [1 => '입문', 2 => '초급', 3 => '중급', 4 => '고급'];
                                                    ?>
                                                    <td class="text-center">{{ $level_array[$student->level] }}</td>
                                                    <td class="text-center">신청 완료</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div><!--end .col-md-12 -->
                            </div><!--end .row -->
                            <!-- END INVOICE PRODUCTS -->

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
                                            <th class="text-center">전화번호</th>
                                            <th class="text-center">성별</th>
                                            <th class="text-center">나이</th>
                                            <th class="text-center">파견도시</th>
                                            <th class="text-center">어학레벨</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($company->students as $student)
                                            <tr class="style-gray">
                                                <td class="text-center">{{ $student->name }}</td>
                                                <td class="text-center">{{ $student->deputy }}</td>
                                                <td class="text-center">{{ $student->position }}</td>
                                                <td class="text-center">{{ $student->email }}</td>
                                                <td class="text-center">{{ $student->phone_number }}</td>
                                                <td class="text-center">@if($student->gender == 'M') 남성 @else 여성 @endif</td>
                                                <td class="text-center">{{ $student->age }}</td>
                                                <td class="text-center">{{ $student->city }}</td>
                                                <?php
                                                $level_array = [1 => '입문', 2 => '초급', 3 => '중급', 4 => '고급'];
                                                ?>
                                                <td class="text-center">{{ $level_array[$student->level] }}</td>
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