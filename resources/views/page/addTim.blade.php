<div class="menu__" data-menu="profile" data-child="profile_tim"></div>
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
            .thumbnail{
                border:none !important; 
                background: transparent !important;
            }
            .img-responsive{
              border-radius: 100% !important;  
              width: 150px !important;  
              height: 150px  !important; 
              border:2px solid gray;
          }
          .img-responsive:hover{
            border:2px solid orange;
        }
        .img_add{
            opacity: 0.5;
        }
        .icon_delete{
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

    </style>
    @endslot
    @endcomponent
</x-slot>

<x-card>
    <x-slot name="cardTitle">
        <h2>Tambahkan Tim</h2>
    </x-slot>

    <x-slot name="Content">

       <div class="row">

        @foreach ($Q as $element)
        <div class="col-xs-6 col-md-3" style="border:none; background: transparent;">
           <span class="text-center icon_delete waves-effect" data-id="{{ $element->id }}"><i class="fa fa-trash"></i></span>
           <a class="thumbnail view edit" data-id="{{ $element->id }}" data-toggle="modal" data-target="#defaultModal"  data-id="{{ $element->id }}">
            <img src="{{ asset('/tim/'.$element->foto) }}" class="img-responsive">
        </a>
    </div>
    @endforeach

    <div class="col-xs-6 col-md-3" style="border:none; background: transparent;">
        <a href="javascript:void(0);" class="thumbnail add" data-toggle="modal" data-target="#defaultModal">
            <img src="{{ asset('Admin/images/plus.png') }}" class="img-responsive img_add">
        </a>
    </div>

</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Imput Tim</h4>
            </div>
            <form action="{{ url('/inpTim') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-image-contact" aria-hidden="true"></i><span style="color: red">*</span></span>
                    <div class="form-line">
                        <input required type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-facebook fa-image-contact" aria-hidden="true"></i></span>
                    <div class="form-line">
                        <input type="text" name="fb" class="form-control" placeholder="facebook">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-whatsapp fa-image-contact" aria-hidden="true"></i></span>
                    <div class="form-line">
                        <input type="text" name="wa" class="form-control" placeholder="whatsapp">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-twitter fa-image-contact"aria-hidden="true"></i></span>
                    <div class="form-line">
                        <input type="text" name="tw" class="form-control" placeholder="twitter">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-instagram fa-image-contact" aria-hidden="true"></i></span>
                    <div class="form-line">
                        <input type="text" name="ig" class="form-control" placeholder="instagram">
                    </div>
                </div>
                <label>Tanggal Bergabung</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-image-contact" aria-hidden="true"></i><span style="color: red">*</span></span>
                    <div class="form-line">
                        <input required type="date" name="bergabung" class="form-control">
                    </div>
                </div>
                <label>Foto</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-upload fa-image-contact" aria-hidden="true"></i><span style="color: red">*</span></span>
                    <div class="form-line">
                        <input type="file" name="foto" class="form-control" placeholder="instagram">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    <input type="submit" class="btn btn-primary waves-effect" value="SIMPAN">
                </div>
            </form>
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

    <script type="text/javascript">
        $('.view').click(function(){
            console.log($(this).data('id'));
        });

        $(".edit1").click(function(){
            const id = $(this).data('id');
            const data = {
                _token : '{{ csrf_token() }}',
                id : id
            }  
            const url = base_url+'/getDataTentang'; 
            fuc_ajax(response,url,data);
            function response($rr){
                $("#title").val($rr.judul);
                $("#title").click();
                myEditor.data.set($rr.keterangan);
                $(".save_").val('Edit');
                $(".save_").removeClass('btn-primary');
                $(".save_").addClass('btn-success');
                $("#id__").val($rr.id);
            }
        });       
        $(".edit").click(function(){
            const id = $(this).data('id');
            const data = {
                _token : '{{ csrf_token() }}',
                id : id
            }  
            const url = base_url+'/getDataTim'; 
            fuc_ajax(response,url,data);
            function response($rr){
                console.log($rr);
                $('[name="id"]').val($rr.id);
                $('[name="nama"]').val($rr.nama);
                $('[name="fb"]').val($rr.fb);
                $('[name="wa"]').val($rr.wa);
                $('[name="tw"]').val($rr.tw);
                $('[name="ig"]').val($rr.ig);
                $('[name="bergabung"]').val($rr.bergabung);

            }
        });      
        $('.add').click(function(){
            $('[name="id"]').val("");
            $('[name="nama"]').val("");
            $('[name="fb"]').val("");
            $('[name="wa"]').val("");
            $('[name="tw"]').val("");
            $('[name="ig"]').val("");
            $('[name="bergabung"]').val("");
        });
        $(".icon_delete").click(function(){
             const data = {
                _token : '{{ csrf_token() }}',
                id : $(this).data('id')
            } 

            hapus('/deleteTim',data);
        });
    </script>

    @endslot
    @endcomponent
</x-slot>

</x-app-layout>
