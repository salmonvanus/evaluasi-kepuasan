/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Editor Js
 */

$(document).ready(function() {
    if ($("#elm1").length > 0) {
        tinymce.init({
            selector: "textarea#elm1",
            theme: "modern",
            height: 130,
            // plugins: [
            //     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //     "save table contextmenu directionality emoticons template paste textcolor"
            // ],
            toolbar: "undo redo  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons",
            style_formats: [
                { title: 'Bold text', inline: 'b' },
                { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
                { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
                { title: 'Example 1', inline: 'span', classes: 'example1' },
                { title: 'Example 2', inline: 'span', classes: 'example2' },
                { title: 'Table styles' },
                { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
            ]
        });
    }
});

$(document).ready(function() {
    if ($("#elm2").length > 0) {
        tinymce.init({
            selector: "textarea#elm2",
            theme: "modern",
            paste_as_text: true,
            height: 130,
            // plugins: [
            //     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //     "save table contextmenu directionality emoticons template paste textcolor"
            // ],
            toolbar: "undo redo  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons",
            style_formats: [
                { title: 'Bold text', inline: 'b' },
                { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
                { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
                { title: 'Example 1', inline: 'span', classes: 'example1' },
                { title: 'Example 2', inline: 'span', classes: 'example2' },
                { title: 'Table styles' },
                { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
            ]
        });
    }
});