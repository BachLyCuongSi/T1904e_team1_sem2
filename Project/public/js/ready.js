$(document).ready(function() {

    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });
    $("#add_logo_place").off('click').on('click', function(e) {
        e.preventDefault();
        var fider = new CKFinder();

        fider.selectActionFunction = function(fileUrl) {
            $("#AddImgLogoPlace ").remove();
            $("#AddLogoPlace").append('<img id="AddImgLogoPlace" src="' + fileUrl + '" class="col-md-12 px-0 border-dekko contentImg" alt="your image" />');
            var url = window.location.origin + fileUrl;
            $('#txtAddLogoPlace').val(url);
        }
        fider.popup();
    });

});