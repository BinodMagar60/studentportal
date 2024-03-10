<?php
require_once "../../php/config/sessionStart.php";
?>




                    <?php

                    if(isset($_SESSION['userName'])){
                        require_once "../../php/config/db.php";
                        $userName=$_SESSION['userName'];
                        $noteShowSql="SELECT * FROM teacher_upload_notes where uploader='$userName'";
if($noteShowExe=mysqli_query($con,$noteShowSql)){
    if(mysqli_num_rows($noteShowExe)>0){
        $i=1;
        ?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Uploaded Date</td>
                        <td>Action</td>
                    </tr>
        <?php
        while($noteShowResult=mysqli_fetch_assoc($noteShowExe)){
            $uploadDate=date("Y-m-d",strtotime($noteShowResult['created_date']));
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php if(isset($noteShowResult['name'])) echo $noteShowResult['name'] ?></td>
                        <td><?php if(isset($uploadDate)) echo $uploadDate ?></td>
                        <td>
                        <a href="../../<?php if(isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>" download="<?php if(isset($noteShowResult['name'])) echo $noteShowResult['name'] ?>"><button type="button" style="color: blue;"><i class="ri-download-2-fill"></i></button></a>
                           
                        <button type="button" style="color: red;" onclick="deleteNotes(<?php if(isset($noteShowResult['id'])) echo $noteShowResult['id']?>,'<?php if(isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>')"><i class="ri-delete-bin-6-line"></i></button>
                        </td>
                    </tr>
                    <?php
                    $i++;
                            }
                        }
                    }
                    }
                    ?>
                </table>