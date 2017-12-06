<!-- header -->
<div class="header">
    <div class="container-fluid">
    </div>
</div>
<!-- //header -->

<!-- header-bot -->
<div class="header-bot" style="background-color: #ebebe0">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.php?c=home"><img src="upload/images/bkshop_logo.png"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="Tìm kiếm sản phẩm, thương hiệu hay nhãn hàng mong muốn …" placeholder="Tìm kiếm sản phẩm, thương hiệu hay nhãn hàng mong muốn …" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm sản phẩm, thương hiệu hay nhãn hàng mong muốn …';}" required="">
                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right">
            <ul>
                <?php if (!(isset($_SESSION['valid']) && $_SESSION['valid'] == true)){?>
                <li class="dropdown"><a href="#"><span class="glyphicon glyphicon-user"></span><b>Tài khoản</b></a>
                    <div class="dropdown-content">
                        <a href="index.php?c=home&a=login">Đăng nhập</a>
                        <a href="index.php?c=home&a=register">Đăng kí</a>
                    </div>
                </li>
                <?php } else {?>
                        <div class="col-xs-4">                  
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="h-avatar img-circle img-responsive" style="height: 50px" alt="Admin Avatar" src="upload/images/<?php echo $_SESSION['current_user']['avatar']?>" /></a>
                                <ul class="dropdown-menu">
                                    <li><a href='index.php?c=session&a=edit'>
                                  <i class='fa fa-user'></i>
                                  Thông tin tài khoản
                                </a></li>
                                <?php if (isset($_SESSION['current_user'])){
                                    if ($_SESSION['current_user']['type']== "admin"){
                                ?>
                                    <li><a href='admin.php?c=member'>
                                        <i class='fa fa-cog'></i>
                                        Trang admin
                                      </a></li>
                                <?php } 
                                    } ?>
                                <li role="separator" class="divider"></li>
                                <li><a href='index.php?c=session&a=logout'>
                                  <i class='fa fa-sign-out'></i>
                                  Đăng xuất
                                </a></li>
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span><b>Giỏ hàng</b></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->