@if($company != null)
    <div class="box">
        <div class="box-head box-head-xs style-support3">
            <header><h4 class="text-light"><strong>{{ $consultant->user->name_kor }}</strong> 컨설턴트 : <strong>{{ $company->name_kor }}</strong></h4></header>
        </div>
        <div class="box-body">
            <table class="table table_user_management_index_consultant_company_detail">
                <thead>
                <tr>
                    <th>담당 고객사</th>
                    <th>클래스 수</th>
                    <th>학생 수</th>
                    <th>담당 HR</th>
                    <th>보기</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $company->name_kor }}</td>
                    <td>{{ $company->courses->count() }}</td>
                    <td>{{ $company->students->count() }}</td>
                    <td>
                        @foreach($consultant->getHrsFromCompany($company->id) as $hr)
                            <button type="button" class="btn btn-default hr_tooltip" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right">{{ $hr->user->name_kor }}</button>
                        @endforeach
                    </td>
                    <td>
                        <a href="#" class="link_users_management_index_ajax_company_course">
                            {{ Form::hidden($consultant->id, 'consultant_id') }}
                            {{ Form::hidden($company->id, 'company_id') }}
                            <i class="flaticon-magnifier10"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="box">
        <div class="box-head box-head-xs style-support3">
            <header><h4 class="text-light"><strong>{{ $consultant->user->name_kor }}</strong> 컨설턴트</h4></header>
        </div>
        <div class="box-body">
            <table class="table table_user_management_index_consultant_company_detail">
                <thead>
                <tr>
                    <th>담당 고객사</th>
                    <th>클래스 수</th>
                    <th>학생 수</th>
                    <th>담당 HR</th>
                    <th>보기</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $companies = $consultant->getCompanies();
                ?>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name_kor }}</td>
                        <td>{{ $company->courses->count() }}</td>
                        <td>{{ $company->students->count() }}</td>
                        <td>
                            @foreach($consultant->getHrsFromCompany($company->id) as $hr)
                                <button type="button" class="btn btn-default hr_tooltip"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right">{{ $hr->user->name_kor }}</button>
                            @endforeach
                        </td>
                        <td>
                            <a href="#" class="link_users_management_index_ajax_company_course">
                                {{ Form::hidden($consultant->id, 'consultant_id') }}
                                {{ Form::hidden($company->id, 'company_id') }}
                                <i class="flaticon-magnifier10"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif