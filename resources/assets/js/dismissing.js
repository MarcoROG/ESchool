/**
 * Created by marcobellan on 22/02/15.
 */
$(document).ready(function(){
    if($('.modal').length!=0) {
        $('.modal').openModal();
    }
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 50});
});
$('.dismisser').click(function(){
    $(this).closest("div.dismissable").hide("slow");
});
$('.modal-dismisser').click(function(){
    $('.modal').closeModal();
});
$('.datepicker').click(function(){
    $('.datepicker').pickdate();
});