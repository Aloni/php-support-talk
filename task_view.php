<?php require_once 'include/header.php';?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/task_view.js"></script>

<link href="css/chat.css" rel="stylesheet" type="text/css">

<div class="container">
    <div class="row">
		<div class="col-md-6">
						<h1 id="task-subject" ></h1>
                        <div class="form-group">
                            <!--<label>Status</label>-->
                            <select id="task-status" class="form-control" onChange="updateTaskStatus()" >
                                <option>New</option>
								<option>InProcess</option>
                                <option>Closed</option>
                            </select>
                        </div>

	
		</div>
	
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> <span id="task-content">Chat</span>
                    <!--<div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>-->
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

<!--<img alt="cache" src="http://placehold.it/50/FA6F57/fff&text=(-;" />
<img alt="cache" src="http://placehold.it/50/FA6F57/fff&text=W" />-->

<script id="tplChatRowWorker" type="text/html">
    <li class="left clearfix">
        <span class="chat-img pull-left">
            <img src="http://placehold.it/50/55C1E7/fff&text=W" alt="Worker Icon" class="img-circle" />
        </span>
        <div class="chat-body clearfix">
            <div class="header">
                <strong class="primary-font">{{USER-NAME}}</strong>
                <small class="pull-right text-muted">
                    <span class="glyphicon glyphicon-time"></span>
                    {{MESSAGE-DATE}}
                    </small>
            </div>
            <p>{{MESSAGE-CONTENT}}</p>
        </div>
    </li>
</script>



<script id="tplChatRowCustomer" type="text/html">
    <li class="right clearfix">
    <span class="chat-img pull-right">
        <img src="http://placehold.it/50/FA6F57/fff&text=(-;" alt="Customer Icon" class="img-circle" />
    </span>
    <div class="chat-body clearfix">
        <div class="header">
            <small class=" text-muted">
                <span class="glyphicon glyphicon-time"></span>
                {{MESSAGE-DATE}}
            </small>
            <strong class="pull-right primary-font">{{USER-NAME}}</strong>
        </div>
        <p>{{MESSAGE-CONTENT}}</p>
    </div>
</li>
</script>




<?php require_once 'include/footer.php';?>