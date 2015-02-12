/**
 * Created by finallee on 15. 2. 11..
 */
(function(namespace, $) {
    "use strict";

    var Confirm = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = Confirm.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initButtonEvent();
    };

    // =========================================================================
    // BUTTON EVENT
    // =========================================================================

    p._initButtonEvent = function() {
        $.ajaxSetup({async:false});

        var current_url = $(location).attr("href");
        var token_array = current_url.split("/");

        $("#hr_confirmed").click(function(e) {
            $("#modify_inputs").prop("disabled", false);
            $("#modify_inputs").click(function(e) {
                $.get("ajax/modifyInputs/" + token_array[token_array.length - 1], function(data) {
                    $("#modify_input_insert").html(data);
                });
                $("#hr_confirmed, #modify_inputs").prop("disabled", true);
            });
        });
    };

    // =========================================================================
    // SELECT2
    // =========================================================================

    p._initSelect2 = function() {
        $("#running_days").select2({});
    };

    // =========================================================================
    namespace.Confirm = new Confirm;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
