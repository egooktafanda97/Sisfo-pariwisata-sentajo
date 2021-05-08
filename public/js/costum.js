function fuc_ajax(res, url, data) {
    $("#loadPage").show();
    $.ajax({
        url: url,
        dataType: 'json',
        data: data,
        type: 'post',
        success: function (response) {
            $("#loadPage").hide();
            res(response);
        }
    });
}

function ajax_save_up(url, data) {
    $("#loadPage").show();
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (response) {
            $("#loadPage").hide();
            console.log(response);
            if (response.status == '200') {
                swal({
                        title: "Berhasil",
                        text: "Data tlah disimpan",
                        icon: "success",
                        button: "Ok",
                    })
                    .then((btn) => {
                        if (btn) {
                            location.reload();
                        }
                    });
            } else {
                swal({
                        title: "Ma'af",
                        text: "Data gagal disimpan",
                        icon: "error",
                        button: "Ok",
                    })
                    .then((btn) => {
                        if (btn) {
                            location.reload();
                        }
                    });
            }
        }
    });
}

function hapus(url, data) {
    swal({
            title: "Hapus?",
            text: "Yakin akan menghapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $("#loadPage").show();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        $("#loadPage").hide();
                        console.log(response);
                        if (response.status == '200') {
                            swal({
                                    title: "Berhasil",
                                    text: "Data tlah dihapus",
                                    icon: "success",
                                    button: "Ok",
                                })
                                .then((btn) => {
                                    if (btn) {
                                        location.reload();
                                    }
                                })
                        } else {
                            swal({
                                    title: "Ma'af",
                                    text: "Data gagal dihapus",
                                    icon: "error",
                                    button: "Ok",
                                })
                                .then((btn) => {
                                    if (btn) {
                                        location.reload();
                                    }
                                })
                        }
                    }
                });
            }
        });
}

function ajax_save_redirect(url, data, redirect) {
    $("#loadPage").show();
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (response) {
            $("#loadPage").hide();
            console.log(response);
            if (response.status == '200') {
                swal({
                        title: "Berhasil",
                        text: "Data tlah disimpan",
                        icon: "success",
                        button: "Ok",
                    })
                    .then((btn) => {
                        if (btn) {
                            redirect(true);
                        }
                    });
            } else {
                swal({
                        title: "Ma'af",
                        text: "Data gagal disimpan",
                        icon: "error",
                        button: "Ok",
                    })
                    .then((btn) => {
                        if (btn) {
                            redirect(false);
                        }
                    });
            }
        }
    });
}
