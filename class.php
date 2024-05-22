
          <h1 class="page-header">CLASSES</h1>
      <?php
            include 'newclass.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Classes</h3>
        </div> 
        <div class="panel-body">  

  <table id="class" class="table table-hover table-bordered">
    <thead>
      <tr>
        <!-- <th style="width:5%">#</th> -->
        <th style="width:10%">Class</th>
        <th style="width:5%">Streem</th>
        <th style="width:10%">Class Teacher</th>
        <th style="width:10%">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM class");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
        <!-- <td><input type="hidden" id="id<?php echo $row["class_id"] ?>" name="class_id" value="<?php echo $row['class_id'] ?>" readonly></td> -->
        <td><input id="class<?php echo $row["class_id"] ?>"  name="class" type="text" style="border:0px" value="<?php echo $row['class'] ?>" readonly></td>
          <td><input id="streem<?php echo $row["class_id"] ?>"  name="streem" type="text" style="border:0px" value="<?php echo $row['streem'] ?>" readonly></td>
        <td><input id="teacher<?php echo $row["class_id"] ?>" name="teacher" type="text" style="border:0px;width:100%" value="<?php echo $row['teacher'] ?>" readonly></td>
        <td><center><a onclick="update_class(<?php echo $row["class_id"] ?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
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
  function update_class($i){
    var act,streem,teacher,i =$i;
      // $("#class_id").val($("#class_id"+i).val());
      // $("#class").val($("#class"+i).val());
      $("#streem").val($("#streem"+i).val());
      $("#teacher").val($("#teacher"+i).val());
      $("#head").html("Update Class");
      $("#btn_add").html("Update");


  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Add New Class</h3>
          <form class="" method="post">
            <input type="hidden" id="class_id" name="class_id">
            <div class="form-group">
              <label for="class" class="cols-sm-2 control-label">Class</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="class" name="class" id="class"
                  style="width:200px"  placeholder="Enter Class" value="<?php if(isset($_POST['class'])){echo $_POST['class'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['class'])){echo "<div class='erlert'><h5>" .$errors['class']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="streem" class="cols-sm-2 control-label">Streem</label>
              <div class="cols-sm-4">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <select name="streem" class="form-control" id="streem">
                  <option id="streem">Select Streem</option>
                  <option>None</option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from streem ");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['streem'] ?>">
                  <?php echo $row['streem'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
                <p>
            <?php if(isset($errors['streem'])){echo "<div class='erlert'><h5>" .$errors['streem']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>

            <div class="form-group">
              <label for="teacher" class="cols-sm-2 control-label">Class Teacher</label>
              <div class="cols-sm-3">
              <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <select name="teacher" class="form-control" id="teacher">
                  <option id="teacher">Select Class Teacher</option>
                  <option>None</option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * FROM user");
                  while($row = mysqli_fetch_assoc($sql)) {
                  ?>
                  <option value="<?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']; ?>">
                      <?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']; ?>
                  </option>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
                  </select>
                </div>
             <p>
            <?php if(isset($errors['teacher'])){echo "<div class='erlert'><h5>" .$errors['teacher']. "</h5></div>"; } ?>
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
            $("#class").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
