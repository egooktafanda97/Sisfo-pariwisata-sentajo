<div class="menu__" data-menu="wisata_dan_budaya" data-child="wisata"></div>
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
            .block__title {
                display: block;
                position: relative;
                width: 100%;
                padding-bottom: 0px;
                padding-left: 10%;
                color: #000;
                font-size: 20px;
                font-weight: 600;
            }

            .block__title:before {
                content: "";
                display: block;
                position: absolute;
                height: 2px;
                width: 50%;
                bottom: -10px;
                left: 10%;
                background-color: #db2777;
            }

            .block__title:after {
                content: "";
                display: block;
                position: absolute;
                height: 12px;
                width: 12px;
                bottom: -16px;
                left: 8%;
                border-radius: 50%;
                background-color: orange;
                border: 2px solid orange;
            }

            .list-detail {
                margin-top: 40px;
                margin-left: 30px;
            }

            .list-detail li {
                margin: 10 0 10 0;
            }

            .list-detail li span {
                font-size: 12px;
                color: #000;
                font-weight: 400;
                width: 120px;
                display: inline-block;
            }

        </style>
        @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Detail Cagar Budaya</h2>
        </x-slot>

        <x-slot name="Content">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <a href="{{ asset(!empty($Q) ? 'Images_assets/cagar_budaya/' . $Q->gambar : 'images/default.jpg') }}">
                            <div class="body">
                                <img src="{{ asset(!empty($Q) ? 'Images_assets/cagar_budaya/' . $Q->gambar : 'images/default.jpg') }}"
                                style="width: 100%">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3><span class="block__title">{{ !empty($Q) ? $Q->nama_situs : '' }}</span></h3>
                    <ul class="list-detail">
                        <li><span>
                            <stong>Alamat</stong>
                        </span>: {{ !empty($Q) ? $Q->alamat : '' }}</li>
                        <li><span>
                            <stong>Kecamatan</stong>
                        </span>:
                        {{ !empty($Q) ? \App\Models\Kecamatan::whereidKec($Q->kecamatan)->first()['nama'] : '' }}
                    </li>
                    <li><span>
                        <stong>Perkiraan Tahun</stong>
                    </span>:
                    {{ !empty($Q->perkiraan_tahun) ? $Q->perkiraan_tahun : '-' }}
                </li>
            </ul>
        </div>
        <div class="col-md-12" {{ empty($Q->sejarah_singkat)?'hidden':'' }}>
            <div class="card">
                <div class="body">
                    <h3>Sejarah Singkat</h3>
                    <div
                    style="border-left: 2px solid orange; border-top-left-radius: 20px; border-bottom-left-radius: 20px; padding: 20px 0 20px 0; padding-left: 20px">
                    {!! $Q->sejarah_singkat !!}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12" {{ empty($Q->keterangan)?'hidden':'' }}>
            <div class="card">
                <div class="body">
                    <h3>Keterangan</h3>
                    <div
                    style="border-left: 2px solid orange; border-top-left-radius: 20px; border-bottom-left-radius: 20px; padding: 20px 0 20px 0; padding-left: 20px">
                    {!! $Q->keterangan !!}</div>
                </div>
            </div>
        </div>
        <div class="col-md-12" {{ empty($Q->Deskripsi)?'hidden':'' }}>
            <div class="card">
                <div class="body">
                    <h3>Deskripsi</h3>
                    <div
                    style="border-left: 2px solid orange; border-top-left-radius: 20px; border-bottom-left-radius: 20px; padding: 20px 0 20px 0; padding-left: 20px">
                    {!! $Q->Deskripsi !!}</div>
                </div>
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

    @endslot
    @endcomponent
</x-slot>

</x-app-layout>
