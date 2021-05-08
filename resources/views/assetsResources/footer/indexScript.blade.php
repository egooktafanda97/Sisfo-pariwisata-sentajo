    <!-- Jquery Core Js -->
    <script src="{{ asset('Admin') }}/plugins/jquery/jquery.min.js"></script>
    {{-- <script src="/js/app.js"></script> --}}


    <script type="text/javascript" src="{{ asset('js/GlobalScript.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/node-waves/waves.js"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/GlobalScript.js') }}"></script>
    <!-- Ckeditor -->
    {{-- <script src="{{ asset('Admin') }}/plugins/ckeditor/ckeditor.js"></script> --}}
    <!-- TinyMCE -->
    <script src="{{ asset('Admin') }}/plugins/tinymce/tinymce.js"></script>


    <!-- Custom Js -->
    <script src="{{ asset('Admin') }}/js/admin.js"></script>
    <script type="text/javascript" src="{{ asset('js/costum.js') }}"></script>
    
    {{ isset($createScript)?$createScript:'' }}

    <!-- Demo Js -->
    <script src="{{ asset('Admin') }}/js/demo.js"></script>
