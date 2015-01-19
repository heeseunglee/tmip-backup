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
                                <h1 class="text-light"><i class="fa fa-microphone fa-fw fa-2x text-support3"> </i><strong class="text-support3">더만다린 강사에 지원해 주셔서 감사드립니다.</strong></h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-gray-light">Invoice</h1>
                            </div>
                        </div>
                        <!-- END INVOICE HEADER -->

                        <br>
                        <!-- START INVOICE DESCRIPTION -->
                        <div class="row">
                            <div class="col-xs-4">
                                <h4 class="text-light">Prepared by</h4>
                                <address>
                                    <strong>Clear Speakers, Inc.</strong><br>
                                    54 Clear Ave<br>
                                    San Francisco, CA 87654<br>
                                    <abbr title="Phone">P:</abbr> (987) 654-3210
                                </address>
                            </div><!--end .col-md-4 -->
                            <div class="col-xs-4">
                                <h4 class="text-light">Prepared for</h4>
                                <address>
                                    <strong>Daniel Johnson, Inc.</strong><br>
                                    621 Johnson Ave, Suite 600<br>
                                    San Francisco, CA 54321<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div><!--end .col-md-4 -->
                            <div class="col-xs-4">
                                <div class="well">
                                    <div class="clearfix">
                                        <div class="pull-left"> INVOICE NO : </div>
                                        <div class="pull-right"> 98653624 </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left"> INVOICE DATE : </div>
                                        <div class="pull-right"> 10/02/14 </div>
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
                                        <th style="width:60px" class="text-center">QTY</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th style="width:140px" class="text-right">UNIT PRICE</th>
                                        <th style="width:90px" class="text-right">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Nostrud exercitation 76 ullamco</td>
                                        <td class="text-right">$385.00</td>
                                        <td class="text-right">$770.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Elit 9.0 sed do eiusmod</td>
                                        <td class="text-right">$215.00</td>
                                        <td class="text-right">$215.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>commodo consequat &amp; Duis aute- irure dolor</td>
                                        <td class="text-right">$405.25</td>
                                        <td class="text-right">$1,621.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" rowspan="4">
                                            <h3 class="text-light opacity-50">Invoice notes</h3>
                                            <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</small></p>
                                            <p><strong><em>Excepteur sint occaecat est laborum.</em></strong></p>
                                        </td>
                                        <td class="text-right"><strong>Subtotal</strong></td>
                                        <td class="text-right">$2,606.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right hidden-border"><strong>Shipping fee</strong></td>
                                        <td class="text-right hidden-border">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right hidden-border"><strong>VAT</strong></td>
                                        <td class="text-right hidden-border">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong class="text-lg text-support3">Total</strong></td>
                                        <td class="text-right"><strong class="text-lg text-support3">$2,606.00</strong></td>
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