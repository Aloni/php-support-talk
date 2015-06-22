<?php

?>

<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>



$(document).ready(function(){
    getMessages();
    /*
    $("input").keyup(function(){
        var txt = $("input").val();
        $.post("server.php", function(result){
            $("span").html(result);
        });
    });
    */
});





    getMessages = function() {
        //var self = this;
        //var _sRandom = Math.random();  

        $.post("server.php", function(result){
            $("span").html(result);
       // });
        /*
        $.getJSON('server.php', function(data){
            if(data.messages) {
                $('.chat_main').html(data.messages);
            }
            */
            // start it again;
            setTimeout(function(){
               getMessages();
            }, 5000);
        });
    }
    




</script>
</head>
<body>

<p>Start typing a name in the input field below:</p>
First name:

<input type="text">

<p>Suggestions: <span></span></p>
<p>The file used in this example (<a href="demo_ajax_gethint.txt" target="_blank">demo_ajax_gethint</a>) is explained in our Ajax tutorial</p>

</body>
</html>
