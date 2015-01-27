@extends('TrinityCommonView::layouts.jobPool.master')

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
    {{ HTML::script('TMIP/Trinity/js/libs/select2/select2.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wysihtml5/advanced.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wysihtml5/wysihtml5-0.4.0pre.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/jobPooling/signUp.js') }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.4.13/jquery.timepicker.min.js"></script>
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
@endsection

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/flaticons/flaticon.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/select2/select2.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/multi-select/multi-select.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wysihtml5/wysihtml5.css') }}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.4.13/jquery.timepicker.min.css"/>
@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li class="active">{{ HTML::linkAction('Trinity.jobPool.signUp', '더만다린 Job Pooling') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 더만다린 강사<small> 지원 페이지</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>필수 입력 정보</strong></h4></header>
                        </div>
                        {{ Form::open(array('class' => 'form-horizontal form-bordered form-validate',
                        'id' => 'job_pooling_sign_up_form',
                        'files' => true,
                        'action' => 'Trinity.jobPool.signUp.create')) }}
                        <div class="box-body text-center">
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="name_kor" class="control-label">이름(한글)</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="name_kor" id="name_kor" class="form-control" placeholder="필수 사항" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="name_eng" class="control-label">이름(영문)</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="name_eng" id="name_eng" class="form-control" placeholder="필수 사항" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="name_chn" class="control-label">이름(중문)</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="name_chn" id="name_chn" class="form-control" placeholder="선택 사항">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="email" class="control-label">이메일</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="이메일" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="phone_number" class="control-label">전화번호</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="전화번호 예) 010-1234-5678" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="date_of_birth" class="control-label">생년월일</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="생년월일 예) 1988-01-01" required="" data-inputmask="'mask': 'y-m-d'">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="gender[]" class="control-label">성별</label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender[]" value="M" required=""> 남성
                                    </label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender[]" value="F" required=""> 여성
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="visa_type[]" class="control-label">비자</label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="visa_type[]" value="내국인" required=""> 내국인
                                    </label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="visa_type[]" value="F2" required=""> F2
                                    </label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="visa_type[]" value="F4" required=""> F4
                                    </label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="visa_type[]" value="F5" required=""> F5
                                    </label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="postcodify_postcode6" class="control-label">우편번호</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="postcode_1" id="postcode_1" class="postcodify_postcode6_1 form-control" value="" required="">
                                    <span id="postcode_dash">-</span>
                                    <input type="text" name="postcode_2" id="postcode_2" class="postcodify_postcode6_2 form-control" value="" required="">
                                    <button type="button" id="postcodify_search_button" class="btn btn-support3">검색</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="address_1" class="control-label">도로명 주소</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="address_1" id="address_1" class="postcodify_address form-control" value="" required=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="address_2" class="control-label">상세 주소</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="address_2" id="address_2" class="postcodify_details form-control" value="" required=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="academic_background" class="control-label">학력</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <select name="academic_background" id="academic_background" class="form-control" required="">
                                        <option value="">선택하세요</option>
                                        <option value="고졸">고졸</option>
                                        <option value="전문대졸">전문대졸</option>
                                        <option value="대학 재학">대학 재학</option>
                                        <option value="대졸">대졸</option>
                                        <option value="대학 재학">해외대학 재학</option>
                                        <option value="대졸">해외대졸</option>
                                        <option value="대학원 재학">대학원 재학</option>
                                        <option value="대학원졸">대학원졸</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="name_of_last_school" class="control-label">대학교 이름</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="name_of_last_school" id="name_of_last_school" class="form-control" placeholder="대졸 이하 : '없음'을 기입해 주세요" value="" required=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="major" class="control-label">전공 과목</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" name="major" id="major" class="form-control" placeholder="상세히 기술해 주세요" value="" required=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="study_aboard_background" class="control-label">중국 체류 기간</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <select name="study_aboard_background" id="study_aboard_background" class="form-control" required="">
                                        <option value="">선택하세요 / 1년 이하 없음</option>
                                        <option value="0">없음</option>
                                        <option value="1">1년 이상</option>
                                        <option value="2">2년 이상</option>
                                        <option value="3">3년 이상</option>
                                        <option value="4">4년 이상</option>
                                        <option value="5">5년 이상</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_years" class="control-label">강의 경력 년수</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <select name="career_years" id="career_years" class="form-control" required="">
                                        <option value="">선택하세요</option>
                                        <option value="0">없음</option>
                                        <option value="1">1년 이상</option>
                                        <option value="2">2년 이상</option>
                                        <option value="3">3년 이상</option>
                                        <option value="4">4년 이상</option>
                                        <option value="5">5년 이상</option>
                                        <option value="6">6년 이상</option>
                                        <option value="7">7년 이상</option>
                                        <option value="8">8년 이상</option>
                                        <option value="9">9년 이상</option>
                                        <option value="10">10년 이상</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12 col-sm-14">
                                    <label for="" class="control-label">강의 경력 사항 (옵션 : 없으면 입력하지 마세요)</label>
                               </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_1_company_name" class="control-label" style="padding-bottom: 7px;">경력 #1</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_1_company_name" id="career_detail_1_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_1_type" id="career_detail_1_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_1_description" id="career_detail_1_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_1_period" id="career_detail_1_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_2_company_name" class="control-label" style="padding-bottom: 7px;">경력 #2</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_2_company_name" id="career_detail_2_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_2_type" id="career_detail_2_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_2_description" id="career_detail_2_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control"/>
                                    <input name="career_detail_2_period" id="career_detail_2_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_3_company_name" class="control-label" style="padding-bottom: 7px;">경력 #3</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_3_company_name" id="career_detail_3_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_3_type" id="career_detail_3_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_3_description" id="career_detail_3_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_3_period" id="career_detail_3_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_4_company_name" class="control-label" style="padding-bottom: 7px;">경력 #4</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_4_company_name" id="career_detail_4_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_4_type" id="career_detail_4_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_4_description" id="career_detail_4_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_4_period" id="career_detail_4_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_5_company_name" class="control-label" style="padding-bottom: 7px;">경력 #5</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_5_company_name" id="career_detail_5_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_5_type" id="career_detail_5_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_5_description" id="career_detail_5_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_5_period" id="career_detail_5_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_6_company_name" class="control-label" style="padding-bottom: 7px;">경력 #6</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_6_company_name" id="career_detail_6_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_6_type" id="career_detail_6_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_6_description" id="career_detail_6_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_6_period" id="career_detail_6_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_7_company_name" class="control-label" style="padding-bottom: 7px;">경력 #7</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_7_company_name" id="career_detail_7_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_7_type" id="career_detail_7_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_7_description" id="career_detail_7_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_7_period" id="career_detail_7_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_8_company_name" class="control-label" style="padding-bottom: 7px;">경력 #8</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_8_company_name" id="career_detail_8_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_8_type" id="career_detail_8_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_8_description" id="career_detail_8_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_8_period" id="career_detail_8_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_9_company_name" class="control-label" style="padding-bottom: 7px;">경력 #9</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_9_company_name" id="career_detail_9_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_9_type" id="career_detail_9_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_9_description" id="career_detail_9_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_9_period" id="career_detail_9_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="career_detail_10_company_name" class="control-label" style="padding-bottom: 7px;">경력 #10</label>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <input name="career_detail_10_company_name" id="career_detail_10_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control" value=""/>
                                    <input name="career_detail_10_type" id="career_detail_10_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control" value=""/>
                                    <input name="career_detail_10_description" id="career_detail_10_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control" value=""/>
                                    <input name="career_detail_10_period" id="career_detail_10_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" value=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::hidden('number_of_career_details', 1) }}
                                <div class="col-lg-4 col-sm-4">
                                    <label for="prefer_area_lists[]" class="control-label">선호 지역</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <select class="form-control select2-list" data-placeholder="선호지역 선택" name="prefer_area_lists[]" id="prefer_area_lists" multiple>
                                        @foreach($prefer_area_groups as $group)
                                            <optgroup label="{{ $group->name }}">
                                                @foreach($group->lists as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="available_time_morning_start" class="control-label">오전 가능 시간 <input type="checkbox" style="display: inline-block !important;" id="available_time_morning_checkbox"></label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_morning_start" id="available_time_morning_start" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_morning_end" id="available_time_morning_end" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="available_time_afternoon_start" class="control-label">오후 가능 시간 <input type="checkbox" style="display: inline-block !important;" id="available_time_afternoon_checkbox"></label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_afternoon_start" id="available_time_afternoon_start" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_afternoon_end" id="available_time_afternoon_end" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-4 col-sm-4">
                                    <label for="available_time_night_start" class="control-label">심야 가능 시간 <input type="checkbox" style="display: inline-block !important;" id="available_time_night_checkbox"></label>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_night_start" id="available_time_night_start" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                                <div class="col-lg-1 col-sm-2">
                                    <input name="available_time_night_end" id="available_time_night_end" type="text" class="form-control" value="" disabled="disabled"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4">
                                    자기 소개서
                                </div>
                                <div class="col-lg-8">
                                    <div id="toolbar" class="wysihtml5-toolbar" style="display: none; text-align: left;">
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="bold" title="CTRL+B"><i class="fa fa-bold"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="italic" title="CTRL+I"><i class="fa fa-italic"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="underline" title="CTRL+u"><i class="fa fa-underline"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1"><strong>H1</strong></a>
                                            <a class="btn btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2"><strong>H2</strong></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="justifyLeft"><i class="fa fa-align-left"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="justifyCenter"><i class="fa fa-align-center"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="justifyRight"><i class="fa fa-align-right"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="insertUnorderedList"><i class="fa fa-list-ul"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="insertOrderedList"><i class="fa fa-list-ol"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="createLink"><i class="fa fa-link"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="insertImage"><i class="fa fa-picture-o"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="undo"><i class="fa fa-undo"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="redo"><i class="fa fa-repeat"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-command="insertSpeech"><i class="fa fa-microphone"></i></a>
                                            <a class="btn btn-default btn-equal" data-wysihtml5-action="change_view"><i class="fa fa-code"></i></a>
                                        </div>
                                        <div class="panel-bar">
                                            <div data-wysihtml5-dialog="createLink" style="display: none;">
                                                <div class="form-inline">
                                                    <label>Link:</label>
                                                    <input class="form-control control-width-normal" data-wysihtml5-dialog-field="href" value="http://">
                                                    <a class="btn btn-primary" data-wysihtml5-dialog-action="save">OK</a>&nbsp;
                                                    <a class="btn btn-default" data-wysihtml5-dialog-action="cancel">Cancel</a>
                                                </div>
                                            </div>
                                            <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                                <div class="form-inline">
                                                    <label>Image:</label>
                                                    <input class="form-control control-width-normal" data-wysihtml5-dialog-field="src" value="http://">
                                                    <label>Align:</label>
                                                    <select class="form-control control-width-small" data-wysihtml5-dialog-field="className">
                                                        <option value="">default</option>
                                                        <option value="wysiwyg-float-left">left</option>
                                                        <option value="wysiwyg-float-right">right</option>
                                                    </select>
                                                    <a class="btn btn-primary" data-wysihtml5-dialog-action="save">OK</a>&nbsp;
                                                    <a class="btn btn-default" data-wysihtml5-dialog-action="cancel">Cancel</a>
                                                </div>
                                            </div>
                                        </div><!--end .panel-bar -->
                                    </div><!--end #wysihtml5-toolbar -->
                                    <textarea id="wysiwyg" name="resume" class="form-control control-12-rows" placeholder="자기 소개서를 작성하세요 길이 제한은 없습니다." spellcheck="false" required="">

                                    </textarea>
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-lg-4 col-sm-4">
                                    <label for="profile_image" class="control-label">프로필 사진 <br/>필수 입력사항입니다! <br/>
                                    .jpg, .jpeg, .png, .gif, .bmp / 최대 2MB</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    {{ Form::file('profile_image') }}
                                </div>
                            </div>



                            <div class="form-footer">
                                <button type="submit" class="btn btn-success">더만다린 Job Pooling 시스템 등록하기</button>
                                <button id="refresh" type="button" class="btn btn-danger">이력서 새로 작성하기</button>
                            </div>

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection