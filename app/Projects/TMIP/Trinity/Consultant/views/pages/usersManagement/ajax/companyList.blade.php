<div class="btn-group" id="inserted">
    <button class="btn btn-support1 dropdown-toggle" data-toggle="dropdown">
        고객사 리스트 <i class="fa fa-caret-down"></i>
    </button>
    <?php
        $companies = $consultant->getCompanies();
    ?>
    <ul class="dropdown-menu animation-zoom">
        @foreach($companies as $company)
            <li>
                <a href="#" class="link_users_management_index_ajax_company_list">
                    {{ Form::hidden('consultant_id', $consultant->id) }}
                    {{ Form::hidden('company_id', $company->id) }}
                    {{ $company->name_kor }}
                </a>
            </li>
        @endforeach
    </ul>
</div>