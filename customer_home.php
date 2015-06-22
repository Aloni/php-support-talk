<?php require_once 'include/header.php';?>
<?php 
    if(isset($_SESSION['user_type'])){
		if($_SESSION['user_type']!=="customer"){
				header("location: ../index.php");
		}

	}
?>

<?php require_once 'include/dal.php';?>


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
                    <div class="col-lg-2">
						
						
                    </div>

							<!-- /#Customers Tasks -->	
			
					<div class="col-lg-8">
					<?php
					//if(!empty($_GET["clientid"])){$clientId = htmlspecialchars($_GET["clientid"]);}
					$clientId = $_SESSION["user_id"];
					//else {$clientId = $customersList[0]["id"];}
					
					$customersList1 = get_all_Open_Tasks($clientId);?>

				

						<ul id="myTab" class="nav nav-tabs nav-justified">
							<li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Open Tasks</a>
							</li>

							<li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Create New Task</a>
							</li>
						</ul>

						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="service-one">
								<div id="page-wrapper">

									<!-- /.row -->
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<!--DataTables Advanced Tables-->
												</div>
													<!-- /.panel-heading -->
												<div class="panel-body">
													<div class="dataTable_wrapper">
														<table class="table table-striped table-bordered table-hover" id="dataTables-example">
															<thead>
																<tr>
																	<th>Type</th>
																	<th>Subject</th>
																	<th>Content</th>
																	<th>Date</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
															<?php foreach ($customersList1 as $customer){?>
																

															
																<tr style="cursor: pointer;" onclick="openTaskView('<?=$customer["taskId"]?>');" class="odd gradeX">
																	<td><?= $customer["taskType"];?></td>
																	<td><?= $customer["subject"];?> </td>
																	<td><?= $customer["content"];?> </td>
																	<td><?= $customer["creationDate"];?> </td>
																	<td><?= $customer["status"];?> </td>

																</tr>
														<?php
														}
														 ?>
															</tbody>
														</table>
													</div>
													<!-- /.table-responsive -->

												</div>
												<!-- /.panel-body -->
											</div>
											<!-- /.panel -->
										</div>
									   
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
							</div>
							<!-- /.col-lg-6 -->
											   
							<div class="tab-pane fade" id="service-two">
								<?php //require_once 'create_task.php';?>
															
								<div id="page-wrapper">

										<div class="container-fluid">

											<!-- Page Heading
											<div class="row">
												<!--h1 class="page-header"><small></small></h1 ->
													<ol class="breadcrumb">
														<li class="active">
															<i class="fa fa-edit"></i> Create Task
														</li>
													</ol>
												</div>
											</div> -->
											<!-- /.row -->

											<div class="row">
												<div class="col-lg-6">

													<form role="form" action="create_task.php" method="post">

													

														<div class="form-group">
															<label>Subject</label>
															<input class="form-control" placeholder="Enter text" name="subject"required>
														</div>


												   
														<div class="form-group">
															<label>Content</label>
															<textarea class="form-control" rows="5" name="content"></textarea required>
														</div>                           
													 <div class="form-group">
															<label>Type</label>
															<select class="form-control" name="taskType" size="5" required>
																<option>Support</option>
																<option>Marketing</option>
																<option>HR</option>
																<option>IT</option>
																<option>Other</option>
															</select>
														</div>
														<button type="submit" class="btn btn-default">Submit Button</button>
														<button type="reset" class="btn btn-default">Reset Button</button>

													</form>
											  
							</div>
											 </div
											 >
											<!-- /.row -->

										</div>

									</div>
									<!-- /#page-wrapper -->
									
	
							</div>
						</div>

					</div>
			
			        <div class="col-lg-2">
						
						
                    </div>

				</div>
             </div>
         </div>

        <!-- /#page-wrapper -->









<?php require_once 'include/footer.php';?>
