<?php require_once 'include/header.php';?>
<?php require_once 'include/dal.php';?>

    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <!--h1 class="page-header"><small></small></h1 -->
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Create Task
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form">

                        

                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <input type="file">
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control">
                                    <option>Support</option>
                                    <option>Marketing</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>

                    </div>
                 </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 




<?php require_once 'include/footer.php';?>



