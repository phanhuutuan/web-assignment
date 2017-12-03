<div class='box-content box-no-padding'>
  <h2 class='pull-left' style="margin-bottom:30px;">All Users</h2>
  <table class='table' data='' style='margin-bottom:0;'>
    <thead>
      <tr>
        <th>
          Name
        </th>
        <th>
          E-mail
        </th>
        <th>
          Avatar
        </th>
        <th>
          Gender
        </th>
        <th>
          Type
        </th>
        <th style="width=220px"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($members as $row) {  
      ?>
        <tr>
          <td><?php echo $row['userName'] ?>  </td>
          <td><?php echo $row['email'] ?>     </td>
          <td><img src="upload/images/<?php echo $row['avatar']?>" alt="avatar" class="img-circle" style="height:50px; width:50px; "></td>
          <td><?php echo $row['gender']; ?></td>
          <td><?php echo $row['type'] ?></td>
          <td style="text-align:right;">
            <?php if ($row['id']!=$_SESSION['current_user']['id']){ ?> 
              <a href="admin.php?c=member&a=edit&id=<?php echo $row['id'];?>" class="btn btn-success button"> Edit </a>
              <?php if ($row['is_block']==0) { ?>
                <a href="admin.php?c=member&a=disable&id=<?php echo $row['id'];?>" class="btn btn-danger button"> Disable </a>
              <?php } else {?>
                <a href="admin.php?c=member&a=enable&id=<?php echo $row['id'];?>" class="btn btn-primary" style="width:73px; "> Enable </a>
            <?php 
              } 
            }
            ?>
          </td>
        </tr>

      <?php
        }
      ?>
      
    </tbody>
  </table>
</div>

