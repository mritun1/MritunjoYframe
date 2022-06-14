<div class="well">
        <h4>Dashboard</h4>
        <p>........</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Appointments</h4>
            <p>
              <?php 
              $data = "SELECT * FROM appointment ORDER BY id DESC";
              $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
              if($getAll){
                echo count($getAll);
              }else{
                echo 0;
              }
              ?>
            </p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Contact</h4>
            <p>
              <?php 
              $data = "SELECT * FROM contact ORDER BY id DESC";
              $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
              if($getAll){
                echo count($getAll);
              }else{
                echo 0;
              }
              ?>
            </p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>....</h4>
            <p>....</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>.....</h4>
            <p>....</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>....</p> 
            <p>....</p> 
            <p>....</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>....</p> 
            <p>....</p> 
            <p>....</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>....</p> 
            <p>....</p> 
            <p>....</p> 
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>....</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>....</p> 
          </div>
        </div>
      </div>
    </div>