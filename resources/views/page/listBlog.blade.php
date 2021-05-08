<div class="menu__" data-menu="blog" data-child="blog"></div>
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
            <a href="/entryBlog" class="btn btn-primary"><i class="material-icons">add_circle</i> Entry</a>
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <div class="col-sm-12" style="margin-left: 10px">
                    <a href="#" class="form-group demo-tagsinput-area cmb-50">
                        <div class="bootstrap-tagsinput">
                            <span class="tag label label-warning waves-effect ">
                                <span data-role="remove">
                                </span>
                                All
                            </span>
                        </div>
                    </a>
                    @foreach ($kategori as $key => $item)
                        <a href="#" class="form-group demo-tagsinput-area cmb-50">
                            <div class="bootstrap-tagsinput">
                                <span class="tag label label-info waves-effect ">
                                    <span data-role="remove">
                                    </span>
                                    {{ $key }}
                                </span>
                            </div>
                        </a>
                    @endforeach


                </div>
                <div class="col-md-12">
                    @foreach ($Q as $item)
                        <div class="bootcards-list col-sm-12">
                            <div class="panel panel-default">

                                <div class="list-group">
                                    <div class="list-group-item" href="#apple">
                                        <div class="row">
                                            <div class="col-sm-2" style="margin-bottom: 0">
                                                <img src="{{ asset('thm_berita/' . $item->thumbnail) }}" width="100%"
                                                    style="max-height: 250px">
                                            </div>
                                            <div class="col-sm-7 a_">
                                                <h4 class="list-group-item-heading">{{ $item->title }}</h4>
                                                <p class="list-group-item-text">

                                                    @php
                                                        if ($item->status == '0') {
                                                            echo '<strong class="text-warning">Private |</strong>';
                                                        } else {
                                                            echo '<strong class="text-success">Publik |</strong>';
                                                        }
                                                    @endphp

                                                    {{ $item->created_at }}
                                                </p>
                                                <p>
                                                <div class="form-group demo-tagsinput-area "
                                                    style="margin-bottom: 0 !important;">
                                                    <div class="bootstrap-tagsinput">
                                                        <span class="tag label label-info waves-effect ">
                                                            <span data-role="remove">
                                                            </span>
                                                            {{ $item->category }}
                                                        </span>
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-sm-3 text-right actionCard">
                                                <p class="list-group-item-text">
                                                    <span
                                                        class="btn bg-green btn-xs waves-effect edit iconCardAction  cloundEffect"
                                                        data-status="{{ $item->status }}"
                                                        data-id="{{ $item->id }}">
                                                        @if ($item->status == 0)
                                                            <i class="material-icons f-15">cloud_off</i>
                                                        @else
                                                            <i class="material-icons f-15">cloud_done</i>
                                                        @endif
                                                    </span>
                                                    <a href="{{ url('/getBlog/' . $item->id) }}"
                                                        class="btn bg-primary btn-xs waves-effect edit iconCardAction">
                                                        <i class="material-icons f-15">content_paste</i>
                                                    </a>
                                                    <a href="{{ url('/entryBlog/' . $item->id) }}"
                                                        class="btn bg-teal btn-xs waves-effect edit iconCardAction">
                                                        <i class="material-icons f-15">create</i>
                                                    </a>
                                                    <a data-id="{{ $item->id }}"
                                                        class="btn bg-red btn-xs waves-effect hapus iconCardAction">
                                                        <i class="material-icons f-15">delete_forever</i>
                                                    </a>
                                                </p>
                                                <hr class="hr_line_">
                                                <a href="/admcomets/blog/{{ $item->id }}" class="btn"
                                                    style="padding: 0; margin: 0; box-shadow: none; background: transparent">
                                                    <i class="material-icons"
                                                        style="font-size: 19px; margin-top: 10px;">comment</i> <span
                                                        class="badge badge-light"
                                                        style="background: transparent; color: #000">{{ \App\Models\commentBlog::where(['post_id' => $item->id, 'status' => '1'])->get()->count() }}</span>
                                                </a>
                                                <span class="btn span_btn1">
                                                    <i class="material-icons f-19 cmt-10">visibility</i> <span
                                                        class="badge badge-light commentss">
                                                        {{ $item->viwer }}
                                                    </span>
                                                </span>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                                        url: base_url + "/deleteBlog",
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

                    $(".cloundEffect").click(function() {
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
                                text: $(this).data('status') == '0' ? "Anda yakin akan pubik artikel?" :
                                    "Anda yakin akan private artikel?",
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
                                        url: base_url + "/visibility",
                                        data: {
                                            id: $(this).data('id'),
                                            status: $(this).data('status'),
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
