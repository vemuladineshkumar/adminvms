<?php
session_start();
include('commen/header.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$productssql="SELECT * FROM products";

$products = array();
if($conn){
    $result = mysqli_query($conn, $productssql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
			array_push($products,$row1);
		}
	}
}
?>


 <div class="main-panel">
        <div class="content-wrapper">
        <div class="table-responsive">
        <div style="text-align:right;width:80%;">
        <a href="addsubcategory.php"> ADD </a> 
        </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID</th>
                          <th>  Name  </th>
                          <th>  Description  </th>
                          <th>  Price  </th>
                          <th>  cat_id  </th> 
                          <th>  subcat_id  </th>                          
                          <th> Action</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                         
                      <?php
	foreach($products as $ps){
?>
                        <tr class="table-info">
                        <td>
                        <?php echo $ps['p_id'] ?>
                          </td>
                        <td>
                        <?php echo $ps['p_name'] ?>
                          </td>
                          <td>
                          <?php echo $ps['p_description'] ?>
                          </td>
                          <td>
                          <?php echo "Rs.".number_format((float)$ps['p_price'], 2, '.', ''); ?>
                          </td>
                          <td>
                          <?php echo $ps['cat_id'] ?>
                          </td>
                          <td>
                          <?php echo $ps['subcat_id'] ?>
                          </td>
                         
                          <td>
                          <a href="editproduct.php?id=<?php echo $ps['p_id'] ?>"><i class="fa fa-pencil-square-o"></i>
                          <i class="fa fa-trash-o"></i>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
</div>
</div>
</div>
 <?php 
       include('/commen/footer.php');
       ?>