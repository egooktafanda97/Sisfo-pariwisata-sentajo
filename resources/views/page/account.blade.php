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
            <h2>Management Akun Admin</h2>
        </x-slot>

        <x-slot name="Content">


            <div class="row">
                <form action="{{ url('addAdmin') }}" method="POST">
                    @csrf
                    <div class="col-md-6 line-border-right">
                        <div class="input-group">
                            <div class="form-line">
                                <input required type="text" class="form-control nama" placeholder="Nama" name="name">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input required type="email" class="form-control email" placeholder="Email"
                                    name="email">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input required type="password" class="form-control password" placeholder="Password"
                                    name="password">
                            </div>
                        </div>
                        <br>
                        <div class="text-right">
                            <input type="submit" value="SAVE" class="btn bg-blue waves-effect" />
                        </div>
                        <br>
                    </div>
                </form>
                <div class="col-md-6">
                    <table id="mainTable" class="table table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Q as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td style="width: 200px">
                                        <button type="button"
                                            class="btn bg-green btn-circle waves-effect waves-circle waves-float edit"
                                            data-name="{{ $item->name }}" data-email="{{ $item->email }}">
                                            <i class="material-icons">create</i>
                                        </button>
                                        <button type="button"
                                            class="btn bg-red btn-circle waves-effect waves-circle waves-float hapus"
                                            data-id="{{ $item->id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    $(".edit").click(function() {
                        $(".nama").val($(this).data('name'));
                        $(".email").val($(this).data('email'));
                        $(".password").val("1234");
                    });

                </script>
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
                                        url: base_url + "/deleteAccount",
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



                    })

                </script>

            @endslot
        @endcomponent
    </x-slot>

</x-app-layout>
