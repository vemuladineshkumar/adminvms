<?php
session_start();
include('commen/header.php');
?>


 <div class="main-panel">
        <div class="content-wrapper">
        <div class="table-responsive">
        <div style="text-align:right;width:80%;">
        <a href="addcategory.php"> ADD </a> 
        </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Category ID
                          </th>
                          <th>
                          Category Name
                          </th>
                          
                          <th>
                            Action
                          </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $category="SELECT * FROM category";
                          $cat_listview = array();
                            $categoryresult = mysqli_query($conn,$category);
                            if(mysqli_num_rows($categoryresult)>0){
                                while($cat_list = mysqli_fetch_assoc($categoryresult)) {
                                    array_push($cat_listview,$cat_list);
                                }
                            }
       ?>
                        <?php foreach($cat_listview as $catlist) { ?>
                        <tr class="table-info">
                          
                        <td>
                            <?php echo $catlist['cat_id']; ?>
                          </td>
                          <td>
                          <?php echo $catlist['cat_name']; ?>
                          </td>
                         
                          <td>
                          <a href="editcategory.php?id=<?php echo $catlist['cat_id'];?>"><i class="fa fa-pencil-square-o"></i>
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