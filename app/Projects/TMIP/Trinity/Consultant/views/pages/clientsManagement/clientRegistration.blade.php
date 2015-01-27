@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/clientsManagement/clientRegistration.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/spin.js/spin.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/vendor/jquery.ui.widget.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/vendor/tmpl.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/vendor/load-image.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/vendor/jquery.blueimp-gallery.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.iframe-transport.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-process.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-image.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-audio.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-video.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-validate.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/jquery.fileupload-ui.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/blueimp-file-upload/main.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/slimscroll/jquery.slimscroll.min.js') }}
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
        <div class="section-body">
            <!-- START VALIDATION WIZARD -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><i class="fa fa-check fa-fw"></i> 고객사 정보 입력</h4></header>
                        </div>
                        <div class="box-body no-padding1">
                            <div id="wizard" class="form-wizard form-wizard-horizontal">
                                <form class="form-horizontal form-bordered form-validation" role="form">
                                    <div class="form-wizard-nav">
                                        <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
                                        <ul class="nav nav-justified">
                                            <li class="active"><a href="#tab1" data-toggle="tab"><span class="step">1</span> <span class="title">고객사 정보</span></a></li>
                                            <li><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">주소 정보</span></a></li>
                                            <li><a href="#tab3" data-toggle="tab"><span class="step">3</span> <span class="title">연락처 정보</span></a></li>
                                        </ul>
                                    </div><!--end .form-wizard-nav -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <br><br>
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
                                                    <label for="logo_image" class="control-label">로고 이미지</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <!-- START FILE UPLOAD -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="box">
                                                                <div class="box-head">
                                                                    <header><h4 class="text-light"><strong>고객사 로고 이미지 업로드</strong></h4></header>
                                                                </div>
                                                                <div class="box-body">
                                                                    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                                                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                                        <div class="row fileupload-buttonbar">
                                                                            <div class="col-lg-7">
                                                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                                                <div class="btn-group">
                                                                                    <span class="btn btn-success btn-rounded fileinput-button">
                                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                                        <span>Add files...</span>
                                                                                        <input type="file" name="files[]" multiple="">
                                                                                    </span>
                                                                                    <button type="submit" class="btn btn-primary btn-rounded start">
                                                                                        <i class="glyphicon glyphicon-upload"></i>
                                                                                        <span>Start upload</span>
                                                                                    </button>
                                                                                    <button type="reset" class="btn btn-warning btn-rounded cancel">
                                                                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                                                                        <span>Cancel upload</span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-danger btn-rounded delete">
                                                                                        <i class="glyphicon glyphicon-trash"></i>
                                                                                        <span>Delete</span>
                                                                                    </button>
                                                                                </div>
                                                                                <input type="checkbox" class="toggle">
                                                                                <!-- The global file processing state -->
                                                                                <span class="fileupload-process"></span>
                                                                            </div>
                                                                            <!-- The global progress state -->
                                                                            <div class="col-lg-5 fileupload-progress fade">
                                                                                <!-- The global progress bar -->
                                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                                                </div>
                                                                                <!-- The extended global progress state -->
                                                                                <div class="progress-extended">&nbsp;</div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- The table listing the files available for upload/download -->
                                                                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                                                    </form>
                                                                </div><!--end .box-body -->
                                                            </div><!--end .box -->
                                                        </div><!--end .col-lg-12 -->
                                                    </div><!--end .row -->
                                                    <!-- END FILE UPLOAD -->
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