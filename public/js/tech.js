const reloadTech = () => {
    $.ajax({
        url: '/tech',
        type: 'get',
        success: function (data) {
            const $select = $('#tech-picker .picker');

            $select.find('option:not([value=""])').remove();

            $.each(data, function (index, tech) {
                $select.append($('<option>', {
                    value: tech.id,
                    text: tech.tech_name
                }));
            });
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

$(document).ready(function () {
    const modal = $('#techModal');

    $('#openTechModalBtn').click(function () {
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

    $('#techForm').on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: 'post',
            url: "tech/add",
            data: $('#techForm').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.success === true) {
                    document.querySelector("#response-message").innerHTML = "Tech successfully added!";
                    reloadTech();
                } else {
                    console.log(response.msg);
                }


                modal.hide();
            }
        });
    });

});