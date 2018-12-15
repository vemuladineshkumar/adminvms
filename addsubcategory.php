<?php
session_start();
include('commen/header.php');

if(!empty($_POST['subcat_name'])){
    $subcat_id = $_POST['subcat_id'];
    $cat_id = $_POST['cat_id'];
    $subcat_name = $_POST['subcat_name'];
    $catupdatequery = "INSERT INTO sub_category (`cat_id`,`subcat_name`) VALUES ($cat_id,'$subcat_name')";
    $catupdateresult = mysqli_query($conn,$catupdatequery);
}

?>

<div class="main-panel">
        <div class="content-wrapper">
        <div class="table-responsive">
  <form class="forms-sample" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Subcategory ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" name="subcat_id" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" name="cat_id">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Subcategory name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" name="subcat_name">
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