$(document).ready(function () {
    let modal_options = {
        backdrop: 'static',
        focus: true,
        show: true
    };

    let select2_options = {
        width: '100%',
    };

    //The first letter represent which element it points to
    // M for modals
    // B for buttons
    // F for forms

    let m_add_file = $("#m_add-file");
    let b_add_file = $("#b_add-file");
    let f_add_file = $("#f_add-file");

    let m_share_file = $("#m_share-file");


    $(document).on('click', '#fileUpload', function () {
        $.ajax({
            url: 'files/create',
            type: 'GET',
            dataType: 'html',
            success: html => {
                m_add_file.html(html);
                m_add_file.modal(modal_options);
            }
        })
    });

    $(document).on('click', '.sharefile', e => {
        let id = $(e.target).parents('tr').prop('id');
        $.ajax({
            url: `files/${id}/share`,
            type: 'GET',
            dataType: 'HTML',
            success: html => {
                m_share_file.html(html);
                m_share_file.modal(modal_options);
                $('#shareWithUsers').select2(select2_options);
            }
        })
    });


    //Remove modal on close
    $(document).on('hidden.bs.modal', '.modal', function (e) {
        $(e.target).empty();
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
        }).then(response => utils.showFile(response.data))
    });

    let utils = {
        showFile: (data) => {
            if (data.uploaded) {
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
                utils.notify('The file has been uploaded!', 'success');
            } else {
                utils.notify('The file couldn\'t be uploaded', 'danger');
            }
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
        },
        notify: (message, type) => {
            $.notify({
                message: message,
            }, utils.notifyOptions(type))
        },
        notifyOptions: (type) => {
            return {
                type: type,
                delay: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                allow_dismiss: false,
                z_index: 2000
            }
        }
    };
});


