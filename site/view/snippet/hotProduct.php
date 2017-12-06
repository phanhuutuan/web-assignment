<div id="hot-product">
    <div class="row">
        <div class="col-md-8">
            <h2>Sản phẩm bán chạy</h2>
        </div>
        <div class="col-md-4">
            <a href="index.php?c=home&a=searchByType&key=newest" class="glyphicon glyphicon-th viewAllProduct"> VIEW ALL PRODUCT</a>
        </div>
    </div>
    <div class="row">
        
        <?php 
        for ($i=0; $i < $products->rowCount(); $i++) { 
            $row = $products->fetch();
            include PATH_APPLICATION."/view/snippet/productRow.php";

        }
        ?>
    </div>
</div>