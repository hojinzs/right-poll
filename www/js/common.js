$(document).ready(function(){

    // 시작시, 대댓글 영역 감춤
    $('.comment_add').hide(); // 댓글 작성 감추기
    // $('.add_comment').hide(); //댓글 내용 감추기

    $('.nav-more').hide();  //감추기

    //네비게이션 서브메뉴 설정
    var windowWidth = $(window).width();

    if(windowWidth < 768) {
        $('#nav-more-right').after($('#nav-right'))
    }

    if(windowWidth > 768) {
        $('#nav-left').after($('#nav-right'))
    }

    // 좋아요 버튼 클릭시 좋아요 +1 POST 전송
    $("#set_thumbsup").click(function(){
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
                // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);}
                alert("실패하였습니다");
            }
        })

    })

    // 대댓글 영역 숨기기 / 보이기
    $('.cmt_addmnt_btn').click(function () {
        var cmtId = $(this).attr('data-cmt-id');

        $('#comment_add_'+cmtId).toggle();
        // $('.add_comment[data-parent-cmt-id="' + cmtId + '"]').toggle();
    });

    // 댓글 클릭시 댓글 내용을 POST 전송
    $('.submit_comment').click(function(){
        var target = $(this).attr('cmt-target');
        var nickname = $('#comment_form_'+target).find('#nickname').val();
        var content = $('#comment_form_'+target).find('#content').val();
        // alert("nickname:"+nickname+"\n"+"content:"+content)

        // 닉네임을 입력하였는지 확인
        if (!nickname) {
            alert("닉네임을 입력해주세요!");
            return;
        }

        // 내용을 입력하였는지 확인
        if (!content) {
            alert("내용을 입력해주세요!");
            return;
        }

        // form의 입력값을 serialize로 인코딩
        var queryString = $('#comment_form_'+target).serialize();

        // ajax POST 전송
        $.ajax({
            type : 'POST',
            url : './pst/comment.php',
            data: queryString,
            success : function(data){
                if(data=="success"){
                    // return이 success라면
                    alert("댓글이 정상적으로 등록되었습니다.");
                    location.reload(true);
                } else {
                    // return이 success가 아니라면 (서버에서 에러가 있을 경우)
                    alert(data);
                }
            },
            error:function(request,status,error){
                // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                alert("실패하였습니다");
            },
        })

    })

    $('#toggle_nav_more').click(function(){
        $('.nav-more').toggle();
    })
    
    $('#nav_logout').click(function(event){
    	event.preventDefault();
    	
    	$.ajax({
	        url : './pst/user/logout.php',
	        success : function(data){
	            location.reload();
	        },
	        error:function(request,status,error){
	            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		        alert("실패하였습니다");
	        },
	    })
        	
    })

})

// 창 크기가 변경될때마다 이벤트 실행

$(window).resize(function(){
    //창 가로 크기가 768보다 작을 경우
    var windowWidth = $(window).width();

    if(windowWidth < 768) {
        $('#nav-more-right').after($('#nav-right'))
    }

    if(windowWidth > 768) {
        $('#nav-left').after($('#nav-right'))
    }

}).resize();

// 코멘트 평가 '좋아요' 클릭시 ajax POST 전송
$.fn.postCommentLike_click = function(comment_id){

    var pst_msg = "cmt_id="+comment_id+"&"+"stt=1"

    // alert(pst_msg)

    $.ajax({
        type : 'POST',
        url : './pst/cmt_rate.php',
        data: pst_msg,
        success : function(data){
            alert(data);
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
            alert(data);
            location.reload(true);
        },
        error:function(request,status,error){
            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            alert("실패하였습니다");
        },
    })
};

// 댓글 글자수 확인
// 레퍼런스: http://jsfiddle.net/gchoice/n7Mur/
$(function() {
    $('.remaining').each(function() {
        // count 정보 및 count 정보와 관련된 textarea/input 요소를 찾아내서 변수에 저장한다.
        var target = $(this).attr('count-target');
        var $count = $('.count', this);
        var $input = $('.wr_comment_input_'+target);
        // .text()가 문자열을 반환하기에 이 문자를 숫자로 만들기 위해 1을 곱한다.
        var maximumCount = $count.text() * 1;
        // update 함수는 keyup, paste, input 이벤트에서 호출한다.
        var update = function() {
            var before = $count.text() * 1;
            var now = maximumCount - $input.val().length;
            // 사용자가 입력한 값이 제한 값을 초과하는지를 검사한다.
            if (now < 0) {
                var str = $input.val();
                alert('한마디는 300자 까지 작성할 수 있습니다.');
                $input.val(str.substr(0, maximumCount));
                now = 0;
            }
            // 필요한 경우 DOM을 수정한다.
            if (before != now) {
                $count.text(now);
            }
        };
        // input, keyup, paste 이벤트와 update 함수를 바인드한다
        $input.bind('input keyup paste', function() {
            setTimeout(update, 0)
        });
        update();
    });
});
