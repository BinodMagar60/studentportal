<?php
require_once "../php/config/db.php";
  $class=isset($_GET['classes']) ? $_GET['classes']:'one';
  $section=isset($_GET['sections']) ? $_GET['sections']:'A';
  $search=isset($_GET['search'])? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="../css/admin-studentdetail-style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css"
      integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

    <!-- upper search or select part -->
    <form action="" class="form1">
        <fieldset>
            <legend>Student</legend>
            <div class="search-student">
                <div class="select-opt">
                <div class="class">
                    <label for="classes">Class:</label>
                    <select name="classes" id="classes">
                        <option value="one" <?php echo ($class=='one' ? 'selected' : '');?>>One</option>
                        <option value="two" <?php echo ($class=='two' ? 'selected' : '');?>>Two</option>
                        <option value="three" <?php echo ($class=='three' ? 'selected' : '');?>>Three</option>
                        <option value="four" <?php echo ($class=='four' ? 'selected' : '');?>>Four</option>
                        <option value="five" <?php echo ($class=='five' ? 'selected' : '');?>>Five</option>
                        <option value="six" <?php echo ($class=='six' ? 'selected' : '');?>>Six</option>
                        <option value="seven" <?php echo ($class=='seven' ? 'selected' : '');?>>Seven</option>
                        <option value="eight" <?php echo ($class=='eight' ? 'selected' : '');?>>Eight</option>
                        <option value="nine" <?php echo ($class=='nine' ? 'selected' : '');?>>Nine</option>
                        <option value="ten" <?php echo ($class=='ten' ? 'selected' : '');?>>Ten</option>
                    </select>
                </div>
                <div class="section">
                    <label for="sections">Section:</label>
                    <select name="sections" id="sections">
                        <option value="A" <?php echo ($section=='A' ? 'selected' : '');?>>A</option>
                        <option value="B" <?php echo ($section=='B' ? 'selected' : '');?>>B</option>
                        <option value="C" <?php echo ($section=='C' ? 'selected' : '');?>>C</option>
                    </select>
                </div>
                </div>
                <div class="go">
                    <button type="submit">Go</button>
                </div>
                </div>
            </div>
        </fieldset>
    </form>

    <!-- upper search or select class end -->

    <!-- display the record -->

    <div class="lower-content">
       <form action="" method="get">
        <fieldset>
            <legend>Student list</legend>
            <div class="search-student-table">
                <div class="search">
                    <button><span class="search-here"><i class="ri-search-line"></i></span></button>
                    <input type="text" id="search" placeholder="Search here..." name="search">
                </div>
            </div>
        </fieldset>
       </form>
    </div>

    <!-- display end -->
    

    <!-- <script>
        document.getElementById('studentDetailForm').addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent default form submission
        
          // Call the studentDetail function
          studentDetail();
        });
        </script> -->
        <?php

$sql= "SELECT * FROM student_table WHERE class='$class' AND section='$section'";
if($exesql=mysqli_query($con,$sql)){
  if(mysqli_num_rows($exesql)>0){
  $i=0;
  ?>

<table>
<tr>
  <th>S.N</th>
  <th>Name</th>
  <th>Email</th>
  <th>Action</th>
</tr>
<?php
  while($searchResult= mysqli_fetch_assoc($exesql)){
    $i+=1;
?>
<tr>
  <td><?php echo $i;?></td>
  <td><?php echo $searchResult['name'];?></td>
  <td><?php echo $searchResult['email'];?></td>
  <td><a href="#">View More Details</a></td>
</tr>
<?php
  }
  ?>
  </table>
  <?php
  }else{
    echo "no result found";
  }
}else{
  echo "query error";
}
?>
</body>
</html>
