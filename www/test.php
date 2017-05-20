<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';
?>

<!-- <head>
    <script>
    $(document).ready(function(){
        $("#set_comment").click(function(){
            var elected_id = "elected_id="+$("#elected_id").val()+"&";
            var content = "content="+$("#content").val();

            alert(elected_id+content)
            $.ajax ({
                type:"POST",
                url:"./pst/comment.php",
                data:elected_id,content,
                success:function(data){
                    alert (data);
                    location.reload(true);
                },
                error:function(request,status,error){
                    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);}
            })

        })
    })
    </script>
<head> -->

<div class="row">
    <div class="wr-comment center-block">
        <form action="/pst/comment.php" method="post">
            <input type="hidden" name="elected_id" id="elected_id" value="2">
            <div class="form_comment_header form-group">
                    <label for="comment">닉네임</label>
                        <div class="go_right">
                            YOUR IP: xxx.xxx.xxx.xxx
                        </div>
            </div>
            <div class="form-group">
                    <label for="comment" class="sr-only">한마디</label>
                    <textarea type="text" class="form-control" rows="4" cols="35" name="content" id="content" placeholder="나의 한마디"></textarea>
            </div>
            <div class="form-group">
                <button type="summit" class="btn-block" id="set_comment">남기기</button>
            </div>
        </form>
    </div>
</div>

<!-- POST COMMENT -->

<head>
    <script>
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
                    },
                    error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    },
                })
            })
        })

    </script>
</head>

<div class="row">
    <div class="wr-comment center-block">
        <form name="comment_form" id="comment_form">
            <div class="form_comment_header form-group">
                <label for="user">닉네임</label>
                <input type="hidden" id="user" name="user_id" value="2">
                <div class="go_right">
                    YOUR IP: xxx.xxx.xxx.xxx
                </div>
            </div>
            <div class="form-group">
                <label for="elected" class="sr-only"></label>
                <input type="hidden" id="elected" name="elected_id" value="2">
            </div>
            <div class="form-group">
                <label for="content" class="sr-only">댓글 작성</label>
                <textarea type="text" id="content" name="content" class="form-control" rows="4" cols="35" placeholder="나의 한마디"></textarea>
                <button type="button" id="summit_comment" class="btn-block">남기기</button>
            </div>
        </form>
    </div>
</div>
