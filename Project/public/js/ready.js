$(document).ready(function() {

    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });


});