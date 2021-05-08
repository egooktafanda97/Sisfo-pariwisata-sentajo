$(function () {
    //CKEditor
    // CKEDITOR.replace('ckeditor');
    // CKEDITOR.config.height = 300;
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 400,
        paste_data_images: true,
        setup: function (ed) {
            ed.on('init', function (ed) {
                ed.target.editorCommands.execCommand("fontName", false, "Calibri");
                ed.target.editorCommands.execCommand("fontSize", false, "12pt");
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        callback(e.target.result, {
                            alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                });
            }
        },
        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        }, {
            title: 'Test template 2',
            content: 'Test 2'
        }]
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = base_url + '/Admin/plugins/tinymce';


});
