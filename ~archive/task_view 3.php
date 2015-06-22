<?php require_once 'include/header.php';?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 

    <script>
	
	
        leftMessage = function (MessageJson) {
            result = '<li class="left clearfix">' +
                            '<span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=W" alt="Worker Icon" class="img-circle" /></span>' +
                                '<div class="chat-body clearfix">' +
                                    '<div class="header">' +
                                        '<strong class="primary-font">' + MessageJson.name + '</strong> ' +
                                        '<small class="pull-right text-muted">' +
                                            '<span class="glyphicon glyphicon-time"></span>' +
                                            MessageJson.creationDate +
                                         '</small>' +
                                    '</div>' +
                                    '<p>' + MessageJson.messageContent + '</p>' +
                                '</div>' +
                          '</li>';
            return result;
        }

        rightMessage = function (MessageJson) {
            result = '<li class="right clearfix">' +
                            '<span class="chat-img pull-right"><img src="http://placehold.it/50/FA6F57/fff&text=(-;" alt="Customer Icon" class="img-circle" /></span>' +
                                '<div class="chat-body clearfix">' +
                                    '<div class="header">' +
                                        '<small class=" text-muted">' +
                                            '<span class="glyphicon glyphicon-time"></span>' +
                                            MessageJson.creationDate +
                                        '</small>' +
                                        '<strong class="pull-right primary-font">' + MessageJson.name + '</strong>' +
                                    '</div>' +
                                    '<p>' + MessageJson.messageContent + '</p>' +
                                '</div>' +
                          '</li>';
            return result;
        }


        buildMessagesListHtml = function (messagesArray) {
            
            result = "";
            for (i in messagesArray) {
                message = messagesArray[i];
                if (message.userType == 'customer') { result += leftMessage(message); }
                else { result += rightMessage(message); }
            }
			
            return result;
        }

		GetURLParameter= function(name) {
			name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(location.search);
			return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}

		addMessage = function(){
			messageToSumbit = $('#btn-input')
			if(messageToSumbit.val()!=""){
				$.post(
					"server2m.php",
					{ 
						"order" : "addMessage", 
						"taskId": GetURLParameter("taskId"),
						"messageContent" : messageToSumbit.val()
					},
					function(data,status){
						if(status == "success"){
							getMessages(false);
							messageToSumbit.val('');
						}
						//alert("Data: " + data + "\nStatus: " + status);
					});
			}
		}		

        getMessages = function (setTimeoutFlg) {
			
            $.post("server2m.php", {"order":"readMessages", "taskId": GetURLParameter("taskId")},function (result) { 
				//alert(result);	
				//insert json data into html code:
				resultJson = JSON.parse(result);
                $("#chat-messages-list").html(buildMessagesListHtml(resultJson.messages));
				
				$("#task-subject").html(resultJson.subject);
				
				statusStr = resultJson.status.toLowerCase();
				if(statusStr=="closed"){
					$("#task-status").val("Closed");
				}
				else if(statusStr=="inprocess"){
					$("#task-status").val("InProcess");
				}
				
				$("#task-content").html(resultJson.content + "<br/>(" + resultJson.creationDate + ")");
				
				
				
				if(setTimeoutFlg==true){
					// start it again;
					setTimeout(function () {
						getMessages(true);
					}, 5000);
					
				}
                
            });
        
		}

        $(document).ready(function () {
            $('nav').remove();
			getMessages(true);
			
        });
		
		

			
</script>

<link href="css/chat.css" rel="stylesheet" type="text/css">

<!--------------------------------------------------->
<div class="container">
    <div class="row">
		    <div class="col-md-6">
							<h1 id="task-subject" >subject</h1>
                            <div class="form-group">
                                <!--<label>Status</label>-->
                                <select id="task-status" class="form-control">
                                    <option>InProcess</option>
                                    <option>Closed</option>
                                </select>
                            </div>

	
	
	
	
		</div>
	
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> <span id="task-content">Chat</span>
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse collapse in" id="collapseOne">
                <div id="my-chat-messages-box" class="panel-body">
                    <ul id="chat-messages-list" class="chat">
						<li>Please Wait</li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button onclick="addMessage();" class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
			var scrolled = false;
			function updateScroll(){
				//if(!scrolled){
					var element = document.getElementById("my-chat-messages-box");
					element.scrollTop = element.scrollHeight;
				//}
			}

			$("#my-chat-messages-box").on('scroll', function(){
				var element = document.getElementById("my-chat-messages-box");
				if(element.scrollTop != element.scrollHeight){scrolled=true;}
			});
</script>

<?php require_once 'include/footer.php';?>