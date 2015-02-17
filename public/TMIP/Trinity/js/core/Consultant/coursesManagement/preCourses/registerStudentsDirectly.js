(function(namespace, $) {
    "use strict";

    var RegisterStudentsDirectly = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = RegisterStudentsDirectly.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initMultiSelect();
        this._initEventForAddStudentRow();
    };

    // =========================================================================
    // MULTI SELECT
    // =========================================================================

    p._initMultiSelect = function() {
        if (!$.isFunction($.fn.multiSelect)) {
            return;
        }
        $("#existing_students").multiSelect({
            afterSelect: function(value) {
                var number_of_selected = $("li.ms-selected").length / 2;
                var number_of_students = $("input[name='number_of_students']").val();
                if(Number(number_of_selected) > Number(number_of_students)) {
                    //alert("aaa");
                    //$('#existing_students').multiSelect('deselect', value);
                }
            }
        });
    };

    // =========================================================================
    // STUDENT ADD ROW
    // =========================================================================

    p._initEventForAddStudentRow = function() {
        $("#add_student_row").click(function() {
            alert("hi 이정은~");
        });
    };
    // =========================================================================
    namespace.RegisterStudentsDirectly = new RegisterStudentsDirectly;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
