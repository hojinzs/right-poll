$(document).ready(function(){
    disable_group_btn('#group_email');
});


function disable_group_btn(element){
    $(element+' > input').prop('disabled', true);
    $(element).addClass('green');
};
