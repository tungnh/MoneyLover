<!DOCTYPE html>
<html lang="en" class="bg-primary">
    <head>
        <meta charset="utf-8" />
        <title>MONEY LOVER | Đăng nhập</title>
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
                        <strong>ĐĂNG NHẬP</strong>
                    </header>
                <?php
                    echo $this->Form->create('User', array('type' => 'post', 'class' => 'panel-body wrapper-lg', 'data-validate' => 'parsley'));
                ?>
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
                                        'data-type-email-message' => 'Phải nhập vào đúng định dạng Email'));
                        ?>
                    </div>
                    <div class="form-group m-b-sm">
                        <label class="control-label">Mật khẩu</label>
                        <?php
                            echo $this->Form->input('password', 
                                    array(
                                        'label' => FALSE, 
                                        'div' => FALSE, 
                                        'type' => 'password',
                                        'placeholder' => 'Mật khẩu',
                                        'class' => 'form-control input-lg text-lg', 
                                        'style' => 'height: 35px;',
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Mật khẩu không được để trống'));
                        ?>
                    </div>
                    <?php
                        echo $this->Html->link('<small class="text-danger">Quên mật khẩu?</small>',
                                array(
                                    'controller' => 'users', 
                                    'action' => 'forgotpassword'),
                                array(
                                    'class' => 'pull-right m-t-xs',
                                    'escape' => FALSE));
                    ?>
                    <button type="submit" class="btn btn-s-sm btn-primary ">Đăng nhập</button>
                    <!--<div class="line line-dashed"></div>
                    <a href="#" class="btn btn-facebook btn-block m-b-sm">
                        <i class="fa fa-facebook pull-left"></i>Đăng nhập với Facebook</a>
                    <a href="#" class="btn btn-gplus btn-block">
                        <i class="fa fa-google-plus pull-left"></i>Đăng nhập với Google</a>-->
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center">
                        <small>Bạn chưa có tài khoản?</small>
                    </p>
                    <?php
                        echo $this->Html->link(
                                "Đăng ký",
                                array("controller" => "users", "action" => "signup"),
                                array("class" => "btn btn-success btn-block")
                                );
                        echo $this->Form->end();
                    ?>
                </section>
            </div>
        </section>
    </body>
</html>

