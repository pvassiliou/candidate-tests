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
                var res = data.split("-");
                $("#getCountriesDropDown").append("<option  class='form-control' value = '" + data[i]['id'] + "'>" + data[i]['country_name'] + "</option>");
            }
        }
    });
});

$("#getCountriesDropDown").click(function () {
    $('#countryId').val($('#getCountriesDropDown').val()); 
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: "json",
        url: '/forecast/returnAjaxCity',
        data: { "city": city },
        success: function (data) {
            for (i = 0; i <= data.length; i++) {
                $("#getCountriesDropDown").append("<option  class='form-control' value = '" + data[i] + "'>" + data[i] + "</option>");
            }
        }
    });
});