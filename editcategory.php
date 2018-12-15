<?php
session_start();
include('commen/header.php');

if(!empty($_POST['cat_id'])){
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $catupdatequery = "UPDATE category SET cat_id=$cat_id, cat_name='$cat_name' WHERE cat_id=$cat_id";
    $catupdateresult = mysqli_query($conn,$catupdatequery);
}
$id = $_GET['id'];
$category="SELECT `cat_name` FROM category WHERE cat_id=$id";

  $categoryresult = mysqli_query($conn,$category);
  if(mysqli_num_rows($categoryresult)>0){
     $cat_list = mysqli_fetch_assoc($categoryresult);
  }
?>

<div class="main-panel">
        <div class="content-wrapper">
        <div class="table-responsive">
  <form class="forms-sample" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" name="cat_id" value="<?php echo $id; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" name="cat_name" value="<?php echo $cat_list['cat_name']; ?>">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
</div>
</div>
</div>
</div>
<?php 
       include('/commen/footer.php');
       ?>