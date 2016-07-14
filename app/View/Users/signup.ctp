<!DOCTYPE html>
<html lang="en" class="bg-primary">
    <head>
        <meta charset="utf-8" />
        <title>MONEY LOVER | Đăng ký</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php
	echo $this->Html->meta('icon');
        echo $this->Html->css('app.v2');
        echo $this->Html->css('font');
        echo $this->Html->script('app.v2');
        echo $this->Html->script('parsley/parsley.min');
        echo $this->Html->script('parsley/parsley.extend');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
    ?>
    </head>
    <body>
        <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
            <div class="container aside-xxl">
                <a class="navbar-brand block" href="index.html"><?php echo $this->Html->image('icon-wage.png')?> MONEY LOVER</a>
                <section class="panel panel-default m-t-xs bg-white">
                    <header class="panel-heading text-center">
                        <strong>ĐĂNG KÝ</strong>
                    </header>
                <?php
                    echo $this->Form->create('User', array('type' => 'post', 'class' => 'panel-body wrapper-lg', 'data-validate' => 'parsley'));
                ?>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Họ</label>
                        <?php
                            echo $this->Form->input('first_name', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'placeholder' => 'Họ',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Họ không được để trống',
                                        'data-maxlength' => '50',
                                        'data-maxlength-message' => 'Trường Họ phải có độ dài không quá 50 ký tự'));
                        ?>
                    </div>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Tên</label>
                        <?php
                            echo $this->Form->input('last_name', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'placeholder' => 'Tên',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Tên không được để trống',
                                        'data-maxlength' => '50',
                                        'data-maxlength-message' => 'Trường Tên phải có độ dài không quá 50 ký tự'));
                        ?>
                    </div>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Email</label>
                        <?php
                            echo $this->Form->input('email', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'placeholder' => 'test@example.com',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Email không được để trống',
                                        'data-type' => 'Email',
                                        'data-type-email-message' => 'Phải nhập vào đúng định dạng Email',
                                        'data-maxlength' => '100',
                                        'data-maxlength-message' => 'Trường Email phải có độ dài không quá 100 ký tự'));
                        ?>
                    </div>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Mật khẩu</label>
                        <?php
                            echo $this->Form->input('password', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'id' => 'password',
                                        'type' => 'password',
                                        'placeholder' => 'Mật khẩu',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Mật khẩu không được để trống',
                                        'data-maxlength' => '50',
                                        'data-maxlength-message' => 'Trường Mật khẩu phải có độ dài không quá 50 ký tự'));
                        ?>
                    </div>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Nhập lại mật khẩu</label>
                        <?php
                            echo $this->Form->input('re_password', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'type' => 'password',
                                        'placeholder' => 'Nhập lại mật khẩu',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Nhập lại mật khẩu không được để trống',
                                        'data-maxlength' => '50',
                                        'data-maxlength-message' => 'Trường Nhập lại mật khẩu phải có độ dài không quá 50 ký tự',
                                        'data-equalto' => '#password',
                                        'data-equalto-message' => 'Xác nhận mật khẩu không chính xác'));
                        ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <?php 
                                echo $this->Form->input('ckc_igree', 
                                    array(
                                        'label'=>false, 
                                        'div' => false,
                                        'type'=>'checkbox',
                                        'after' => "Tôi đồng ý với các điều khoản ",
                                        'data-required' => 'true',
                                        'data-required-message' => 'Đồng ý với các điều khoản của chúng tôi')); 
                            ?>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-s-sm btn-primary ">Đăng ký</button>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center">
                        <small>Bạn đã có tài khoản?</small>
                    </p>
                    <?php
                        echo $this->Html->link(
                                "Đăng nhập",
                                array("controller" => "users", "action" => "login"),
                                array("class" => "btn btn-success btn-block")
                                );
                        echo $this->Form->end();
                    ?>
                </section>
            </div>
        </section>
    </body>
</html>