{{-- <input type="hidden" id="des" value="{{ !empty($Q->deskripsi) ? $Q->deskripsi : '' }}"/> --}}
<input type="hidden" value="{{ !empty($Q->id) ? $Q->id : '' }}" id="id">
<div class="menu__" data-menu="produk" data-child="produk_inp"></div>
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
                <link type="text/css" href="{{ asset('plugin/ckeditor5-build-classic') }}/sample/css/sample.css"
                    rel="stylesheet" media="screen" />
                <style>
                    .form-control {
                        border: 1px solid gray !important;
                        border-radius: 10px !important;
                        padding-left: 10px !important;
                    }

                    .ck-editor__editable {
                        min-height: 200px !important;
                    }

                </style>
            @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Buat Produk</h2>
        </x-slot>

        <x-slot name="Content">

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <label>Nama Produk</label>
                        <div class="form-line">
                            <input required type="text" class="form-control nama" placeholder="Nama Produk"
                                name="nama_produk" value="{{ !empty($Q->nama_produk) ? $Q->nama_produk : '' }}">
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Kategori Produk</label>
                        <div class="form-line">
                            <input required type="text" class="form-control" placeholder="kategori produk"
                                name="kategori" value="{{ !empty($Q->nama_produk) ? $Q->kategori : '' }}">
                        </div>
                        <span style="font-size: 8px; color:green">
                            <i>setiap membuat kategori baru akan terdata dengan
                                kategori baru pula
                            </i>
                        </span>
                    </div>
                    {{-- <div class="input-group ">
                        <label>Harga Produk</label>
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Harga" name="harga">
                        </div>
                        <span style="font-size: 8px; color:green">
                            <i>
                                Boleh di kosongkan
                            </i>
                        </span>
                    </div> --}}
                    <div class="input-group">
                        <label>Web Info lengkap produk</label>
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="http://info.com" name="web_info"
                                value="{{ !empty($Q->web_info) ? $Q->web_info : '' }}">
                        </div>
                        <span style="font-size: 8px; color:green">
                            <i>
                                blog atau pun website yang menjelaskan rinci produk. boleh kosong
                            </i>
                        </span>
                    </div>

                    <div class="input-group">
                        <label>Keterangan Produk</label>
                        <div class="form-line">
                            <textarea rows="4" class="form-control no-resize"
                                placeholder="Keterangan singkat barang 1 paragraf"
                                name="keterangan">{{ !empty($Q->keterangan) ? $Q->keterangan : '' }}</textarea>
                        </div>
                        <span style="font-size: 8px; color:green">
                            <i>
                                Keterngan singkat produk, hanya 1 paragraf
                            </i>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Deskripsi Produk</label>
                    <div id="editor">
                        {!! !empty($Q->deskripsi) ? $Q->deskripsi : '' !!}
                    </div>
                    <br>
                    <br>
                    <div class="col-md-8 col-sm-8">
                        <div class="input-group">
                            <label>Gambar Produk</label>
                            <div class="form-line">
                                <input required type="file" class="form-control" placeholder="Web Info" name="gambar">
                            </div>
                        </div>
                    </div>
                    @if (!empty($Q->images))
                        <div class="w-100 text-right col-md-4 col-sm-4">
                            <img src="{{ asset('produk/' . $Q->images) }}" width="100%" />
                        </div>
                    @endif
                    <br>
                    <br>
                    <div class="input-group text-right">
                        <button class="btn btn-primary waves-effect save" style="width: 200px">
                            Simpan
                        </button>
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
                <script src="{{ asset('plugin/ckeditor5-build-classic') }}/ckeditor.js"></script>
                <script>
                    var myEditor;

                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            // console.log('Editor was initialized', editor);
                            window.editor = editor;
                            myEditor = editor;
                        })
                        .catch(err => {
                            console.error(err.stack);
                        });

                    // if($("#des").val() != ""){
                    // myEditor.setData($("#des").val());
                    // }

                    $(".save").click(function() {
                        if ($('[name="nama_produk"]').val() == '' || $('[name="kategori"]').val() == '') {

                            swal({
                                title: "Ma'af",
                                text: "Nama, kategory, gambar tidak boleh kosong",
                                icon: "warning",
                                button: "Ok",
                            });

                            return false;
                        } else {
                            console.log(myEditor.getData());
                            // let file_data = $("." + getInputClass).prop('files')[0];
                            let form_data = new FormData();
                            // form_data.append('file', file_data);
                            form_data.append('_token', '{{ csrf_token() }}');
                            form_data.append('Id', $("#id").val());
                            form_data.append('nama_produk', $('[name="nama_produk"]').val());
                            form_data.append('kategori', $('[name="kategori"]').val());
                            // form_data.append('harga', $('[name="harga"]').val());
                            form_data.append('harga', '');
                            form_data.append('web_info', $('[name="web_info"]').val());
                            form_data.append('keterangan', $('[name="keterangan"]').val());
                            form_data.append('deskripsi', (myEditor.getData()));
                            form_data.append('images', $('[name="gambar"]').prop('files')[0]);

                            // console.log(formObj);


                            $("#loadPage").show();
                            $.ajax({
                                type: "POST",
                                url: base_url + "/produk_proses",
                                dataType: "json",
                                data: form_data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    $("#loadPage").hide();
                                    console.log(response);
                                    if (response.status == '200') {
                                        swal({
                                            title: "Berhasil",
                                            text: "Data tlah disimpan",
                                            icon: "success",
                                            button: "Ok",
                                        }).then((btn) => {
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
                                        }).then((btn) => {
                                            if (btn) {
                                                location.reload();
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    });

                </script>


            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
