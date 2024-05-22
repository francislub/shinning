
          <h1 class="page-header">STREEMS</h1>
      <?php
            include 'newstreem.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Streems</h3>
        </div> 
        <div class="panel-body">  

  <table id="streem" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:5%">#</th>
        <th style="width:20%">Streems</th>
        <th style="width:10%">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM streem");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
        <td><input id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>" readonly></td>
        <td><input id="streem<?php echo $row["id"] ?>"  name="streem" type="text" style="border:0px; " value="<?php echo $row['streem'] ?>" readonly></td>
        <td><center><a onclick="update_streem(<?php echo $row["id"] ?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
      </tr>
    
      <?php
    
    }
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script>
  function update_streem($i){
    var act,streem,i =$i;
      $("#id").val($("#id"+i).val());
      $("#streem").val($("#streem"+i).val());
      $("#head").html("Update Streem");
      $("#btn_add").html("Update");
  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Add New Streem</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="streem" class="cols-sm-2 control-label">Streem</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="streem" name="streem" id="streem"
                  style="width:200px"  placeholder="Enter Streem" value="<?php if(isset($_POST['streem'])){echo $_POST['streem'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['streem'])){echo "<div class='erlert'><h5>" .$errors['streem']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
 <script type="text/javascript">
        $(function() {
            $("#streem").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
