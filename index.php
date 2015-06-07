<?php require_once 'include/header.php';?>
<?php require_once 'include/dal.php';?>
<?php

    if(isset($_SESSION['user_type'])){
		if($_SESSION['user_type']!="worker"){
				header("location: ../customer_home.php");
		}

	}
		?>


		<script>
			function openTaskView(taskId) {
				window.open(
					"task_view.php?taskId=" + taskId, 
					"TaskView", 
					"width=600, height=600"
				); 
			}
		</script>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!--h1 class="page-header"><small></small></h1 -->
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Tickets
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Customers</h3>
								<!--
								<div id="dataTables-example_filter" class="dataTables_filter">
									<input type="search" class="form-control input-sm" placeholder="Search" aria-controls="dataTables-example">
								</div>
								-->
								
                            </div>
                            <div class="panel-body">
                                <div class="list-group" size="5">
									<?php $customersList = get_all_customers();  
									foreach ($customersList as $customer){ ?>
										<a href="?clientid=<?=$customer["id"];?>" class="list-group-item">
											 <?=($customer["tasksNum"] ? "<span class='badge'>".$customer["tasksNum"]:'')."</span>"?>
											<i class="fa fa-fw fa-comment"></i> <?= $customer["name"];?>
										</a>
									<?php
									}
									?>
                                    
                                </div>
								<!--
                                <div class="text-right">
                                    <a href="#">View All Customers <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								-->
                            </div>
                        </div>
                    </div>

					<?php require_once 'tasks_table.php';?>

				</div>
             </div>
         </div>

        <!-- /#page-wrapper -->









<?php require_once 'include/footer.php';?>



