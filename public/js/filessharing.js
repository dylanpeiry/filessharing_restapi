$(document).ready(function () {
    var modal_options = {
        backdrop: 'static',
        focus: true,
        show: true
    };

    var m_add_file = $("#m_add-file");
    $(document).on('click', '#fileUpload', function () {
        $.ajax({
            url: 'files/create',
            type: 'GET',
            dataType: 'html',
            success: function (html) {
                m_add_file.html(html);
                m_add_file.modal(modal_options);
            }
        })
    })
});
