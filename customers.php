<?php require_once 'include/header.php';?>
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
                                <i class="fa fa-dashboard"></i> Customers
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
								<div id="dataTables-example_filter" class="dataTables_filter">
									<input type="search" class="form-control input-sm" placeholder="Search" aria-controls="dataTables-example">
								</div>
								
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
									<?php $customersList = get_all_customers();  
									foreach ($customersList as $customer){ ?>
										<a href="?clientid=<?=$customer["id"];?>" class="list-group-item">
											<span class="badge"> <?= $customer["tasksNum"];?></span>
											<i class="fa fa-fw fa-comment"></i> <?= $customer["name"];?>
										</a>
									<?php
									}
									?>
                                    
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Customers <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
             </div>
         </div>

		<!-- /#Customers Tasks -->	
			
            <div class="col-lg-8">
            <?php
			if(!empty($_GET["clientid"])){$clientId = htmlspecialchars($_GET["clientid"]);}
			else {$clientId = $customersList[0]["id"];}
			
			$customersList1 = get_all_Open_Tasks($clientId);?>

		

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Open Tasks</a>
                    </li>

                    <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> History</a>
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
											DataTables Advanced Tables
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
                        <h4>Service Two</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    </div>
				</div>

			</div>
        <!-- /#page-wrapper -->









<?php require_once 'include/footer.php';?>



