@extends('TrinityCommonView::layouts.msFirm.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
@endsection

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/msFirm/signUp.js') }}
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li class="active">{{ HTML::linkAction('Trinity.msFirm.signUp', '더만다린 중소기업 특화교육 신청') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 더만다린 중소기업<small> 특화교육 신청</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>필수 입력 정보</strong></h4></header>
                        </div>
                        <div class="box-body no-padding1">
                            <div id="rootwizard" class="form-wizard form-wizard-horizontal">
                                {{ Form::open(array('class' => 'form-horizontal form-banded form-bordered form-validation',
                                'role' => 'form',
                                'novalidate' => 'novalidate')) }}
                                    <div class="form-wizard-nav">
                                        <div class="progress" style="width: 75%;"><div class="progress-bar progress-bar-primary" style="width: 0%;"></div></div>
                                        <ul class="nav nav-justified nav-pills">
                                            <li class="active">
                                                <a href="#step1" data-toggle="tab">
                                                    <span class="step">1</span>
                                                    <span class="title">고객사 정보</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2" data-toggle="tab">
                                                    <span class="step">2</span>
                                                    <span class="title">수강생 정보</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step3" data-toggle="tab">
                                                    <span class="step">3</span>
                                                    <span class="title">추가 정보</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step4" data-toggle="tab">
                                                    <span class="step">4</span>
                                                    <span class="title">요청 사항</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--end .form-wizard-nav -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="step1">
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="company_name" class="control-label">고객사 명</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="고객사 명을 입력해 주세요" data-rule-minlength="2" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="postcode_1" class="control-label">고객사 주소</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="postcode_1" id="postcode_1" class="postcodify_postcode6_1 form-control" value="" required="">
                                                    <span id="postcode_dash">-</span>
                                                    <input type="text" name="postcode_2" id="postcode_2" class="postcodify_postcode6_2 form-control" value="" required="">
                                                    <button type="button" id="postcodify_search_button" class="btn btn-support3">검색</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="address_1" id="address_1" class="postcodify_address form-control" value="" placeholder="도로명 주소" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="address_2" id="address_2" class="postcodify_details form-control" value="" placeholder="상세 주소" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_name" class="control-label">담당자 성명</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="applicant_name" id="applicant_name" class="form-control" placeholder="담당자 성명" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_deputy" class="control-label">담당자 부서</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="applicant_deputy" id="applicant_deputy" class="form-control" placeholder="담당자 부서" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_position" class="control-label">담당자 직급</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="applicant_position" id="applicant_position" class="form-control" placeholder="담당자 직급" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_work_contact" class="control-label">담당자 연락처 (회사)</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="applicant_work_contact" id="applicant_work_contact" class="form-control" data-inputmask="'mask': '99999999999'" placeholder="담당자 연락처 (회사)" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_private_contact" class="control-label">담당자 연락처 (개인)</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="applicant_private_contact" id="applicant_private_contact" class="form-control" data-inputmask="'mask': '99999999999'" placeholder="담당자 연락처 (개인)" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="applicant_email" class="control-label">담당자 이메일</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="email" name="applicant_email" id="applicant_email" class="form-control" placeholder="담당자 이메일" data-rule-email="true" required="">
                                                </div>
                                            </div>
                                        </div><!--end #step1 -->
                                        <div class="tab-pane" id="step2">
                                            <br/><br/>
                                            <div class="row text-left">
                                                <div class="col-lg-12">
                                                    <button id="add_student_row" type="button" class="btn btn-success"><i class="fa flaticon-plus24"></i></button>
                                                    <button id="remove_student_row" type="button" class="btn btn-danger"><i class="fa flaticon-minus17"></i></button>
                                                </div>
                                            </div>
                                            <br/><br/>
                                            {{ Form::hidden('number_of_students', 1, array('id' => 'number_of_students')) }}
                                            <div id="student_row_1" class="row">
                                                <div class="col-lg-12">
                                                    <div class="box">
                                                        <div class="box-head box-head-xs style-support3">
                                                            <header><h5 class="text-light">학생 <strong>#1</strong></h5></header>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_name_1" class="control-label">이름</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_name_1" id="student_name_1" class="form-control" placeholder="이름" required="" data-rule-minlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_deputy_1" class="control-label">부서</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_deputy_1" id="student_deputy_1" class="form-control" placeholder="부서" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_position_1" class="control-label">직급</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_position_1" id="student_position_1" class="form-control" placeholder="직급" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_email_1" class="control-label">이메일</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="email" name="student_email_1" id="student_email_1" class="form-control" placeholder="이메일" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_phone_1" class="control-label">전화번호</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_phone_1" id="student_phone_1" class="form-control" data-inputmask="'mask': '99999999999'" placeholder="전화번호" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_gender_1" class="control-label">성별</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <label class="radio-inline" style="margin-right: 50px;">
                                                                        <input type="radio" name="student_gender_1" value="M" required=""> 남자
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="student_gender_1" value="F" required=""> 여자
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_age_1" class="control-label">나이</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_age_1" id="student_age_1" data-inputmask="'mask': '99'" class="form-control" placeholder="나이" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_city_1" class="control-label">파견도시</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="student_city_1" id="student_city_1" class="form-control" placeholder="파견도시" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-center">
                                                                    <label for="student_level_1" class="control-label">수강생 중국어레벨</label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <label class="radio-inline" style="margin-right: 30px;">
                                                                        <input type="radio" name="student_level_1" value="1" required=""> 입문
                                                                    </label>
                                                                    <label class="radio-inline" style="margin-right: 30px;">
                                                                        <input type="radio" name="student_level_1" value="2" required=""> 초급
                                                                    </label>
                                                                    <label class="radio-inline" style="margin-right: 30px;">
                                                                        <input type="radio" name="student_level_1" value="3" required=""> 중급
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="student_level_1" value="4" required=""> 고급
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end #step2 -->
                                        <div class="tab-pane" id="step3">
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="heard_from" class="control-label">수강신청 경로</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label class="radio-inline" style="margin-right: 20px;">
                                                        <input type="radio" name="heard_from" value="1" required=""> 커뮤니티 (네이버 등)
                                                    </label>
                                                    <label class="radio-inline" style="margin-right: 20px;">
                                                        <input type="radio" name="heard_from" value="2" required=""> 인터넷 뉴스
                                                    </label>
                                                    <label class="radio-inline" style="margin-right: 20px;">
                                                        <input type="radio" name="heard_from" value="3" required=""> 지인 추천
                                                    </label>
                                                    <label class="radio-inline" style="margin-right: 20px;">
                                                        <input type="radio" name="heard_from" value="4" required=""> DM
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="heard_from" value="5" required=""> TM
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="reason" class="control-label">수강신청 이유</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label class="radio-inline" style="margin-right: 20px;">
                                                        <input type="radio" name="reason" value="1" required=""> 중국주재원 파견
                                                    </label>
                                                    <label class="radio-inline"style="margin-right: 20px;">
                                                        <input type="radio" name="reason" value="2" required=""> 예비 주재원 양성
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reason" value="3" required=""> 현지 파견주재원 관리
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!--end #step3 -->
                                        <div class="tab-pane" id="step4">
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-sm-4 text-center">
                                                    <label for="additional_request" class="control-label">기타 요청사항</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <textarea style="height: 100%;" name="additional_request" id="additional_request" class="form-control" rows="10" placeholder="기타 문의는 help@themandarin.co.kr 을 이용해 주세요"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                                </div>
                                            </div>
                                        </div><!--end #step4 -->
                                    </div><!--end .tab-content -->
                                    <ul class="pager wizard">
                                        <li class="previous first disabled"><a href="javascript:void(0);">처음으로</a></li>
                                        <li class="previous disabled"><a href="javascript:void(0);">이전으로</a></li>
                                        <li class="next last"><a href="javascript:void(0);">마지막으로</a></li>
                                        <li class="next"><a href="javascript:void(0);">다음으로</a></li>
                                    </ul>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection