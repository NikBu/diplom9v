<script src="https://cdn.tiny.cloud/1/niwu6quqy7bb7e7xvpbdwbo9upcppuah18mbhtro1k2z4sim/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        language: 'ru', 
        plugins: 'lists link image media table', // Add plugins for lists, links, images, media, and tables
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table',     
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        menubar: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Image', value: 'img-fluid' }
        ],
        content_style: 'img.img-fluid { float: right; margin: 10px; max-width: 100%; height: auto; }'
    });
</script>