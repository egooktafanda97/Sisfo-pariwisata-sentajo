/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	// config.language = 'fr';
// 	// config.uiColor = '#AADC6E';
// };

CKEDITOR.editorConfig = function (config) {
    config.filebrowserBrowseUrl      = 'plugin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'plugin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = 'plugin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl      = 'plugin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'plugin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = 'plugin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};
