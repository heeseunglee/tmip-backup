@extends('TrinityCommonView::layouts.master')

@section('additional_css_includes')

@endsection

@section('additional_js_includes')

@endsection

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li>{{ HTML::linkAction('Trinity.Consultant.index', '홈') }}</li>
            <li>{{ HTML::linkAction('Trinity.Consultant.usersManagement', '사용자 관리') }}</li>
            <li class="active">{{ HTML::linkAction('Trinity.Consultant.usersManagement.usersRegistration', '사용자 추가') }}</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 학생 등록이 완료 되었습니다.</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>학생 등록 결과</strong></h4></header>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <table class="table no-margin table-hover">
                                    <thead>
                                    <tr>
                                        <td>상태</td>
                                        <th>이름</th>
                                        <th>이메일</th>
                                        <th>고객사</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result_array as $result)
                                        <tr @if($result[1] == '등록 성공') class="success" @else class="danger" @endif>
                                            <td>{{ $result[1] }}</td>
                                            <td>{{ \Student::find($result[0])->user->name_kor }}</td>
                                            <td>{{ \Student::find($result[0])->user->account_email }}</td>
                                            <td>{{ \Student::find($result[0])->company->name_kor }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection