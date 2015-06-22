
$(document).ready(function () {
    $('nav').remove();
    $('body').css('margin-top', 0);
    getMessages(true);

});



function addMessageLine(messageJson, templateName) {
    var templateHtml = $("#" + templateName).html();
    return templateHtml.replace("{{MESSAGE-CONTENT}}", messageJson.messageContent)
                .replace("{{USER-NAME}}", messageJson.name)
                .replace(/{{MESSAGE-DATE}}/g, messageJson.creationDate);
}


function buildMessagesListHtml(messagesArray) {
    result = "";
    var buffer = new Array();

    for (i in messagesArray) {
        message = messagesArray[i];
        if (message.userType == 'customer') {
            buffer.push(addMessageLine(message, "tplChatRowCustomer"));
        } else {
            buffer.push(addMessageLine(message, "tplChatRowWorker"));
        }
    }

    return buffer.join();
}

GetURLParameter = function (name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

updateTaskStatus = function () {
    newTaskStatus = $("#task-status").val();
    $.post(
            "tasks_methods.php",
            {
                "order": "updateTaskStatus",
                "taskId": GetURLParameter("taskId"),
                "status": newTaskStatus
            },
            function (data, status) {
                //alert(newTaskStatus+"|"+GetURLParameter("taskId")+ "\nData: " + data + "\nStatus: " + status);
            });
}



addMessage = function () {
    messageToSumbit = $('#btn-input');
    if (messageToSumbit.val() != "") {
        $.post(
            "tasks_methods.php",
            {
                "order": "addMessage",
                "taskId": GetURLParameter("taskId"),
                "messageContent": messageToSumbit.val()
            },
            function (data, status) {
                if (status == "success") {
                    getMessages(false);
                    messageToSumbit.val('');
                }
                //alert("Data: " + data + "\nStatus: " + status);
            });
    }
}

getMessages = function (setTimeoutFlg) {

    $.post("tasks_methods.php", { "order": "readMessages", "taskId": GetURLParameter("taskId") }, function (result) {
        ////alert(result);
            
        //insert json data into html code:
        resultJson = JSON.parse(result);
        $("#chat-messages-list").html(buildMessagesListHtml(resultJson.messages));

        $("#task-subject").html(resultJson.subject);

        statusStr = resultJson.status.toLowerCase();
        if (statusStr == "closed") {
            $("#task-status").val("Closed");
        }
        else if (statusStr == "inprocess") {
            $("#task-status").val("InProcess");
        }
        else if (statusStr == "new") {
            $("#task-status").val("New");
        }


        $("#task-content").html(resultJson.content + "<br/>(" + resultJson.creationDate + ")");



        if (setTimeoutFlg == true) {
            // start it again;
            setTimeout(function () {
                getMessages(true);
            }, 4000);

        }

    });

}








/**** auto update scroll - don't work yet..

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


         */
           