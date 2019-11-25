$("#applyOperation").click(function () {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".nr").text(); // Find the text

    // Let's test it out
    console.log($text);
    
    var fileOperation = $('#foMethod').val();
    var file = 
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        url: '/files/settleOperation',
        data: { "fileOperation": fileOperation , "file":file },
        success: function (data) {
            alert("All Ok");
        }
    });
});
