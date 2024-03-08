  <table class="notify-table-show">
      <tr>
          <td>S.N.</td>
          <td>Title</td>
          <td>Action</td>
      </tr>
      <?php
        require_once "../../php/config/db.php";
        require_once "../php/notify/expiry_notify.php";
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
                              <button class="btn-notify" style="background-color: green;" onclick="notifyUpdate(<?php echo $notifyResult['id'] ?>);">Update</button>
                              <button class="btn-notify" style="background-color: red;" onclick="notifyDelete(<?php echo $notifyResult['id'] ?>);">Delete</button>
                          </div>

                          <div class="notify-delete" id='notify-delete-<?php echo $notifyResult['id'] ?>'>
                          <!-- <div class="notify-delete" id='notify-delete'> -->
      <div class="title-logo-delete"><i class="ri-question-line"></i></div>
      <div class="title" style="color: black;">Are you sure you want to delete it?</div>
      <div class="btn-delete-notify">
      <button class="delete-btn-notify" style="background-color: red;" onclick="confirmDelete(<?php echo $notifyResult['id'] ?>)">Yes</button>
          <button class="delete-btn-notify" style="background-color: gray;" onclick="notifyDeleteRemove(<?php echo $notifyResult['id'] ?>);">No</button>
      </div>
  </div>
                </td>
                  </tr>
      <?php
                    $i++;
                }
            }
        }
        ?>
  </table>
  