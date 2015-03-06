<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-head box-head-xs style-support3">
            </div>
            <div class="box-body text-center">
                <div class="box box-bordered style-danger">
                    <div class="box-body">
                        <strong>해당 시험은 완료되었습니다.</strong>
                    </div>
                </div>
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
