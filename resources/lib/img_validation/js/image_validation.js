$(document).ready(function(){
  const input = $('.image_preview input[type=file]');
  SMSemec.imageValidation(input);
  $.validator.addMethod('filesize', function(value, element, param) {
    var count = 0;
    for (var i = 0; i < element.files.length; i++) {
      count += element.files[i].size;
    }
    return this.optional(element) || (count <= param)
  }, 'O tamanho máximo é de 5MB ');

  $('#form').validate({
    rules: {
      image: {
        filesize: 5242880 
      },
      current_password:{
        required: false
      }
    },
  });
});

SMSemec.imageValidation = (el) => {
  const readURL = (input) => {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = (e) => {
        const erromsg = '<p class="erromsg">O tamanho máximo é de 5MB </p>';
        if(input.files[0].size > 5242880){
          $(".image_preview").css({"border-color":"red", "border-width":"3px"});
          $('p').after(erromsg);
        }
      };

      return  reader.readAsArrayBuffer(input.files[0]);
    }
  };

  return $(el).change(function preview() { readURL(this); });
};
