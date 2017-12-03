<div class='box-content box-no-padding'>
  <h2 class='pull-left' style="margin-bottom:30px;">All Products</h2>
  <div>
    <a href="admin.php?c=product&a=new" class="btn btn-primary button pull-right" style=" margin-top: 25px;"> New Product </a>
  </div>
  <table class='table' data='' style='margin-bottom:0;'>
    <thead>
      <tr>
        <th>
          Name
        </th>
        <th>
          Price
        </th>
        <th>
          Quantity
        </th>
       <!--  <th>
          Type
        </th> -->
        <th>
          Image Product
        </th>
        <th style="width=220px"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for ($i=0; $i < $products->rowCount() ; $i++) {  
        $row = $products->fetch();
        // $rowTypeProduct = $typeProduct->fetch();
        ?>
        <tr>
          <td><?php echo $row['Name'] ?>  </td>
          <td><?php echo $row['Price'] ?>     </td>
          <td><?php echo $row['Quantity'] ?></td>
          <!-- <td><?php echo $rowTypeProduct['NameType'] ?> </td> -->
          <td><img src="upload/images/<?php echo $row['imageProduct']?>" alt="avatar" style="height:50px; width:50px; "></td>
          <td style="text-align:right;">
            <a href="admin.php?c=product&a=edit&id=<?php echo $row['id'];?>" class="btn btn-success button"> Edit </a>
            <a href="admin.php?c=product&a=delete&id=<?php echo $row['id'];?>" class="btn btn-danger button"> Delete </a>
          </td>
        </tr>

        <?php
      }
      ?>

    </tbody>
  </table>
</div>

