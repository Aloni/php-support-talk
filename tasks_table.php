<script>
var app = angular.module('myApp', []);
app.controller('tasksCtrl', function($scope, $http) {
    $http.get("http://www.w3schools.com/angular/	?clientid=" + ).success(function (response) {$scope.names = response.records;});
});
</script>
		
		
		<!-- /#Customers Tasks -->	
			
					<div class="col-lg-8">
					<?php
					if(!empty($_GET["clientid"])){$clientId = htmlspecialchars($_GET["clientid"]);}
					else {$clientId = $customersList[0]["id"];}
					
					$customersList1 = get_all_Open_Tasks($clientId);?>

				

						<ul id="myTab" class="nav nav-tabs nav-justified">
							<li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Tasks</a>
							</li>

							<!--<li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> History</a>
							</li>-->
						</ul>

						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="service-one">
								<div id="page-wrapper">

									<!-- /.row -->
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													
												</div>
													<!-- /.panel-heading -->
												<div class="panel-body">
													<div class="dataTable_wrapper"  ng-app="myApp" ng-controller="tasksCtrl">
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
															<!--	<tr ng-repeat="t in tasks" style="cursor: pointer;" onclick="openTaskView('<?=$customer["taskId"]?>');" class="odd gradeX">
																	<td>{{ t.taskType }}</td>
																    <td>{{ t.subject }}</td>
																    <td>{{ t.content }}</td>
																    <td>{{ t.creationDate }}</td>
																    <td>{{ t.status }}</td>
																</tr> -->
																															
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
			
			