<?php require_once 'include/dal.php';?>

		<?php 
		if(!empty($_GET["taskId"])){$taskId = htmlspecialchars($_GET["taskId"]);}
			else {$taskId = 1;}

        //echo get_Task_With_Messages($taskId);
	?>
	
{
"messages":[{"userType":"customer",
"name":"David",
"date":"13/2/2012",
"content": "fdsfs fgfsdfdsfdfdsffss          fffffffffffffffff ff f sfds gffdsgsd fgsdgsg fgsfgs"
},
{"userType":"worker",
"name":"David",
"date":"13/2/2012",
"content": "fdsfs fgfsdfdsfdsfds gffdsgsd fgsdgsg fgsfgs"
}
]

}