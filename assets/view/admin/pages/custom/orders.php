<div class="well">
    <h3><i class="fa-solid fa-list"></i> Orders</h3>
</div>

<div style="overflow:auto;">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order By</th>
            <th>Img</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>

            <?php 
            $data = "SELECT * FROM orders ORDER BY id DESC";
            $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
            if($getAll){
              if(count($getAll) > 0){
                  foreach($getAll as $val){
                      echo '<tr>
                                <td>Username</td>
                              <td><img src="'.$val['img'].'" style="height:80px;width:auto;" /></td>
                              <td>'.$val['product_name'].'</td>
                              <td>'.$val['qty'].'</td>
                              <td>'.$val['price'].'</td>
                              <td>
                                  Ontheway
                              </td>
                          </tr>';
                  }
              }
            }
            ?>
            
        
        
        </tbody>
    </table>
</div>