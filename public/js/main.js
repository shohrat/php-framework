$(document).ready(function(){

$('#submit_btn').click(function(e){
e.preventDefault();

    let add_text = $('iframe.cke_wysiwyg_frame').contents().find('.cke_editable').html();
    let title = $('#send_title').val();
    let user_id = $('#send_user_id').val();
    let form_url = $(this).closest('form').attr('action');

$.post(
    form_url,
    {
      title: title,
      user_id: user_id,
      body: add_text
    },
    onAjaxSuccess
  );
    
});

function onAjaxSuccess(data)
{
// Здесь мы получаем данные, отправленные сервером и выводим их на экран.
//alert(data);
window.location.href = '/';
}

});