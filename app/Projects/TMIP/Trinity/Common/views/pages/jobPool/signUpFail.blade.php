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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 지원 결과<small> 페이지</small></h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-printable style-transparent">
                    <div class="box-head">
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="fa fa-print"></i> 출력</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body style-white">
                        <!-- START INVOICE HEADER -->
                        <div class="row">
                            <div class="col-xs-8">
                                <h1 class="text-light"><i class="fa fa-microphone fa-fw fa-2x text-support3"> </i><strong class="text-support3">죄송합니다 해당 사용자는 이미 등록되어 있습니다.</strong></h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-gray-light">지원 실패</h1>
                            </div>
                        </div>
                        <!-- END INVOICE HEADER -->

                        <br>
                        <!-- START INVOICE DESCRIPTION -->
                        <div class="row">
                            <div class="col-xs-4">
                                {{ HTML::image('jobPool/signUp/profileImages/'.$exist->id,
                                '', array('width' => '354px', 'height' => '472px')) }}
                            </div><!--end .col-md-2 -->
                            <div class="col-xs-4">
                                <h4 class="text-light">지원자 정보</h4>
                                <address>
                                    <strong>{{ $exist->name_kor }}</strong><br/>
                                    {{ $exist->email }} <br/>
                                    <abbr title="Phone">P:</abbr> {{ $exist->phone_number }}
                                </address>
                            </div><!--end .col-md-4 -->
                            <div class="col-xs-4">
                                <div class="well">
                                    <div class="clearfix">
                                        <div class="pull-left"> 지원 번호 : </div>
                                        <div class="pull-right"> {{ $exist->id }} </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left"> 지원 날짜 : </div>
                                        <div class="pull-right"> {{ strftime('%Y-%m-%d', strtotime($exist->created_at)) }} </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .row -->
                        <!-- END INVOICE DESCRIPTION -->

                        <br>

                    </div><!--end .box-body -->
                </div><!--end .box -->
            </div><!--end .col-lg-12 -->
        </div>
    </section>
@endsection