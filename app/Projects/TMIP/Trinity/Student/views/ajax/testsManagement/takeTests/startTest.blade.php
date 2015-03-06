<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-head box-head-xs style-support3">
            </div>
            <div class="box-body text-center">
                <div class="box box-bordered style-danger">
                    <div class="box-body">
                        <strong>주의사항</strong> <br/>
                        <br/>

                        시험 시간은 20분입니다. <br/>
                        시험 도중 절대로 창을 끄거나 뒤로가기를 누르지 마세요. <br/>
                        시험 도중 일시 정지를 원하실 경우 일시정지 버튼을 이용해 주세요. <br/>
                        <br/>

                        <small>시험은 입문 -> 초급 -> 중급 -> 고급 순으로 5문제 씩 출제됩니다.</small>
                    </div>
                </div>
                <p>
                    {{ Form::open() }}
                        {{ Form::submit('시험 시작하기', array('type' => 'button',
                                                            'class' => 'btn btn-primary',
                                                            'name' => 'take_test')) }}
                        {{ Form::submit('시험 건너뛰기', array('type' => 'button',
                                                            'class' => 'btn btn-danger',
                                                            'name' => 'give_up_test')) }}
                    {{ Form::close() }}
                </p>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>
<script>
    function startTest(lvl_test_id) {
        $.get("ajax/takeTest/" + lvl_test_id, function(data) {
            $(".section-body").html(data);
        })
    }
</script>
