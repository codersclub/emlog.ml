<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-xl-6 col-lg-10 col-md-9">
            <div class="card o-hidden border-1 shadow my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">找回密码：验证邮箱</h1>
                                </div>
                                <form method="post" class="user" action="./account.php?action=doreset">
                                    <?php if (isset($_GET['error_mail'])): ?>
                                        <div class="alert alert-danger">错误的注册邮箱</div><?php endif ?>
                                    <?php if (isset($_GET['error_sendmail'])): ?>
                                        <div class="alert alert-danger">邮件验证码发送失败，请检查邮件通知设置</div><?php endif ?>
                                    <?php if (isset($_GET['err_ckcode'])): ?>
                                        <div class="alert alert-danger">图形验证码错误</div><?php endif ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="mail" name="mail" aria-describedby="emailHelp" placeholder="输入注册邮箱"
                                            required
                                            autofocus>
                                    </div>
                                    <?php if ($login_code): ?>
                                        <div class="form-group form-inline">
                                            <input type="text" name="login_code" class="form-control form-control-user" id="login_code" placeholder="验证码" required>
                                            <img src="../include/lib/checkcode.php" id="checkcode" class="mx-2">
                                        </div>
                                    <?php endif ?>
                                    <button class="btn btn-success btn-user btn-block" type="submit">提交</button>
                                    <hr>
                                    <div class="text-center"><a class="small" href="./">登录</a></div>
                                    <hr>
                                    <div class="text-center"><a href="../" class="small" role="button">&larr;返回首页</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<script>
    $(function() {
        setTimeout(hideActived, 6000);
        $('#checkcode').click(function() {
            var timestamp = new Date().getTime();
            $(this).attr("src", "../include/lib/checkcode.php?" + timestamp);
        });
    });
</script>