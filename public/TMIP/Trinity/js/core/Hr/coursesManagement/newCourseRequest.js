(function(namespace, $) {
    "use strict";

    var NewCourseRequest = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = NewCourseRequest.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initPopUp();
        this._initDateTime();
        this._initSelect2();
    };

    // =========================================================================
    // POP UP WINDOW INIT
    // =========================================================================

    p._initPopUp = function() {
        $('#curriculum_popup_open, #curriculum').click(function(e) {
            window.open('newCourseRequest/curriculumPopUp',
                        'popup',
                        'width=800px, height=600px, left=0, top=0, resizeable=false');
        });
    }

    // =========================================================================
    // DATETIME PICKER
    // =========================================================================

    p._initDateTime = function() {
        if (!$.isFunction($.fn.datetimepicker)) {
            return;
        }
        $('#start_datetime').datetimepicker({
            'format': '시작일 : YYYY-MM-DD / 시작시간 : H시 mm분'
        });
        $('#end_datetime').datetimepicker({
            'format': '종료일 : YYYY-MM-DD / 종료시간 : H시 mm분'
        });
        $('#meeting_datetime').datetimepicker({
            'format': '미팅일 : YYYY-MM-DD / 미팅시간 : H시 mm분'
        });
    };

    // =========================================================================
    // SELECT2
    // =========================================================================

    p._initSelect2 = function() {
        $("#running_days").select2();
    }

    // =========================================================================
    namespace.NewCourseRequest = new NewCourseRequest;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
