<?php
require_once "../../php/config/sessionStart.php";
if(isset($_SESSION['userClass'],$_SESSION['userSection'])){
    require_once "../../php/config/db.php";
    $class=$_SESSION['userClass'];
    $section=$_SESSION['userSection'];
$subject= isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>









<?php
            if(isset($class,$section,$subject)){
                        require_once "../../php/config/db.php";
                        $sql = "SELECT * FROM assignments where a_class='$class' and (a_section='everyone' or a_section='$section') and `a_subject`='$subject'";
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
                ?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Title</td>
                        <td>Assigned by</td>
                        <td>Submission Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                <?php
                while ($search = mysqli_fetch_assoc($exesql)) {
                    $i += 1;
                    ?>
                   <tr>
                        <td><?php if(isset($i)) echo $i ?></td>
                        <td onclick="assignmentDetailsShow();"><?php if(isset($search['a_title'])) echo $search['a_title'] ?></td>
                        <td><?php if(isset($search['poster_name'])) echo $search['poster_name'] ?></td>
                        <td><?php if(isset($search['exp_date'])) echo $search['exp_date'] ?></td>
                        <td>Pending</td>
                        <td>
                            <div class="btn-assignments">
                                <button class="btn-assign" style="background-color: transparent;" onclick="assignmentUploadShow();"><i class="ri-upload-2-line"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "no assignments";
                        }
                    }else{
                        echo "query error";
                    }
                    }else{
                        echo "not set class";
                    }
                    ?>





<?php  
}
?>