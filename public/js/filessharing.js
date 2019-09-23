$(document).ready(function () {
    let modal_options = {
        backdrop: 'static',
        focus: true,
        show: true
    };

    //The first letter represent which element it points to
    // M for modals
    // B for buttons
    // F for forms

    let m_add_file = $("#m_add-file");
    let b_add_file = $("#b_add-file");
    let f_add_file = $("#f_add-file");


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
    });

    $(document).on('submit', f_add_file, function (e) {
        let _token = $("input[name=_token]:first").val();
        let fileName = $("input[name=fileName]:first").val();
        let status = $("select[name=status] option:selected").val();
        let file = $("input[name=file]:first").prop('files')[0];
        e.preventDefault();
        e.stopPropagation();
        let data = new FormData();
        data.append('_token', _token);
        data.append('fileName', fileName);
        data.append('status', status);
        data.append('file', file);
        axios.post('/api/v1/files', data, {
            headers: {'content-type': 'multipart/form-data'}
        }).then(response => utils.showFile(response.data));
    });

    let utils = {
        showFile: (data) => {
            let file = data.file;
            let date = data.date;
            console.log(utils.createStatusBadge(file.status));
            let t = $(".mf-private > table > tbody");
            let r = $(`<tr id="${file.id}"></tr>`);
            let storedFileName = $(`<td>${utils.createFileLink(file.stored_file_name, file.file_name + '.' + file.type)}</td>`);
            let status = $(`<td>${utils.createStatusBadge(file.status)}</td>`);
            let timestamp = $(`<td>${date}</td>`);
            let size = $(`<td>${file.size}</td>`);
            let actions = $(`<td>${utils.createActionButtons()}</td>`);

            r.append(storedFileName, status, timestamp, size, actions);
            t.prepend(r);

            $(m_add_file).modal('hide');
        },
        createStatusBadge: (status) => {
            let badgeColor;
            let badgeMsg;
            switch (status) {
                case '0':
                    badgeColor = 'danger';
                    badgeMsg = 'Private';
                    break;
                case '1':
                    badgeColor = 'warning';
                    badgeMsg = 'Shared';
                    break;
                case '2':
                    badgeColor = 'primary';
                    badgeMsg = 'Public';
                    break;
            }
            return `<span class="badge badge-${badgeColor}">${badgeMsg}</span>`;
        },
        createFileLink: (stored, name) => {
            return `<a href="http://dev.fs/files/download/${stored}" target="_blank">${name}</a>`;
        },
        createActionButtons: () => {
            return `<i title="Delete the file" class="fas fa-trash deletefile"></i>&nbsp;<i title="Share the file" class="fas fa-user-plus sharefile"></i>`;
        }
    };
});


