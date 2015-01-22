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
            <li class="active">{{ HTML::linkAction('Trinity.jobPool.signUp', '더만다린 Job Pooling') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 지원 결과<small> 페이지</small></h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-printable style-transparent">
                    <div class="box-head">
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="javascript:window.print();">
                                    <i class="fa fa-print"></i> 출력</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body style-white">
                        <!-- START INVOICE HEADER -->
                        <div class="row">
                            <div class="col-xs-8">
                                <h1 class="text-light"><i class="fa fa-microphone fa-fw fa-2x text-support3"> </i>
                                    <strong class="text-support3">지원자 : </strong> {{ $form->name_kor }}</h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-gray-light">{{ $form->name_kor }}</h1>
                            </div>
                        </div>
                        <!-- END INVOICE HEADER -->

                        <br>
                        <!-- START INVOICE DESCRIPTION -->
                        <div class="row">
                            <div class="col-xs-4">
                                {{ HTML::image('jobPool/signUp/profileImages/'.$form->id,
                                '', array('width' => '354px', 'height' => '472px')) }}
                            </div><!--end .col-md-2 -->
                            <div class="col-xs-4">
                                <h4 class="text-light">지원자 정보</h4>
                                <address>
                                    <strong>{{ $form->name_kor }}</strong><br/>
                                    {{ $form->email }} <br/>
                                    <abbr title="Phone">P:</abbr> {{ $form->phone_number }}
                                </address>
                            </div><!--end .col-md-4 -->
                            <div class="col-xs-4">
                                <div class="well">
                                    <div class="clearfix">
                                        <div class="pull-left"> 지원 번호 : </div>
                                        <div class="pull-right"> {{ $form->id }} </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left"> 지원 날짜 : </div>
                                        <div class="pull-right"> {{ strftime('%Y-%m-%d', strtotime($form->created_at)) }} </div>
                                    </div>
                                </div>
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
                                        <th style="width:60px" class="text-center"></th>
                                        <th class="text-left">내용</th>
                                        <th style="width:140px" class="text-right">입력</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>한글 이름</td>
                                        <td class="text-right">{{ $form->name_kor }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>영문 이름</td>
                                        <td class="text-right">{{ $form->name_eng }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>중국어 이름</td>
                                        <td class="text-right">{{ $form->name_chn }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>이메일</td>
                                        <td class="text-right">{{ $form->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>연락처</td>
                                        <td class="text-right">{{ $form->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>생년 월일</td>
                                        <td class="text-right">{{ $form->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>성별</td>
                                        <td class="text-right">@if($form->gender == 'M') 남성 @else 여성 @endif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>비자 정보</td>
                                        <td class="text-right">{{ $form->visa_type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>우편 번호</td>
                                        <td class="text-right">{{ $form->postcode_1 }} - {{ $form->postcode_2 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>주소</td>
                                        <td class="text-right">{{ $form->address_1 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>상세 주소</td>
                                        <td class="text-right">{{ $form->address_2 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>최종 학력</td>
                                        <td class="text-right">{{ $form->academic_background }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>대학 이름</td>
                                        <td class="text-right">{{ $form->name_of_last_school }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>전공</td>
                                        <td class="text-right">{{ $form->major }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>중국 체류 기간</td>
                                        <td class="text-right">{{ $form->study_aboard_background }} 년</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>강의 경력 년수</td>
                                        <td class="text-right">{{ $form->career_years }} 년</td>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($form->careerDetails as $career)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>강의 경력#{{ $i }} 근무처</td>
                                            <td class="text-right">{{ $career->career_detail_company_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>강의 경력#{{ $i }} 교육 형태</td>
                                            <td class="text-right">{{ $career->career_detail_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>강의 경력#{{ $i }} 교육 내용</td>
                                            <td class="text-right">{{ $career->career_detail_description }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>강의 경력#{{ $i }} 교육 기간</td>
                                            <td class="text-right">{{ $career->career_detail_period }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>선호 지역</td>
                                        <td class="text-right">
                                            @foreach($form->preferedAreas as $area)
                                                {{ $area->name }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>오전 가능시간</td>
                                        <td class="text-right">{{ $form->available_time_morning_start }}
                                            ~ {{ $form->available_time_morning_end }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>오후 가능시간</td>
                                        <td class="text-right">{{ $form->available_time_afternoon_start }}
                                            ~ {{ $form->available_time_afternoon_end }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>심야 가능시간</td>
                                        <td class="text-right">{{ $form->available_time_night_start }}
                                            ~ {{ $form->available_time_night_end }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-right">자기소개서</td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">
                                            {{ $form->resume  }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!--end .col-md-12 -->
                        </div><!--end .row -->
                        <!-- END INVOICE PRODUCTS -->

                    </div><!--end .box-body -->
                </div><!--end .box -->
            </div><!--end .col-lg-12 -->
        </div>
    </section>
@endsection