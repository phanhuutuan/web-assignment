<div class="row">
    <div class="col-sm-12 mt30 mb30">
        <h2 class="text-center no-margin mb20-xs" style="color: #c2d44e; font-weight: bold;">Đăng Ký</h2>

    </div>
    <div class="col-sm-12">
        <form class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputUsername">Tên tài khoản *</label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border" id="inputUsername"
                               name="inputUsername" placeholder="" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputPassword">Mật khẩu *</label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border" id="inputPassword" name="inputPassword"
                               placeholder="" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputConfirmedPassword">Nhập lại mật khẩu *</label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border" id="inputConfirmedPassword" name="inputConfirmedPassword"
                               placeholder="" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputphone">Số điện thoại *</label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border" id="inputphone" name="inputphone"
                               placeholder="" type="number">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="inputemail">Email* </label>
                    <div class="col-sm-4">
                        <input class="form-control checkout-form-border" id="inputemail" name="inputemail"
                               placeholder="" type="email">
                    </div>
                </div>
                <div class="col-sm-8 col-sm-offset-4">
                    <div class="Finalize">
                        <button type="button" class="col-sm-4 btn btn-primary registerButton"
                                style="font-weight: bold; margin-bottom: 20px;"> Đăng ký
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        $('.registerButton').click(function(){
            // Lấy dữ liệu
            var data = {
                phone : $('#inputphone').val(),
                email : $('#inputemail').val(),
                userName : $('#inputUsername').val(),
                password : $('#inputPassword').val(),
                confirmPassword : $('#inputConfirmedPassword').val()

            };
            $.ajax({
                type : "POST",
                dataType: "JSON",
                url : "index.php?c=session&a=register",
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
                    }
                    else{ // Thành công
                      window.location.href = "index.php?c=home";
                  }
              }
          })
        })
    })
</script>