const reload = () => {
    $.ajax({
        url: '/uni',
        type: 'get',
        success: function (data) {
            var $select = $('#uni-picker .picker');

            $select.find('option:not([value=""])').remove();

            $.each(data, function (index, university) {
                $select.append($('<option>', {
                    value: university.id,
                    text: university.uni_name
                }));
            });
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

$(document).ready(function () {
    const modal = $('#uniModal');
    modal.hide();

    $('#openUniModalBtn').click(function () {
        modal.show();
    });

    $('.close').click(function () {
        modal.hide();
    });

    $(window).click(function (event) {
        if ($(event.target).is(modal)) {
            modal.hide();
        }
    });

    $('#uniForm').on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: 'post',
            url: "uni/add",
            data: $('#uniForm').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.success === true) {
                    document.querySelector("#response-message").innerHTML = "Universiuni-pickerty successfully added!";
                    reload();
                } else {
                    document.querySelector("#response-message").innerHTML = response.msg;
                }


                modal.hide();
            }
        });
    });

});