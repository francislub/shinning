
          <h3 class="page-header">Grading Section</h3> 
      <?php
            include 'new_grade.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Grades</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:60px">From</th>
        <th style="width:60px">To</th>
        <th style="width:150px">Grade</th>
        <th style="width:20%">Comment</th>
        <th style="width:10%">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM grade Order by grade_id ASC ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["grade_id"] ?>" name="id" value="<?php echo $row['grade_id'] ?>">
        <td><input id="grade<?php echo $row["grade_id"] ?>"  name="" type="text" style="border:0px; width:60px" value="<?php echo $row['from'] ?>" readonly></td>
        <td><input id="grade<?php echo $row["grade_id"] ?>"  name="" type="text" style="border:0px; width:60px" value="<?php echo $row['to'] ?>" readonly></td>
        <td><input id="grade<?php echo $row["grade_id"] ?>"  name="" type="text" style="border:0px; width:150px" value="<?php echo $row['grade'] ?>" readonly></td>
        <td><input id="grade<?php echo $row["grade_id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['comment'] ?>" readonly></td>
        <td><center><a onclick="update_grade(<?php echo $row["grade_id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
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
  function update_grade($i){
   var i = $i;
      $("#grade_id").val($("#grade_id"+i).val());
      $("#from").val($("#from"+i).val());
      $("#to").val($("#to"+i).val());
      $("#grade").val($("#grade"+i).val());
      $("#comment").val($("#comment"+i).val());
      $("#head").html('Update Grade');
      $("#btn_add").html('Update');
  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Add New Grade</h3>
          <form class="" method="post">
            <input type="hidden" id="grade_id" name="grade_id">
            <div class="form-group">
              <label for="from" class="cols-sm-2 control-label">From</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="from" name="from"
                  style="width:200px" value="<?php if(isset($_POST['from'])){echo $_POST['from'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['from'])){echo "<div class='erlert' id='alert'><h5>" .$errors['from']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group">
              <label for="to" class="cols-sm-2 control-label">To</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="to" name="to"
                  style="width:200px" value="<?php if(isset($_POST['to'])){echo $_POST['to'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['to'])){echo "<div class='erlert' id='alert'><h5>" .$errors['to']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group">
              <label for="grade" class="cols-sm-2 control-label">Grade</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="grade" name="grade"
                  style="width:200px" value="<?php if(isset($_POST['grade'])){echo $_POST['grade'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['grade'])){echo "<div class='erlert' id='alert'><h5>" .$errors['grade']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group">
              <label for="comment" class="cols-sm-2 control-label">Comment</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="comment" name="comment"
                  style="width:200px" value="<?php if(isset($_POST['comment'])){echo $_POST['comment'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['comment'])){echo "<div class='erlert' id='alert'><h5>" .$errors['comment']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div id="status"></div>
  

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>
