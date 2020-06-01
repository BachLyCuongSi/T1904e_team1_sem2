$(document).ready(function() {

    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
    });
});

$('#addImg').click(function() {
    selectFileWithCKFinder('valUrl');
});

function selectFileWithCKFinder(elementId) {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                output.value = file.getUrl();
                $('#DivImgAdd').append('<img src="' + output.value + '" />');
            });

            finder.on('file:choose:resizedImage', function(evt) {
                var output = document.getElementById(elementId);
                output.value = evt.data.resizedUrl;
            });
        }
    });
}