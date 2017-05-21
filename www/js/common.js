$(document).ready(function(){

    $("#set_thumbsup").click(function(){
        // var id = "id="+$("#set_thumbsup;").val();
        var pol_id = "pol_id="+$("#set_thumbsup").val();

        $.ajax ({
            type:"POST",
            url:"./pst/like.php",
            data:pol_id,
            success:function(data){
                alert (data);
                location.reload(true);
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);}
        })

    })
})

$(document).ready(function(){
    $("#summit_comment").click(function(){
        var queryString = $('#comment_form').serialize();

        alert(queryString);

        $.ajax({
            type : 'POST',
            url : './pst/comment.php',
            data: queryString,
            success : function(data){
                alert(data);
                location.reload(true);
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            },
        })
    })
})

$.fn.addComment_click = function(comment_id){
    var queryString = $('#add_comment_form_'+comment_id).serialize();

    alert(queryString);
    alert(comment_id);

    $.ajax({
        type : 'POST',
        url : './pst/comment.php',
        data: queryString,
        success : function(data){
            alert(data);
            location.reload(true);
        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        },
    })
};
