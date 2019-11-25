$("#countryId").keyup(function () {
    var country = $('#countryId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        url: '/forecast/returnAjaxCountry',
        data: { "fileOperation": fileOperation, "file": file },
        success: function (data) {
            alert("All Ok");
            window.reload();
        }
    });
});