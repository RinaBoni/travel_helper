import jqueryMultifile from "https://cdn.skypack.dev/jquery-multifile@2.2.2";

$('input.file_upload_items').MultiFile({
        max: 6,
        accept: 'jpeg|jpg|png,svg',
        STRING: {
            remove: '',
            denied:'Выбранный тип файла (.$ext) не доступен для загрузки! Выберите .jpeg, .jpg .png или .svg', 
            duplicate:'Этот файл уже прикреплён:\n$file!'
        }
    });

$('.upload_files_button').click(function(){
  $('input[id^=MultiFile1]').last().click(); 
});