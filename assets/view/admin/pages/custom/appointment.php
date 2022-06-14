<div class="well">
    <h3><i class="fa-solid fa-handshake"></i> Appointments</h3>
</div>

<div style="overflow:auto;">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Date</th>
            <th>Rollno</th>
            <th>Branch</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            $data = "SELECT * FROM appointment ORDER BY id DESC";
            $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
            if($getAll){
              if(count($getAll) > 0){
                  foreach($getAll as $val){
                      echo '<tr>
                                <td>'.date("Y-m-d",$val['day']).'</td>
                                <td>'.$val['rollno'].'</td>
                                <td>'.$val['branch'].'</td>
                                <td>'.$val['message'].'</td>
                            </tr>';
                  }
              }
            }
            ?>
        
        
        </tbody>
    </table>
</div>