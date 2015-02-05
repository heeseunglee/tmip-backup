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
            @if ($role == 'Student')
                <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 학생 등록이 완료 되었습니다.</h3>
            @elseif ($role == 'Instructor')
                <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 교수진 등록이 완료 되었습니다.</h3>
            @elseif ($role == 'Hr')
                <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> HR 등록이 완료 되었습니다.</h3>
            @endif
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head style-primary">
                            <header><h4 class="text-light"><strong>등록 결과</strong></h4></header>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <table class="table no-margin table-hover">
                                    <thead>
                                    <tr>
                                        <td>상태</td>
                                        <th>이름</th>
                                        <th>이메일</th>
                                        @if ($role == 'Student' or $role == 'Hr')
                                            <th>고객사</th>
                                        @endif
                                        @if ($role == 'Hr')
                                            <th>담당 컨설턴트</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($role == 'Student')
                                        @foreach($result_array as $result)
                                            <tr @if($result[1] == '등록 성공') class="success" @else class="warning" @endif>
                                                <td>{{ $result[1] }}</td>
                                                <td>{{ \Student::find($result[0])->user->name_kor }}</td>
                                                <td>{{ \Student::find($result[0])->user->account_email }}</td>
                                                <td>{{ \Student::find($result[0])->company->name }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if ($role == 'Instructor')
                                        @foreach($result_array as $result)
                                            <tr @if($result[1] == '등록 성공') class="success" @else class="warning" @endif>
                                                <td>{{ $result[1] }}</td>
                                                <td>{{ \Instructor::find($result[0])->user->name_kor }}</td>
                                                <td>{{ \Instructor::find($result[0])->user->account_email }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if ($role == 'Hr')
                                        @foreach($result_array as $result)
                                            <tr @if($result[1] == '등록 성공') class="success" @else class="warning" @endif>
                                                <td>{{ $result[1] }}</td>
                                                <td>{{ \Hr::find($result[0])->user->name_kor }}</td>
                                                <td>{{ \Hr::find($result[0])->user->account_email }}</td>
                                                <td>{{ \Hr::find($result[0])->company->name }}</td>
                                                <td>{{ \Hr::find($result[0])->consultant->user->name_kor }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
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