<div id="assignment-table">
    <table class="assignment-table-show">
        <tr>
            <td>S.N.</td>
            <td>Title</td>
            <td>Class</td>
            <td>Section</td>
            <td>Subject</td>
            <td>Submission date</td>
            <td>Action</td>
        </tr>
        <?php
        require_once "../../../php/config/sessionStart.php";
        if(isset($_SESSION['userEmail'])){
        require_once "../../../php/config/db.php";
        $userEmail=$_SESSION['userEmail'];
        $current_date = date("Y-m-d");
        $sql = "SELECT * FROM assignments where poster_email='$userEmail' and (exp_date > '$current_date')";
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
                while ($search = mysqli_fetch_assoc($exesql)) {
                    $i += 1;
                    $expDate=$search['exp_date'];
                    $formattedExpDate = date("M d",strtotime($expDate));
                    
        ?>
                    <tr>
                        <td><?php if (isset($i)) echo $i ?></td>
                        <td><?php if (isset($search['a_title'])) echo $search['a_title'] ?></td>
                        <td><?php if (isset($search['a_class'])) echo $search['a_class'] ?></td>
                        <td><?php if (isset($search['a_section'])) echo $search['a_section'] ?></td>
                        <td><?php if (isset($search['a_subject'])) echo $search['a_subject'] ?></td>
                        <td><?php if (isset($formattedExpDate)) echo $formattedExpDate ?></td>
                        <td>
                            <div class="btn-assignments">
                                <button class="btn-assign" style="background-color: green;" onclick="assignmentUpdate('<?php if (isset($search['id'])) echo $search['id'] ?>');">Update</button>
                                <button class="btn-assign" style="background-color: red;" onclick="assignmentDelete('<?php if (isset($search['id'])) echo $search['id'] ?>');">Delete</button>
                            </div>










                            <div class="assignment-delete" id="assignment-delete-<?php echo $search['id'];?>">
                                <div class="title-logo-delete"><i class="ri-question-line"></i></div>
                                <div class="title">Are you sure you want to delete it?</div>
                                <div class="btn-delete-assignment">
                                    <button type="button" class="delete-btn-assignment" style="background-color: red;" onclick="confirmDeleteAssignment(<?php if (isset($search['id'])) echo $search['id']; ?>);">Yes</button>
                                    <button class="delete-btn-assignment" style="background-color: gray;" onclick="assingmentDeleteRemove(<?php if (isset($search['id'])) echo $search['id']; ?>);">No</button>
                                </div>
                            </div>







                        </td>
                    </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='7' style='font-weight: 500;padding-top: 10px;'>No New Assignment is Added</td></tr>";
                
            }
        } else {
            echo "query error";
        }
    }else{
        echo "no session";
    }
        ?>

    </table>
</div>