<div class="menu__" data-menu="wisata_dan_budaya" data-child="budaya"></div>
<input type="hidden" name="id" id="id" value="{{ !empty($Q->id) ? $Q->id : '' }}">
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
                {{-- <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
                <link rel="stylesheet" href="{{ asset('theme') }}/css/font-awesome.min.css">
                <style type="text/css">
                    .thumbnail {
                        border: none !important;
                        background: transparent !important;
                    }

                    .img-responsive {
                        border-radius: 100% !important;
                        width: 150px !important;
                        height: 150px !important;
                        border: 2px solid gray;
                    }

                    .img-responsive:hover {
                        border: 2px solid orange;
                    }

                    .img_add {
                        opacity: 0.5;
                    }

                    .icon_delete {
                        position: absolute;
                        top: 20px;
                        right: 40px;
                        font-size: 20px;
                        /*z-index: 9999; */
                        width: 30px;
                        height: 30px;
                        background: red;
                        color: #fff;
                        border-radius: 100%;
                        padding-top: 2px;
                        cursor: pointer;
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
            <h2>Form Wisata</h2>
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-float" style="margin-bottom: 0">
                        <div class="form-line">
                            <input type="text" class="form-control" name="title" id="nama_budaya"
                                value="{{ !empty($Q) ? $Q->nama_budaya : '' }}">
                            <label class="form-label" style="color: #000">Nama Budaya</label>
                        </div>
                    </div>
                    <br>
                    <label>Sejarah Singkat Budaya</label>
                    <div id="editor">
                        {!! !empty($Q) ? $Q->sejarah_singkat : '' !!}
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    {{-- //// kecamatan ///////////////// --}}
                    <div class="form-group form-float" style="margin-bottom: 0">
                        <div class="form-line">
                            <input type="text" class="form-control" name="title" id="alamat"
                                value="{{ !empty($Q) ? $Q->alamat_asal : '' }}">
                            <label class="form-label" style="color: #000">Alamat Asal Budaya</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-float" style="margin-bottom: 0">
                        <div class="form-line">
                            <span>Status Pelestarian</span>
                            <select class="form-control show-tick" id="pelestarian">
                                <option>Dilestarikan</option>
                                <option>Belum Di Lestarikan</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-float" style="margin-bottom: 0">
                        <div class="form-line">
                            <span>Kecamatan</span>
                            <select class="form-control show-tick kecamatan" id="kecamatan">
                                <option>--- Pilih Kecamatan ---</option>
                                @foreach (\App\Models\Kecamatan::whereidKab('1409')->get() as $element)
                                    <option value="{{ $element->id_kec }}">{{ $element->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- //// end kecamatan /////////////// --}}
                    <br>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0">
                                    <div class="form-line">
                                        <label style="color: #000">Gambar</label>
                                        <input type="file" class="form-control" name="title" id="gambar"
                                            onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset(!empty($Q) ? 'Images_assets/budaya/' . $Q->gambar : 'images/default.jpg') }}"
                                    style="width: 100%" id="frame">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" style="margin-bottom: 0">
                                    <div class="form-line">
                                        <label style="color: #000">Vidio</label>
                                        <input type="file" class="form-control" name="title" id="vidio">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="body video-prev">
                                        <video
                                            src="{{ asset(!empty($Q) ? 'Images_assets/vidio_budaya/' . $Q->vidio : '') }}"
                                            height="200" width="100%" class="video-preview" controls="controls" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- TinyMCE -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <label>Detail Budaya</label>
                                        <textarea id="tinymce">{!! isset($Q->deskripsi) ? $Q->deskripsi : '' !!}</textarea>
                                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# TinyMCE -->

                    </div>
                </div>
                <div class="col-md-12">
                    <div style="width: 100%" class="text-right">
                        <button class="btn btn-primary btn-save" style="width: 200px">Simpan</button>
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
                <script src="{{ asset('Admin') }}/js/pages/forms/advanced-form-elements.js"></script>
                <script src="{{ asset('Admin') }}/js/pages/forms/editors.js"></script>
                <script type="text/javascript">
                    const Q_kecamatan = "{{ !empty($Q) ? $Q->kecamatan : '' }}";
                    const Q_lestari = "{{ !empty($Q) ? $Q->status_pelestarian : '' }}";

                    if (Q_kecamatan != '' || Q_kecamatan != undefined) {

                        $(".kecamatan").val(Q_kecamatan);
                        $(".kecamatan").selectpicker('refresh');

                        $("#pelestarian").val(Q_lestari);
                        $("#pelestarian").selectpicker('refresh');
                    }

                    $(".kecamatan").change(function() {
                        const dt = {
                            id: $(this).val(),
                            _token: '{{ csrf_token() }}'
                        }
                        getDesa(dt, respon);

                        function respon(res) {
                            $('#desa').find('option').remove();
                            $.each(res, function(i, item) {
                                $('#desa').append('<option value="' + item.id_kel + '">' + item.nama +
                                    '</option>');
                                $('#desa').selectpicker('refresh');
                            });
                        }
                    });
                    var myEditor;

                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            window.editor = editor;
                            myEditor = editor;
                        })
                        .catch(err => {
                            console.error(err.stack);
                        });

                    // ==========================================================================
                    var loadFile = function(event) {
                        $("#loadPage").show();
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('frame');
                            output.src = reader.result;
                            $("#loadPage").hide();
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    };

                    $('#vidio').change(function() {
                        $('.video-preview').attr('src', URL.createObjectURL($(this).prop('files')[0]));
                        $('.video-prev').show();
                    })
                    // ==========================================================================

                    // Save //////////////////////////////////////////////////////////////////////
                    $(".btn-save").click(function() {
                        let form_data = new FormData();
                        form_data.append('_token', '{{ csrf_token() }}');
                        form_data.append('id', $("#id").val());
                        form_data.append('nama_budaya', $("#nama_budaya").val());
                        form_data.append('sejarah_singkat', myEditor.getData());
                        form_data.append('alamat_asal', $("#alamat").val());
                        form_data.append('kecamatan', $("#kecamatan").val());
                        form_data.append('gambar', $("#gambar").prop('files')[0]);
                        form_data.append('vidio', $("#vidio").prop('files')[0]);
                        form_data.append('deskripsi', tinymce.get("tinymce").getContent());
                        form_data.append('status_pelestarian', $("#pelestarian").val());
                        // for (var pair of form_data.entries()) {
                        //     console.log(pair[0] + " => " + pair[1]);
                        // }
                        ajax_save_redirect(base_url + '/seendBudaya', form_data, redirect);

                        function redirect(bol) {
                            if (bol) {
                                location.reload();
                                // window.location.href = base_url + '/wisata'
                            } else {
                                location.reload();
                            }
                        }
                    });

                    // end save ////////////////////////////////////////////////////////////////

                </script>

            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
