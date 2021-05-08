<input type="hidden" value="{{ !empty($Q->id) ? $Q->id : '' }}" id="id">
<div class="menu__" data-menu="berita" data-child="berita_child"></div>
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

                <style>
                    .p-20 {
                        padding: 20px 20px 0 20px !important;
                    }

                </style>
            @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2><strong>Entry Berita</strong></h2>
        </x-slot>

        <x-slot name="cardTitleRight">
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    {{-- <button class="btn btn-info">Preview</button> --}}
                    <button id="entry_" class="btn btn-primary waves-effect" style="width: 100px">Entry</button>
                </li>
            </ul>
        </x-slot>

        <x-slot name="Content">
            <div class="row p-20">
                <div class="col-md-12">
                    <div class="form-group form-float" style="margin-bottom: 0">
                        <div class="form-line">
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ !empty($Q->title) ? $Q->title : '' }}">
                            <label class="form-label" style="color: #000">Judul</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <span>Thumbnail</span>
                            <input type="file" id="thumbnail" class="form-control" name="title">
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
                                    <textarea id="tinymce">{!!  !empty($Q->id) ? $Q->content : '' !!}</textarea>
                                    <input name="image" type="file" id="upload" class="hidden" onchange="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# TinyMCE -->

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
                <script src="{{ asset('Admin') }}/js/pages/forms/editors.js"></script>

                <script>
                    $("#entry_").click(function() {
                        let form_data = new FormData();
                        form_data.append('_token', '{{ csrf_token() }}');
                        form_data.append('judul', $("#title").val());
                        form_data.append('thumbnail', $("#thumbnail").prop('files')[0]);
                        form_data.append('content', tinymce.get("tinymce").getContent());
                        form_data.append('id', $("#id").val());

                        // for (var pair of form_data.entries()) {
                        //     console.log(pair[0] + " => " + pair[1]);
                        // }

                        $("#loadPage").show();
                        $.ajax({
                            type: "POST",
                            url: base_url + "/save_berita",
                            data: form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            // dataType: "json",
                            success: function(response) {
                                $("#loadPage").hide();
                                if (response.status == '200') {
                                    swal({
                                            title: "Berhasil",
                                            text: "Data tlah disimpan",
                                            icon: "success",
                                            button: "Ok",
                                        })
                                        .then((btn) => {
                                            if (btn) {
                                                window.location.href = base_url + '/admgetBerita'
                                            }
                                        })
                                } else {
                                    swal({
                                            title: "Ma'af",
                                            text: "Data gagal disimpan",
                                            icon: "error",
                                            button: "Ok",
                                        })
                                        .then((btn) => {
                                            if (btn) {
                                                window.location.href = base_url + '/admgetBerita'
                                            }
                                        })
                                }
                            }
                        });


                    });

                </script>

            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
