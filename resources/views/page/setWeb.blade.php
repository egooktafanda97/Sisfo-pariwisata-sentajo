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
            @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Pengaturan Website</h2>
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <div class="col-md-6">

                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control web_name" placeholder="Nama Website"
                                value="{{ isset($Q->web_name) ? $Q->web_name : '' }}">
                        </div>
                        <span class="input-group-addon ">
                            <button class="btn bg-teal btn-circle waves-effect waves-circle waves-float sv"
                                data-input="nama_web">
                                <i class="material-icons">done</i>
                            </button>

                        </span>
                    </div>


                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control owner" placeholder="Nama Pemilik Website"
                                value="{{ isset($Q->owner) ? $Q->owner : '' }}">
                        </div>
                        <span class="input-group-addon ">
                            <button class="btn bg-teal btn-circle waves-effect waves-circle waves-float sv"
                                data-input="owner">
                                <i class="material-icons">done</i>
                            </button>

                        </span>
                    </div>

                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control domain" placeholder="Domain Website"
                                value="{{ isset($Q->domain) ? $Q->domain : '' }}">
                        </div>
                        <span class="input-group-addon">
                            <button class="btn bg-teal btn-circle waves-effect waves-circle waves-float sv"
                                data-input="domain">
                                <i class="material-icons">done</i>
                            </button>

                        </span>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control super_admin" placeholder="Email Admin Utama"
                                value="{{ isset($Q->super_admin) ? $Q->super_admin : '' }}">
                        </div>
                        <span class="input-group-addon">
                            <button class="btn bg-teal btn-circle waves-effect waves-circle waves-float sv"
                                data-input="super_admin">
                                <i class="material-icons">done</i>
                            </button>

                        </span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="file" class="form-control logo" placeholder="Logo">
                        </div>
                        <span class="input-group-addon">
                            <button class="btn bg-teal btn-circle waves-effect waves-circle waves-float sv"
                                data-input="logo">
                                <i class="material-icons">done</i>
                            </button>
                        </span>
                    </div>
                    @if (!empty($Q->logo))
                    <div class="card">
                        <img src="{{ asset('images').'/'.$Q->logo }}" width="100%" height="100px" />
                    </div>
                   
                    @endif
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
                <script type="text/javascript">
                    $('.sv').click(function() {

                        const data_input = {

                            nama_web: "web_name",
                            owner: "owner",
                            domain: "domain",
                            super_admin: "super_admin",
                            logo: "logo"

                        };

                        let getInputClass = data_input[$(this).data('input')];

                        if (getInputClass == 'logo') {


                            let file_data = $("." + getInputClass).prop('files')[0];
                            let form_data = new FormData();
                            form_data.append('file', file_data);
                            form_data.append('_token', '{{ csrf_token() }}');
                            $("#loadPage").show();
                            $.ajax({
                                url: base_url + "/reqDataWebsite",
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function(response) {
                                    $("#loadPage").hide();
                                    if (response.status == '200') {
                                        swal({
                                            title: "Berhasil",
                                            text: "Data tlah disimpan",
                                            icon: "success",
                                            button: "Ok",
                                        });
                                    } else {
                                        swal({
                                            title: "Ma'af",
                                            text: "Data gagal disimpan",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                }
                            });


                        } else {

                            let getDataClass = $("." + getInputClass).val();

                            let resData = new Map([
                                // ['id',]
                                [getInputClass, getDataClass],
                                ['_token', '{{ csrf_token() }}']
                            ]);

                            let comvJson = Object.fromEntries(resData);
                            // console.log(comvJson);

                            $("#loadPage").show();
                            $.ajax({
                                type: "POST",
                                url: base_url + "/reqDataWebsite",
                                data: comvJson,
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
                                        });
                                    } else {
                                        swal({
                                            title: "Ma'af",
                                            text: "Data gagal dihapus",
                                            icon: "error",
                                            button: "Ok",
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


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
