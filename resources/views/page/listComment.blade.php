{{-- <div class="menu__" data-menu="berita" data-child="berita_child"></div> --}}
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
            Komentar {{ $title }}
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <div class="col-md-12">


                    @foreach ($coment as $item)
                        <div class="card">
                            <div class="body">
                                <div class="header-coment">
                                    <h5>{{ $item->nama }}</h5>
                                    <small>{{ $item->created_at }}</small><br>
                                    <small>{{ $item->email }}</small>
                                    <span class="btn bg-green btn-xs waves-effect edit cloundEffect float-right"
                                        data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                        style="width: 30px; height: 30px; padding: 5px; border-radius:50%; position: relative; margin-top: -40px">
                                        {{-- @if ($item->status == 0) --}}
                                        <i class="material-icons f-15">cloud_off</i>
                                        {{-- @else
                                        <i class="material-icons f-15">cloud_done</i>
                                    @endif --}}
                                    </span>
                                </div>
                                <hr style="margin-top:5px; margin-bottom: 5px">
                                <div class="isi-coment">
                                    <p>
                                        {{ $item->isi }}
                                    </p>
                                </div>
                                @foreach ($class::where(['post_Id' => $id, 'sub_comment' => $item->id])->get() as $it)
                                    <div class="sub-commet ml-10">
                                        <h5>{{ $it->nama }}</h5>
                                        <small>{{ $it->created_at }}</small><br>
                                        <small>{{ $it->email }}</small>
                                        <span class="btn bg-green btn-xs waves-effect edit cloundEffect float-right"
                                            data-id="{{ $it->id }}" data-status="{{ $it->status }}"
                                            style="width: 30px; height: 30px; padding: 5px; border-radius:50%; position: relative; margin-top: -40px">
                                            {{-- @if ($item->status == 0) --}}
                                            <i class="material-icons f-15">cloud_off</i>
                                            {{-- @else
                                        <i class="material-icons f-15">cloud_done</i>
                                    @endif --}}
                                        </span>

                                        <hr style="margin-top:5px; margin-bottom: 5px">
                                        <div class="isi-coment">
                                            <p>
                                                {{ $it->isi }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

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
                                        url: base_url + "/deleteBerita",
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
                                                        text: "Data tlah disimpan",
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
                                                        text: "Data gagal disimpan",
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
                    });

                    $('.cloundEffect').mouseenter(
                        function() {
                            if ($(this).data('status') == '0') {
                                console.log($(this).data('status'));
                                $(this).html('<i class="material-icons f-15">cloud_done</i>');
                                $(this).removeClass('bg-orange');
                                $(this).addClass('bg-green');
                            } else {
                                $(this).html('<i class="material-icons f-15">cloud_off</i>');
                                $(this).removeClass('bg-green');
                                $(this).addClass('bg-orange');
                            }
                        });

                    $('.cloundEffect').mouseleave(function() {
                        if ($(this).data('status') == '0') {
                            console.log($(this).data('status'));
                            $(this).html('<i class="material-icons f-15">cloud_off</i>');
                            $(this).removeClass('bg-green');
                            $(this).addClass('bg-orange');
                        } else {
                            $(this).html('<i class="material-icons f-15">cloud_done</i>');
                            $(this).removeClass('bg-orange');
                            $(this).addClass('bg-green');
                        }
                    }).mouseleave();


                    $(".cloundEffect").click(function() {
                        const id = $(this).data('id');
                        const status = $(this).data('status');
                        if ($(this).data('status') == '0') {
                            $(this).html('<i class="material-icons f-15">cloud_done</i>');
                            $(this).removeClass('bg-orange');
                            $(this).addClass('bg-green');
                        } else {
                            $(this).html('<i class="material-icons f-15">cloud_off</i>');
                            $(this).removeClass('bg-green');
                            $(this).addClass('bg-orange');
                        }
                        swal({
                                title: "yakin..!!!",
                                text: $(this).data('status') == '0' ? "Buka blokiran Koment..?" :
                                    "Blokir koment..?",
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
                                        url: base_url + "/comntVisible",
                                        data: {
                                            content: '{{ $title }}',
                                            id: id,
                                            status: status,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        dataType: "json",
                                        success: function(response) {
                                            $("#loadPage").hide();
                                            console.log(response);
                                            if (response.status == '200') {
                                                swal({
                                                        title: "Berhasil",
                                                        text: "visibility tlah berhasil diubah",
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
                                                        text: "visibility tlah gagal diubah",
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
                                } else {
                                    if ($(this).data('status') == '0') {
                                        console.log($(this).data('status'));
                                        $(this).html('<i class="material-icons f-15">cloud_off</i>');
                                        $(this).removeClass('bg-green');
                                        $(this).addClass('bg-orange');
                                    } else {
                                        $(this).html('<i class="material-icons f-15">cloud_done</i>');
                                        $(this).removeClass('bg-orange');
                                        $(this).addClass('bg-green');
                                    }
                                }
                            });
                    })

                </script>

            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
