<div class="alert alert-danger hide" style="margin-left: -20px;">
</div>
<div class="alert alert-success hide" style="margin-left: -20px;">
</div>
<div class="row" style="padding-bottom: 50px;padding-top: 50px;">
    <div class="col-sm-12 mt30 mb30">
        <h2 class="text-center no-margin mb20-xs" style="color: #99cc00; font-weight: bold;">Đăng Nhập</h2>

    </div>
    <div class="col-sm-12">
        <form class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="Username">Tài Khoản: </label>
                     <div class="col-sm-4 ">
                        <input class="form-control checkout-form-border username" id="Username"
                           name="Username" placeholder="emailexample@example.com" type="text">
                    </div>    
                </div>
                   
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="Password">Mật khẩu:</label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border pwd" id="Password" name="Password"
                               placeholder="Password" type="password">
                    </div>
                </div>
<!-- 
                <input class="btn btn-lg btn-success col-sm-1 col-sm-offset-5" type="submit" value="Đăng nhập"> -->
                <button type="button" class="loginButton btn-primary col-sm-1 col-sm-offset-5">Đăng Nhập</button>
            </fieldset>
        </form>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        $('.loginButton').click(function(){
            // Lấy dữ liệu
            var data = {
                email : $('.username').val(),
                password : $('.pwd').val()
            };
            console.log(data)
            $.ajax({
                type : "POST",
                dataType: "JSON",
                url : "index.php?c=session&a=login",
                data : data,
                success : function(result)
                {
                    if (result.hasOwnProperty('error') && result.error == '1'){
                        var html = '';
                        $.each(result,function(key, item){
                            if (key != 'error'){
                                html += '<li>'+item+'</li>';
                            }
                        });
                        $('.alert-danger').html(html).removeClass('hide');
                        $('.alert-success').addClass('hide');
                        console.log(result);
                    }
                    else{ // Thành công
                        console.log(result);
                      window.location.href = "index.php?c=home";
                  }
              }
          });
        });
    });
</script>