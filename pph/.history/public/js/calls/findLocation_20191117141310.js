$("#countryId").keyup(function () {
    $("#getCountriesDropDown").empty();
    var country = $('#countryId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: "json",
        url: '/forecast/returnAjaxCountry',
        data: { "country": country },
        success: function (data) {
            for (i = 0; i <= data.length; i++) {
                if (data[i] !== 'undefined') {
                    $("#getCountriesDropDown").append("<option  class='form-control' value = '" + data[i] + "'>" + data[i] + "</option>");
                }
            }
        }
    });
});

$("#getCountriesDropDown").click(function () {
    $('#countryId').val($('#getCitiesDropDown').val());
    $('#cityId').prop("disabled", false);
    $('#countryId').css("display", "none");
});

$("#cityId").click(function () {
    var city = $('#cityId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: "json",
        url: '/forecast/returnAjaxCity',
        data: { "city": city, "country": $('#getCitiesDropDown').val() },
        success: function (data) {

            for (i = 0; i <= data.length; i++) {
                var obj = JSON.parse(data[i]);
                $("#getCitiesDropDown").append("<option  class='form-control' value = '" + obj[0] + "'>" + obj[1] + "</option>");
            }
        }
    });
});
