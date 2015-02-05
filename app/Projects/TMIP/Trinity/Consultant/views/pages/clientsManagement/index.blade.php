@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/wizard/wizard.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css') }}
    {{ HTML::style('TMIP/Trinity/css/theme-default/libs/DataTables/jquery.dataTables.css') }}
@stop

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
    {{ HTML::script('TMIP/Trinity/js/libs/DataTables/jquery.dataTables.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/core/Consultant/clientsManagement/index.js') }}
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::route('Trinity.Consultant.index') }}">홈</a></li>
            <li><a href="{{ URL::route('Trinity.Consultant.clientsManagement') }}">고객사 관리</a></li>
            <li class="active">전체 보기</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 고객사 관리 <small>전체 보기</small></h3>
        </div>
        @include('flash::message')
        <div class="section-body">
            <!-- START VALIDATION WIZARD -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><i class="fa fa-check fa-fw"></i> 고객사 전체보기</h4></header>
                        </div>
                        <div class="box-body no-padding1">
                            <table class="table table-dataTable" id="all_list_of_clients">
                                <thead>
                                <tr>
                                    <th>로고</th>
                                    <th>고객사 명</th>
                                    <th>대표 이메일</th>
                                    <th>대표 번호</th>
                                    <th>진행 클래스 수</th>
                                    <th>담당자 수</th>
                                    <th>학생 수</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td class="text-center">{{ HTML::image('company/logoImages/'.$company->id, '',
                                                array('class' => 'logo_image')) }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td><a href="mailto:{{ $company->contact_email }}">{{ $company->contact_email }}</a></td>
                                        <td>{{ $company->contact_number_1 }}</td>
                                        <td>{{ $company->courses->count() }}</td>
                                        <td>{{ $company->hrs->count() }}</td>
                                        <td>{{ $company->students->count() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!--end .box-body -->
                    </div><!--end .box -->
                </div><!--end .col-lg-12 -->
            </div>
            <!-- END VALIDATION WIZARD -->

        </div><!--end .section-body -->
    </section>
@stop