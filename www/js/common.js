$(document).ready(function(){

    // 시작시, 대댓글 영역 감춤

    $('.comment_add').hide();
    $('.add_comment').hide();

    // 좋아요 버튼 클릭시 좋아요 +1 POST 전송

    $("#set_thumbsup").click(function(){
        var pol_id = "pol_id="+$("#set_thumbsup").val();

        $.ajax ({
            type:"POST",
            url:"./pst/like.php",
            data:pol_id,
            success:function(data){
                // alert (data);
                location.reload(true);
            },
            error:function(request,status,error){
                // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);}
                alert("실패하였습니다");
            }
        })

    })

    // 댓글 클릭시, 댓글 내용 POST 전송

    $("#summit_comment").click(function(){
        var queryString = $('#comment_form').serialize();

        // alert(queryString);

        $.ajax({
            type : 'POST',
            url : './pst/comment.php',
            data: queryString,
            success : function(data){
                // alert(data);
                location.reload(true);
            },
            error:function(request,status,error){
                // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                alert("실패하였습니다");
            },
        })
    })

    // 대댓글 영역 숨기기 / 보이기

    $('.cmt_addmnt_btn').click(function () {
        var cmtId = $(this).attr('data-cmt-id');

        $('#comment_add_'+cmtId).toggle();
        // $('.add_comment[data-parent-cmt-id="' + cmtId + '"]').toggle();
    });

})

// 대댓글 달기 클릭시 ajax POST 전송

$.fn.addComment_click = function(comment_id){
    var queryString = $('#add_comment_form_'+comment_id).serialize();

    // alert(queryString);
    // alert(comment_id);

    $.ajax({
        type : 'POST',
        url : './pst/comment.php',
        data: queryString,
        success : function(data){
            // alert(data);
            location.reload(true);
        },
        error:function(request,status,error){
            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            alert("실패하였습니다");
        },
    })
};

// 코멘트 평가 '좋아요' 클릭시 ajax POST 전송

$.fn.postCommentLike_click = function(comment_id){

    var pst_msg = "cmt_id="+comment_id+"&"+"stt=1"

    // alert(pst_msg)

    $.ajax({
        type : 'POST',
        url : './pst/cmt_rate.php',
        data: pst_msg,
        success : function(data){
            // alert(data);
            location.reload(true);
        },
        error:function(request,status,error){
            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            alert("실패하였습니다");
        },
    })
};

// 코멘트 평가 ''싫어요' 클릭시 ajax POST 전송

$.fn.postCommentDislike_click = function(comment_id){

    var pst_msg = "cmt_id="+comment_id+"&"+"stt=2"

    // alert(pst_msg)

    $.ajax({
        type : 'POST',
        url : './pst/cmt_rate.php',
        data: pst_msg,
        success : function(data){
            // alert(data);
            location.reload(true);
        },
        error:function(request,status,error){
            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            alert("실패하였습니다");
        },
    })
};
