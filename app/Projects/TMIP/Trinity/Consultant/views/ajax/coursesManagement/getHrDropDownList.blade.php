<div class="form-group">
    <div class="col-sm-3">
        {{ Form::label('hr', '인사 담당자', array('class' => 'control-label')) }}
    </div>
    <div class="col-sm-9">
        <?php
            $hrs = $company->hrs;
            $hrs_id_array = array('' => '선택하세요');
            foreach($hrs as $hr) {
                $hrs_id_array[$hr->id] = $hr->user->name_kor;
            }
        ?>
        {{ Form::select('hr',
                        $hrs_id_array,
                        '',
                        array('required' => '',
                            'class' => 'form-control')) }}
    </div>
</div>