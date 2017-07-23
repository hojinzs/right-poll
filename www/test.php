<?php require_once __DIR__ . '/../core/init.php';
include 'head.php';
include 'new_nav.php';
?>
<head>
    <script>

    $(document).ready(function(){
        $("#click").click(function(){
            var testValue = $("#test").val();

            var pwtest= /^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[1-9][0-9]{7})$/;

            if(!pwtest.test(testValue)){
                alert("error:: password is less strength!");
            } else {
                alert("success");
            }
        })
    })

    function regTest(){
        var pwtest="(^(?=.*[a-zA-Z])((?=.*\d))((?=.*\W)).{8,20}$)";
        if(!pw_raw.test(pwtest)){
            alert("error:: password is less strength!");
            return false;
        }
    }

    </script>
</head>

<input id="test"></input>
<button id="click">abcabc</button>
