@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
    {{ HTML::script('TMIP/Trinity/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/clientsManagement/registration.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::route('Trinity.Consultant.index') }}">홈</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.clientsManagement') }}">고객사 관리</a></li>
            <li class="active">고객사 추가</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 고객사 관리 <small>고객사 추가</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <!-- START VALIDATION WIZARD -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><i class="fa fa-check fa-fw"></i> 고객사 정보 입력</h4></header>
                        </div>
                        <div class="box-body no-padding1">
                            {{ Form::open(array('class' => 'form-horizontal form-bordered form-validate',
                                                'role' => 'form',
                                                'files' => true)) }}
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="name" class="control-label">고객사 이름</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="예) 삼성전자" data-rule-minlength="2" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="logo_image" class="control-label">로고 이미지 <small>(500 x 500px 준수!!)</small></label>
                                </div>
                                <div class="col-sm-9">
                                    {{ Form::file('logo_image', '', array('id'=>'logo_image','class'=>'')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="postcode_1" class="control-label">고객사 주소</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="postcode_1" id="postcode_1" class="postcodify_postcode6_1 form-control" value="" required="">
                                    <span id="postcode_dash">-</span>
                                    <input type="text" name="postcode_2" id="postcode_2" class="postcodify_postcode6_2 form-control" value="" required="">
                                    <button type="button" id="postcodify_search_button" class="btn btn-support3">검색</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <input type="text" name="address_1" id="address_1" class="postcodify_address form-control" value="" placeholder="도로명 주소" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <input type="text" name="address_2" id="address_2" class="postcodify_details form-control" value="" placeholder="상세 주소" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="email" class="control-label">고객사 이메일</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class="form-control" value="" placeholder="고객사 이메일" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="contact_1" class="control-label">고객사 연락처 #1(필수)</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_1" id="contact_1" class="form-control" value="" placeholder="고객사 연락처 #1" data-inputmask="'mask': '99999999999'" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="contact_2" class="control-label">고객사 연락처 #2(선택)</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_2" id="contact_2" class="form-control" value="" placeholder="고객사 연락처 #2" data-inputmask="'mask': '99999999999'"/>
                                </div>
                            </div>
                            <div class="form-footer text-right">
                                <button type="submit" class="btn btn-primary">양식 전송하기</button>
                            </div>
                            {{ Form::close() }}
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END VALIDATION WIZARD -->

        </div><!--end .section-body -->
    </section>
@stop