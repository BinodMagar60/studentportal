  <table class="notify-table-show">
                    <tr>
                        <td>S.N.</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    require_once "../../php/config/db.php";
                    $notifyListSql = "SELECT * FROM teacher_notify";
                    if ($notifyExe = mysqli_query($con, $notifyListSql)) {
                        if (mysqli_num_rows($notifyExe) > 0) {
                            $i = 1;
                            while ($notifyResult = mysqli_fetch_assoc($notifyExe)) {
                    ?>
                                <tr>
                                    <td><?php if (isset($i)) echo $i ?></td>
                                    <td><?php if (isset($notifyResult['description'])) echo $notifyResult['description'] ?></td>
                                    <td>
                                        <div class="btn-notify">
                                            <button class="btn-notify" style="background-color: green;" onclick="notifyUpdate();">Update</button>
                                            <button class="btn-notify" style="background-color: red;" onclick="notifyDelete();">Delete</button>
                                        </div>
                                        
                                        <div class="notify-delete" id="notify-delete">
                                            <div class="title-logo-delete"><i class="ri-question-line"></i></div>
                                            <div class="title">Are you sure you want to delete it?</div>
                                            <div class="btn-delete-notify">
                                                <a href="../php/notify/deleteNotify.php?uid=<?php if (isset($notifyResult['id'])) echo $notifyResult['id'] ?>"><button class="delete-btn-notify" style="background-color: red;" onclick="notifyDeletePopup();">Yes</button></a>
                                                <button class="delete-btn-notify" style="background-color: gray;" onclick="notifyDeleteRemove();">No</button>
                                            </div>
                                    </td>
                                </tr>
                    <?php
                                $i++;
                            }
                        }
                    }
                    ?>
            </div>
            </table>