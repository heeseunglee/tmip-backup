<div class="col-sm-12">
    <div class="box">
        {{ Form::hidden('selected_value', '', array('id' => 'selected_value')) }}
        <div class="box-head box-head-xs style-support3">
            <header><h4 class="text-light">{{ $course_main_type->name }}</h4></header>
        </div>
        <div class="box-body">
            @foreach($course_main_type->courseSubTypes as $sub_type)
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="col-sm-12">
                            @if ($course_main_type->can_select_multiple)
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('', $sub_type->name) }}
                                    {{ $sub_type->name }}
                                </label>
                            @else
                                <label class="radio-inline">
                                    {{ Form::radio('', $sub_type->name, '', array('class' => 'sub_types')) }}
                                    {{ $sub_type->name }}
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--end .box-body -->
    </div><!--end .box -->
</div><!--end .col-lg-12 -->