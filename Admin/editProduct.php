 <!-- UPDATE CODE -->
 <?php 
 include("header.php");
 include("connection.php");

if(isset($_GET["i"])){
    $p_id = $_GET["i"];

    $read = "SELECT products.*, category_name, brand_name 
FROM products 
JOIN categories
ON categories.category_id = products.category_id
JOIN brands
ON brands.brand_id = products.brand_id WHERE product_id = '$p_id'";
// $sel = "SELECT * FROM `products` WHERE `product_id` = '$p_id'";
$select = mysqli_query($connect, $read);

$fetch = mysqli_fetch_assoc($select);
?>
  <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                      
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">


                                <form action="#" method="POST" enctype="multipart/form-data">

<div class="input-group mb-3  col-md-6">
    <div class="input-group-prepend">
        <label class="input-group-text">Options</label>
    </div>
    <select name="c_id" class="custom-select" required>
        <?php 
        $categories = "SELECT * FROM categories";
       $cat_query = mysqli_query($connect, $categories);
       while($cat_data = mysqli_fetch_assoc($cat_query)){
    ?>
    <option value="<?php echo $cat_data['category_id'] ?>" <?php if($fetch['category_id'] == $cat_data['category_id']){echo "selected = 'selected'";} ?>> <?php echo $cat_data['category_name']?> </option>
    <?php
    }
    ?>    
    </select>
</div>

<div class="input-group mb-3 col-md-6">
    <div class="input-group-prepend ">
        <label class="input-group-text">Options</label>
    </div>
    <select name="b_id" class="custom-select" required>
        <?php 
       $brands = "SELECT * FROM brands";
       $bran_query = mysqli_query($connect, $brands);
       while($bran_data = mysqli_fetch_assoc($bran_query)){
    ?>
    
        <option value="<?php echo $bran_data['brand_id'] ?>"  <?php if($fetch['brand_id'] == $bran_data['brand_id']){echo "selected = 'selected'";} ?>> <?php echo $bran_data['brand_name']?> </option>
        
    <?php
    }
    ?>

    </select>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Product Name</label>
        <input type="text" name="p_name" value="<?php echo $fetch['product_name'] ?>" class="form-control" placeholder="Product Name" required>
    </div>
</div> 

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Product Price</label>
        <input type="number" name="p_price" value="<?php echo $fetch['product_price'] ?>" class="form-control" placeholder="Product Price" required>
    </div>
</div> 

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Product Model</label>
        <input type="text" name="p_model" value="<?php echo $fetch['product_model'] ?>" class="form-control" placeholder="Product Model" required>
    </div>
</div> 

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Product Specification</label>
        <input type="text" name="p_specification"  value="<?php echo $fetch['product_specification'] ?>" class="form-control" placeholder="Product Specification" required>
    </div>
</div> 

<label>Product Image</label>
<div class="input-group mb-3 col-md-6">
    <div class="custom-file">
        <input name="p_image" type="file" class="custom-file-input">
        <label class="custom-file-label">Choose file</label>
    </div>
    <div class="input-group-append">
        <span class="input-group-text">Upload</span>
    </div>
</div>
<img src="product_images/<?php echo $fetch['product_image'] ?>" width="70px">

<button type="submit" name="p_update" class="btn btn-primary">Add</button>

</form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php        
    }
if(isset($_POST['p_update'])){
    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_model = $_POST["p_model"];
    $p_specification = $_POST["p_specification"];
    $c_id = $_POST["c_id"];
    $b_id = $_POST["b_id"];

    $p_image = $_FILES["p_image"];
    $img_name = $p_image['name'];
    $img_tmpname = $p_image['tmp_name'];
    $img_size = $p_image['size'];
    $img_type = $p_image['type'];
    
    if(is_uploaded_file($img_tmpname)){
    $path = 'product_images/' . $img_name;

        move_uploaded_file($img_tmpname, $path);
        $updated = "UPDATE `products` SET `product_name` = '$p_name', `product_price` = '$p_price', `product_model` = '$p_model', `product_specification` = '$p_specification', `product_image` = '$img_name', `category_id` = '$c_id', `brand_id` = '$b_id'  WHERE `product_id` = '$p_id'";
       
        $done = mysqli_query($connect, $updated);
        if($done){
         echo "<script>
         alert('Record Updated Withy Image!');
         window.location.href = 'viewProduct.php';
         </script>";
        }
    }
    else{
        $updated = "UPDATE `products` SET `product_name` = '$p_name', `product_price` = '$p_price', `product_model` = '$p_model', `product_specification` = '$p_specification', `category_id` = '$c_id', `brand_id` = '$b_id'  WHERE `product_id` = '$p_id'";
    
        $done = mysqli_query($connect, $updated);
        if($done){
         echo "<script>
         alert('Record Updated Without Image!');
         window.location.href = 'viewProduct.php';
         </script>";
        }
    
    
    }

   
}


// DELETE CODE 
if(isset($_GET["j"])){
    $p_id = $_GET["j"];

$deleted = "DELETE FROM `products` WHERE `product_id` = '$p_id'";
$done = mysqli_query($connect, $deleted);

if($done){
    echo "<script>
    alert('Record Deleted!');
    window.location.href = 'viewProduct.php';
    </script>";
   }
}

include("footer.php");
?>