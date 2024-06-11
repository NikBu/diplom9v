import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver/theme';
import 'tinymce/plugins/paste';
import 'tinymce/icons/default';

document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'lists link image media table', // Add plugins for lists, links, images, media, and tables
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table', // Add toolbar buttons for the added plugins
        menubar: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Image', value: 'img-fluid' }
        ],
        content_style: 'img {max-width: 100%; height: auto;}'
    });
});