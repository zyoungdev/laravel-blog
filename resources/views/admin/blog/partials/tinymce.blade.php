<script src="/res/lib/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#body',
    valid_elements: "+*[*]",
    image_advtab: true,
    plugins: [
      'advlist autolink lists link image charmap codesample hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | anchor link image | code | codesample | fullscreen',
    toolbar2: 'media | forecolor backcolor emoticons',
    content_css: '/res/css/main.css',
    content_style: "body {max-width: 75%;left: 50%; transform: translate(-50%,0%); \
    display: flex; box-style: border-box; align-items: initial !important; padding: 20px !important;} \
    pre {font-family: monospace; padding: 10px; background-color: #ddd;}",
    textpattern_patterns: [
       {start: '*', end: '*', format: 'italic'},
       {start: '**', end: '**', format: 'bold'},
       {start: '#', format: 'h1'},
       {start: '##', format: 'h2'},
       {start: '###', format: 'h3'},
       {start: '####', format: 'h4'},
       {start: '#####', format: 'h5'},
       {start: '######', format: 'h6'},
       {start: '1. ', cmd: 'InsertOrderedList'},
       {start: '* ', cmd: 'InsertUnorderedList'},
       {start: '- ', cmd: 'InsertUnorderedList'}
      ],
  });
</script>
