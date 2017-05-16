$(document).ready(function(){
    $("#set_thumbsup").click(function(){
        // var id = "id="+$("#set_thumbsup;").val();
        var pol_id = "pol_id="+$("#set_thumbsup").val();

        $.ajax ({
            type:"POST",
            url:"./like.php",
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
