@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/firstLogin/firstLogin.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="../../html/.html">home</a></li>
            <li class="active">Wizard</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Form Wizard</h3>
        </div>
        <div class="section-body">
            <!-- START VALIDATION WIZARD -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head">
                            <header><h4 class="text-light"><i class="fa fa-check fa-fw"></i> Validation <strong>Wizard</strong></h4></header>
                        </div>
                        <div class="box-body no-padding1">
                            <div id="wizard" class="form-wizard form-wizard-horizontal">
                                <form class="form-horizontal form-bordered form-validation" role="form">
                                    <div class="form-wizard-nav">
                                        <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
                                        <ul class="nav nav-justified">
                                            <li class="active"><a href="#tab1" data-toggle="tab"><span class="step">1</span> <span class="title">인적 정보</span></a></li>
                                            <li><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">주소 정보</span></a></li>
                                            <li><a href="#tab3" data-toggle="tab"><span class="step">3</span> <span class="title">User settings</span></a></li>
                                            <li><a href="#tab4" data-toggle="tab"><span class="step">4</span> <span class="title">Confirmation</span></a></li>
                                        </ul>
                                    </div><!--end .form-wizard-nav -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <br><br>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="firstname" class="control-label">Name</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name" data-rule-minlength="2" required="">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="First name" data-rule-minlength="2" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="lastname" class="control-label">Gender</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div data-toggle="buttons">
                                                        <label class="btn radio-inline btn-radio-primary active">
                                                            <input type="radio" name="gender" id="option1" value="Male" checked=""> Male
                                                        </label>
                                                        <label class="btn radio-inline btn-radio-primary">
                                                            <input type="radio" name="gender" id="option2" value="Female"> Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="occupation" class="control-label">Occupation</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation" data-rule-minlength="3" required="">
                                                </div>
                                            </div>
                                        </div><!--end #tab1 -->
                                        <div class="tab-pane" id="tab2">
                                            ...
                                        </div><!--end #tab2 -->
                                        <div class="tab-pane" id="tab3">
                                            ...
                                        </div><!--end #tab3 -->
                                        <div class="tab-pane" id="tab4">
                                            ...
                                        </div><!--end #tab4 -->
                                    </div><!--end .tab-content -->
                                    <ul class="pager wizard">
                                        <li class="previous first"><a href="javascript:void(0);">First</a></li>
                                        <li class="previous"><a href="javascript:void(0);">Previous</a></li>
                                        <li class="next last"><a href="javascript:void(0);">Last</a></li>
                                        <li class="next"><a href="javascript:void(0);">Next</a></li>
                                    </ul>
                                </form>
                            </div><!--end #rootwizard -->
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END VALIDATION WIZARD -->

        </div><!--end .section-body -->
    </section>
@stop