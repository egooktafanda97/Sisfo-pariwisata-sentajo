<div class="menu__" data-menu="profile" data-child="profile_tentang"></div>
<input type="hidden" id="id__" value="">
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
        <style>
            .ck-editor__editable {
                min-height: 200px !important;
                width: 100% !important;
            }

        </style>
        @endslot
        @endcomponent
    </x-slot>

    <x-card>
        <x-slot name="cardTitle">
            <h2>Produk Anda</h2>
        </x-slot>

        <x-slot name="Content">


            <div class="card">
                <div class="card-header"></div>
                <div class="card-body" style="padding: 10px">
                    <div class="row">
                        <div class="col-sm-12" style="margin: 0; padding: 0; margin-left: 20px">
                            <h4>Keterangan Profile</h4>
                        </div>
                        <br>
                        <div class="col-md-7 line-rigt">
                            <div class="form-group form-float" style="margin-bottom: 0">
                               <label
                               style="color: #000; background: #fff;">Judul</label> 
                               <div class="form-line">

                                <input required type="text" class="form-control" name="title" id="title" value=""
                                style="border:1px solid gray; border-radius: 10px; padding-left: 10px;">

                            </div>
                        </div>
                        <br>
                        <label
                        style="color: #000; background: #fff;">Keterangan</label> 
                        <div id="editor"></div>
                        <br>
                        <div class="w-100 text-right">
                            <a href="{{ url('/addItemProfile') }}" type="submit" class="btn btn-warning btn-sm waves-effect" style="width: 100px">Batal</a>
                            <input type="submit" class="btn btn-primary btn-sm waves-effect save_" name="sv"
                            value="Simapan" style="width: 100px">
                        </div>
                    </div>
                    <div class="col-md-5">
                        @foreach ($Q as $element)

                        <div class="bootcards-list col-sm-12">
                            <div class="panel panel-default">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-12 a_">
                                                <h4 class="list-group-item-heading">
                                                    {{ $element->judul }}
                                                </h4>
                                                <div class="line-hr"></div>
                                                {!! potong_karakter($element->keterangan,0, 100) !!}
                                                <div class="line-hr"></div>
                                            </div>

                                            {{-- =================================== --}}
                                            <div class="col-sm-12 text-right a__">
                                                <p class="list-group-item-text">
                                                    <a href="{{ url('/preview_produk/') }}"
                                                    class="btn bg-primary btn-xs waves-effect edit btn-circle-cos">
                                                    <i class="material-icons f-15">content_paste</i>
                                                </a>
                                                <span
                                                class="btn bg-teal btn-xs waves-effect edit1 btn-circle-cos" data-id="{{$element->id}}">
                                                <i class="material-icons f-15">create</i>
                                            </span>
                                            <span data-id="{{ $element->id }}"
                                                class="btn bg-red btn-xs waves-effect hapus btn-circle-cos">
                                                <i class="material-icons f-15">delete_forever</i>
                                            </span>
                                        </p>
                                    </div>
                                    {{-- ==================================== --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>


{{-- ====================================================== --}}
<div class="card">
    <div class="card-header"></div>
    <div class="card-body" style="padding: 10px">
        <div class="row">
            <div class="col-md-6 line-left">
                <h4>VISI</h4>
                <div id="editor1">{!! !empty($Q2->visi)?$Q2->visi:'' !!}</div>
                <br>
                <div class="w-100 text-right">
                    <input type="submit" class="btn btn-primary btn-sm waves-effect visi"
                    value="Simapan">

                </div>

            </div>
            <div class="col-md-6 line-left">
                <h4>MISI</h4>
                <div id="editor2">{!! !empty($Q2->misi)?$Q2->misi:'' !!}</div>
                <br>
                <div class="w-100 text-right">
                    <input type="submit" class="btn btn-primary btn-sm waves-effect misi"
                    value="Simapan">
                </div>

            </div>
        </div>
    </div>
    {{-- ======================================================== --}}

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body" style="padding: 10px">
            <div class="row">
                <div class="col-sm-12">
                    <h4>
                        Gambar Profile Koperasi
                    </h4>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        @php
                            $im = !empty($Q2->image)?$Q2->image:'';
                        @endphp
                        <div class="avatar-preview">
                            <div id="imagePreview"
                            style="background-image: url('{{ asset('profile/'.$im) }}');">
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('plugin/ckeditor5-build-classic') }}/ckeditor.js"></script>
    <script>
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

        var myEditor1;

        ClassicEditor
        .create(document.querySelector('#editor1'))
        .then(editor => {
            window.editor = editor;
            myEditor1 = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });

        var myEditor2;

        ClassicEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {
            window.editor = editor;
            myEditor2 = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
                    // =========================================================


                    $('.save_').click(function() {
                        if ($("#title").val() == '' || myEditor.getData() == '') {
                            swal({
                                title: "Ma'af",
                                text: "Judul dan keterangan tidak boleh kosong..!",
                                icon: "error",
                                button: "Ok",
                            });
                        } else {
                            let form_data = new FormData();
                            form_data.append('_token', '{{ csrf_token() }}');
                            form_data.append('id', $("#id__").val());
                            form_data.append('judul', $("#title").val());
                            form_data.append('keterangan', myEditor.getData());

                            ajax_save_up(base_url + '/proses_data_tentang', form_data);


                        }

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

                    $(".hapus").click(function(){
                        const url = base_url+'/hapusTentang';
                        let data = {
                            _token : '{{ csrf_token() }}',
                            id : $(this).data('id')
                        } 
                        // console.log(data);
                        hapus(url,data);
                    })

                    $(".visi").click(function(){
                      let form_data = new FormData();
                      form_data.append('_token', '{{ csrf_token() }}');
                      form_data.append('visi', myEditor1.getData());

                      ajax_save_up(base_url + '/visi_misi', form_data);
                  });
                    $(".misi").click(function(){
                      let form_data = new FormData();
                      form_data.append('_token', '{{ csrf_token() }}');
                      form_data.append('misi', myEditor2.getData());

                      ajax_save_up(base_url + '/visi_misi', form_data);
                  });

                    $("#imageUpload").change(function(){

                     let form_data = new FormData();
                     form_data.append('_token', '{{ csrf_token() }}');
                     form_data.append('images', $(this).prop('files')[0]);

                     ajax_save_up(base_url + '/profile_image', form_data);

                 });


             </script>

             @endslot
             @endcomponent
         </x-slot>

     </x-app-layout>
