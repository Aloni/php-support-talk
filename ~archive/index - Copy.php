<?php require_once 'include/header.php';?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!--h1 class="page-header"><small></small></h1 -->
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <div class="col-lg-8">

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
														<tr class="odd gradeX">
															<td>Support</td>
															<td>My sweetheart phone is frozen (902) </td>
															<td>The screen of my sweetheart phone is frozen...</td>
															<td class="center">15/04/2014 12:34</td>
															<td class="center">In Process</td>
														</tr>
														<tr class="even gradeC">
															<td>Support</td>
															<td>My sweetheart phone is frozen (902) </td>
															<td>The screen of my sweetheart phone is frozen...</td>
															<td class="center">15/04/2014 12:34</td>
															<td class="center">In Process</td>
														</tr>
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
					                   

				</div>
			</div>
                
                
                
                
                
                </div>
                    
        <!-- /#page-wrapper -->

            </div>
        </div>


<?php require_once 'include/footer.php';?>



