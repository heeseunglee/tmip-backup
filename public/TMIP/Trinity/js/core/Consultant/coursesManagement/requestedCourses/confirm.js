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
        $("#hr_confirmed").click(function(e) {
            $("#modify_inputs").prop("disabled", false);
            $("#modify_inputs").click(function(e) {
                $.get("ajax/modifyInputs", function(data) {
                    $("#modify_input_insert").html(data);
                });
            });
        });
    };

    // =========================================================================
    namespace.Confirm = new Confirm;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
