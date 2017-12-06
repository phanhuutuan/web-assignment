<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
	<div class="pitem" style="margin-top: 30px ">
		<a href="index.php?c=product&a=showDetail&id=<?php echo $row['id'] ?>">            
		<img class="img-responsive" style="max-width: 100%;height: auto; width: auto\9;" src="upload/images/<?php echo $row['imageProduct']; ?>" alt="Áo Thun Nam">
		</a>        
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
				<p class="characteristics">
					<b> SL còn : <?php echo $row['Quantity']; ?> </b> / <?php echo $row['Name']; ?>
				</p>
			</div>
			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-right">
				<p class="price">
					Giá: <?php echo $row['Price'];?>
				</p>
			</div>
		</div>
		<div class="row">
			<a href="index.php?c=cart&a=addToCart&id=<?php echo $row['id'] ?>"><button class="button" style="vertical-align:middle"><span>Mua Ngay</span></button></a>
		</div>        
	</div>
</div>
