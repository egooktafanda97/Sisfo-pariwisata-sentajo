<div class="menu__" data-menu="profile" data-child="profile_kontak"></div>
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
        {{-- <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
        <link rel="stylesheet" href="{{asset('theme')}}/css/font-awesome.min.css">
        <style type="text/css">
            iframe{
                width: 100% !important;
            }
        </style>
        @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Form Kontak</h2>
        </x-slot>

        <x-slot name="Content">
            <div class="row">
               <form action="/insContact" method="post">
                @csrf
                <input type="hidden" name="id" value="{{!empty($Q->id)?$Q->id:''}}">
                <div class="col-md-12">
                    <label>Alamat Lengap</label>
                    <div class="input-group">
                        <div class="form-line">
                            <textarea class="form-control"name="alamat" placeholder="jl.">{{!empty($Q->alamat)?$Q->alamat:''}}</textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone fa-image-contact" aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="email" name="email" class="form-control" placeholder="email" value="{{!empty($Q->email)?$Q->email:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-image-contact" aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="text" name="hp" class="form-control" placeholder="nomor hp" value="{{!empty($Q->hp)?$Q->hp:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook fa-image-contact" aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="text" name="fb" class="form-control" placeholder="facebook" value="{{!empty($Q->fb)?$Q->fb:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-whatsapp fa-image-contact" aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="text" name="wa" class="form-control" placeholder="whatsapp" value="{{!empty($Q->wa)?$Q->wa:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-twitter fa-image-contact"aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="text" name="tw" class="form-control" placeholder="twitter" value="{{!empty($Q->tw)?$Q->tw:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram fa-image-contact" aria-hidden="true"></i></span>
                        <div class="form-line">
                            <input type="text" name="ig" class="form-control" placeholder="instagram" value="{{!empty($Q->ig)?$Q->ig:''}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Tambah Kan Embet Google Mpas | <apan >tutorial</apan></label>
                        <div class="form-line">
                            <textarea style="height: 100px" class="form-control" name="maps" placeholder='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1994.8282380330907!2d101.55107218653613!3d-0.5160730872818753!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2a4ddf67aefe27%3A0x94b0a1ff4a47dd1a!2sKAMPUS%20UNIKS!5e0!3m2!1sid!2sid!4v1613889026656!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'>{!! !empty($Q->maps)?$Q->maps:'' !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-primary waves-effect" width="100px" value="Simpan">
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                {!! !empty($Q->maps)?$Q->maps:'' !!}
            </div>
        </div>
        {{-- <div class="flex items-center mt-5">
            <x-jet-button>

            </x-jet-button>

            <x-jet-action-message class="ml-3" on="loggedOut">
                {{ __('Done.') }}
            </x-jet-action-message>
        </div> --}}
        <button  wire:click="confirmLogout" wire:loading.attr="disabled">ok</button>
        {{-- modal --}}
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Cara Mengambil Embet Google maps</h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- ==== --}}
    </x-slot>
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
    @if (!empty(session()->get('status')) && session()->get('status') == true)
    <script type="text/javascript">
        swal({
            title: "Berhasil",
            text: "Data tlah disimpan",
            icon: "success",
            button: "Ok",
        });

    </script>
    @elseif(!empty(session()->get('status')) && session()->get('status') == false)
    <script>
        swal({
            title: "Berhasil",
            text: "Data tlah disimpan",
            icon: "error",
            button: "Ok",
        });

    </script>
    @endif

    @endslot
    @endcomponent
</x-slot>

</x-app-layout>
