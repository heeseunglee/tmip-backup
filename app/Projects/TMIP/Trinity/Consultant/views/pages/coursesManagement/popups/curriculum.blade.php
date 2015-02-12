<html lang="en">
<head>
    <title>The Mandarin::TMIP</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="The Mandarin Integration Platform">

    <!-- BEGIN STYLESHEETS -->
    {{ HTML::style('TMIP/Trinity/css/theme-default/bootstrap.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/boostbox.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/boostbox_responsive.css') }}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="/assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="base">
    <div id="content">
        <section>
            <div class="section-header">
                <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 희망과정 선택</h3>
            </div>
            <div class="section-body">
                {{ Form::open(array('class' => 'form-horizontal')) }}
                    <!-- START BASIC TABLE -->
                    <div class="row" id="course_main_types_row">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="box-head box-head-xs style-support3">
                                    <header><h4 class="text-light">더만다린 교육 프로그램</h4></header>
                                </div>
                                <div class="box-body">
                                    @foreach($course_main_types as $main_type)
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="radio-inline">
                                                        {{ Form::radio('course_main_type', $main_type->id) }}
                                                        {{ $main_type->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><!--end .box-body -->
                            </div><!--end .box -->
                        </div><!--end .col-lg-12 -->
                    </div>
                    <!-- END BASIC TABLE -->
                    <div class="row" id="course_sub_types_row">

                    </div>
                    <div class="form-footer text-right">
                        {{ Form::button('양식 전송하기', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
</div>

<!-- BEGIN JAVASCRIPT -->
{{ HTML::script('TMIP/Trinity/js/libs/jquery/jquery-1.11.0.min.js') }}
{{ HTML::script('TMIP/Trinity/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('TMIP/Trinity/js/core/BootstrapFixed.js') }}
{{ HTML::script('TMIP/Trinity/js/libs/bootstrap/bootstrap.min.js') }}
{{ HTML::script('TMIP/Trinity/js/core/Consultant/coursesManagement/popups/curriculum.js') }}
{{ HTML::script('TMIP/Trinity/js/core/App.js') }}
</body>
</html>