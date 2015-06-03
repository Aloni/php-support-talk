<?php require_once 'include/header.php';?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="css/chat.css" rel="stylesheet" type="text/css">

<?php 
	if(!empty($_GET["taskId"])){$taskId = htmlspecialchars($_GET["taskId"]);}
		else {$taskId = -1;}
?>

 <!--
	<div id="mymessages" style="white-space: pre-wrap;"><?=  get_Task_With_Messages($taskId)?></div>

    <script>myjson = <?=  get_Task_With_Messages($taskId)?>;</script>
    <script>$('#mymessages').html = "!!!JSON.stringify(myjson.id)";</script>
-->
    <script>
        leftMessage = function (MessageJson) {
            result = '<li class="left clearfix">' +
                            '<span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span>' +
                                '<div class="chat-body clearfix">' +
                                    '<div class="header">' +
                                        '<strong class="primary-font">' + MessageJson.name + '</strong> ' +
                                        '<small class="pull-right text-muted">' +
                                            '<span class="glyphicon glyphicon-time"></span>' +
                                            MessageJson.date +
                                         '</small>' +
                                    '</div>' +
                                    '<p>' + MessageJson.content + '</p>' +
                                '</div>' +
                          '</li>';
            return result;
        }

        rightMessage = function (MessageJson) {
            result = '<li class="right clearfix">' +
                            '<span class="chat-img pull-right"><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" /></span>' +
                                '<div class="chat-body clearfix">' +
                                    '<div class="header">' +
                                        '<small class=" text-muted">' +
                                            '<span class="glyphicon glyphicon-time"></span>' +
                                            MessageJson.date +
                                        '</small>' +
                                        '<strong class="pull-right primary-font">' + MessageJson.name + '</strong>' +
                                    '</div>' +
                                    '<p>' + MessageJson.content + '</p>' +
                                '</div>' +
                          '</li>';
            return result;
        }


        buildMessagesListHtml = function (messagesArray) {
            //myjson2 = myjson.employees;

            result = "";
            for (i in messagesArray) {
                message = messagesArray[i];
                if (message.userType == 'customer') { result += leftMessage(message); }
                else { result += rightMessage(message); }
            }

            return result;
        }






        getMessages = function () {
            $.post("server2m.php", function (result) {
                //insert json data into html code:
                resultJson = JSON.parse(result);
                
                $("#chat-messages-list").html(buildMessagesListHtml(resultJson.messages));

                // start it again;
                setTimeout(function () {
                    getMessages();
                }, 5000);
            });
        }

        $(document).ready(function () {
            getMessages();
        });






  </script>


<!--------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <ul id="chat-messages-list" class="chat">


                      
                        <li class="left clearfix"><!---<span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span> -->
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">!!!row.name;</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>!!!row.date</small>
                                </div>
                                <p>
                                    !!!row.content;
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><!---<span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span> -->
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>!!!row.date</small>
                                    <strong class="pull-right primary-font">!!!row.name;</strong>
                                </div>
                                <p>!!!row.content;</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'include/footer.php';?>