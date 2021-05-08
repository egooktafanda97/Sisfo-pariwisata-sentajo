<div class="menu__" data-menu="wisata_dan_budaya" data-child="budaya"></div>
<x-app-layout>
    <x-slot name="StyleResource">
        @component('assetsResources.header.indexStyle')
        @slot('addStyle')
        <!-- Animation Css -->
        <link href="{{ asset('Admin') }}/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Colorpicker Css -->
        <link href="{{ asset('Admin') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css"
        rel="stylesheet" />

        <!-- Dropzone Css -->
        <link href="{{ asset('Admin') }}/plugins/dropzone/dropzone.css" rel="stylesheet">

        <!-- Multi Select Css -->
        <link href="{{ asset('Admin') }}/plugins/multi-select/css/multi-select.css" rel="stylesheet">

        <!-- Bootstrap Spinner Css -->
        <link href="{{ asset('Admin') }}/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

        <!-- Bootstrap Tagsinput Css -->
        <link href="{{ asset('Admin') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

        <!-- Bootstrap Select Css -->
        <link href="{{ asset('Admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- noUISlider Css -->
        <link href="{{ asset('Admin') }}/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
        <style type="text/css">
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 0 !important;
            }

            .bootstrap-tagsinput .tag {
                cursor: pointer !important;
            }

            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "#" !important;
                padding: 0px 0px !important;
            }

            div .actionCard {
                margin-bottom: 0 !important;
                margin-top: 10px !important;
            }

            .iconCardAction {
                width: 30px !important;
                height: 30px !important;
                padding: 5px !important;
                border-radius: 50% !important;
            }

            .hr_line_ {
                margin-top: 2px !important;
                margin-bottom: 2px !important;
            }

            .span_btn1 {
                padding: 0 !important;
                margin: 0 !important;
                box-shadow: none !important;
                background: transparent !important;
            }

            .cmt-10 {
                margin-top: 10px !important;
            }

            .commentss {
                background: transparent;
                color: #000 !important;
            }

        </style>
        @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Data Wisata</h2>
        </x-slot>

        <x-slot name="Content">
           <a href="/insbudaya" class="btn btn-info">Tambah Budaya</a>
           <hr>

           <div class="row">
            <div class="col-md-12">
                <table id="mainTable" class="table table-striped">
                    <thead>
                        <tr class="bg-primary">
                            <th>Nama Budaya</th>
                            <th>Asal</th>
                            <th>Kecamatan</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($Q as $element)
                        <tr>
                            <td>
                               {{ $element->nama_budaya }} 
                           </td>
                           <td>
                            {{ $element->alamat_asal }}
                        </td>
                        <td>
                           {{ \App\Models\Kecamatan::whereidKec($element->kecamatan)->first()['nama'] }} 
                       </td>
                       <td>
                        <img src=" {{ asset('Images_assets/budaya/'.$element->gambar) }} " style="width: 100px;">
                    </td>
                    <td>
                        <div class="actionCard">
                            <a href="{{ url('/detailBudaya/'.$element->id) }}"
                                class="btn bg-primary btn-xs waves-effect edit iconCardAction">
                                <i class="material-icons f-15">content_paste</i>
                            </a>
                            <a href="{{ url('/insbudaya/'.$element->id) }}"
                                class="btn bg-teal btn-xs waves-effect edit iconCardAction">
                                <i class="material-icons f-15">create</i>
                            </a>
                            <a data-id="{{ $element->id }}"
                                class="btn bg-red btn-xs waves-effect hapus iconCardAction">
                                <i class="material-icons f-15">delete_forever</i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="col-sm-12 text-right">
            {!! $Q->links('pagination::bootstrap-4') !!}
        </div>
    </div>

</div>

</x-slot>




</x-card>

<x-slot name="ScriptResource">
    @component('assetsResources.footer.indexScript')
    @slot('createScript')
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <!-- Dropzone Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/dropzone/dropzone.js"></script>
    <script src="{{ asset('Admin') }}/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>


    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/nouislider/nouislider.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="{{ asset('Admin') }}/js/pages/forms/advanced-form-elements.js"></script>
    <script>
        $(".hapus").click(function() {
            swal({
                title: "Hapus?",
                text: "Yakin akan menghapus data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    let id = $(this).data('id');
                    $("#loadPage").show();
                    $.ajax({
                        type: "POST",
                        url: base_url + "/deleteBudaya",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(response) {
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
        })

    </script>

    @endslot
    @endcomponent
</x-slot>

</x-app-layout>
