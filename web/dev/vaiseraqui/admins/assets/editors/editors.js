$(function () {
    // Bootstrap
    $('#bootstrap-editor').wysihtml5();

    // Ckeditor standard
    $('textarea#ckeditor_standard').ckeditor({width: '98%', height: '150px', toolbar: [
            {name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']}, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.
            {name: 'basicstyles', items: ['Bold', 'Italic']}
        ]});
    $('textarea#ckeditor_full').ckeditor({width: '98%', height: '150px'});
});

// Tiny MCE
tinymce.init({
    selector: ".tinymce_basic",
    language: 'pt_BR',
    relative_urls: false,
    remove_script_host: false,
    height: "300",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});

// Tiny MCE
tinymce.init({
  selector: ".tinymce_full",
     images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', PATHSITE+'utils/upload');
    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
       alert('HTTP Error: ' + xhr.status);
        return;
      }
      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
         alert('Invalid JSON: ' + xhr.responseText);
        return;
      }
      success(json.location);
    };
    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
    xhr.send(formData);
  },
  language: 'pt_BR',
 relative_urls: false,
 remove_script_host: false,
  convert_urls : true,
  height: "300",

  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor"
  ],
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "print preview media | forecolor backcolor emoticons",
  image_advtab: true,
  templates: [
    {title: 'Test template 1', content: 'Test 1'},
    {title: 'Test template 2', content: 'Test 2'}
  ]
});

$(window).ready(function () {
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
    $('.telefone').mask(SPMaskBehavior, spOptions);
    $('.money').mask('#.##0,00', {reverse: true});
    $('.money2').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: true});
    $('.cpf').mask('999.999.999-99');
    $('.cep').mask('99999-999');
    $('.data').mask('99/99/9999');
  $(".time").mask("99:99");
    $('.dia').mask('90');
    $('.telefone-fixo').mask('(99) 9999-9999');
    $('.ano').mask('9999');
    $('.quantidade').mask('9999999999');
});

function isValidDate(s) {

    if (s.length !== 10) {
        return false;
    }

    var bits = s.split('/');
    var d = new Date(bits[2] + '/' + bits[1] + '/' + bits[0]);
    return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));
}