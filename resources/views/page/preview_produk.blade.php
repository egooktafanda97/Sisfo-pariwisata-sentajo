<div class="menu__" data-menu="produk" data-child="produk_show_"></div>
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
            <h2><strong>Preview Produk {{ $Q->nama_produk }}</strong></h2>
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('produk/' . $Q->images) }}" width="100%" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>
                        {{ $Q->keterangan }}
                    </p>
                    <br>
                    <table>
                        <tr>
                            <td width="40%" style="padding: 5px">
                                Kategori
                            </td>
                            <td>
                                {{ $Q->kategori }}
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="padding: 5px">
                                Web Info
                            </td>
                            <td>
                                <a href="{{ $Q->web_info }}">
                                    {{ $Q->web_info }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" style="padding: 5px">
                                Tanggal Upload
                            </td>
                            <td>
                                {{ $Q->updated_at }}
                            </td>
                        </tr>


                        </tr>
                    </table>
                </div>
                <br>
                <div class="col-md-12">

                    {!! $Q->deskripsi !!}

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
            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
