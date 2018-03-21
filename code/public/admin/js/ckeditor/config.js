/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
  // Define changes to default configuration here. For example:
  // config.language = 'fr';
  // config.uiColor = '#AADC6E';
    config.toolbar_Full = 
    [ 
        { name: 'document',    items : [ 'Source','-','Print' ] }, 
        { name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] }, 
        { name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] }, 
        '/', 
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] }, 
        { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] }, 
        { name: 'links',       items : [ 'Link','Unlink','Anchor' ] }, 
        { name: 'insert',      items : [ 'Image','Flash','Table','PageBreak' ] }, 
        { name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] }, 
        { name: 'colors',      items : [ 'TextColor','BGColor' ] }, 
        { name: 'code',        items : [ 'Code'] } 
    ];  
  // config.skin='office2003';
   config.filebrowserBrowseUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'http://chungthehao.tk/public/admin/js/ckeditor/kcfinder/upload.php?type=flash';
};
