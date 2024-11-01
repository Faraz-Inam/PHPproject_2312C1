<?php 
include("header.php")
?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                      
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Category Name</label>
                                                <input type="text" name="c_name" class="form-control" placeholder="Category Name" required>
                                            </div>
                                        </div>
                                       
                                        <button type="submit" name="c_add" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-12">
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php 
include("footer.php")
?>

<?php 
include("connection.php");
if(isset($_POST['c_add'])){
    $c_name = $_POST['c_name'];

    $insert = "INSERT INTO `categories`(`category_name`) VALUES ('$c_name')";
    $done = mysqli_query($connect, $insert);

    if($done){
        echo "<script>
        alert('Record Inserted!);
        window.location.href = 'viewCategory.php'
        </script>";
    }
}
?>