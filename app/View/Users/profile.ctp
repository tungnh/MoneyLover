<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    //echo $this->Auth->user('id');
?>
<section class="scrollable padder w-f">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <?php
            echo '<li>';
            echo $this->Html->link(
                    '<i class="fa fa-user"></i><strong> TÀI KHOẢN</strong>',
                    array(
                        'controller' => 'users',
                        'action' => 'profile'),
                    array(
                        'escape' => FALSE));
            echo '</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-6">
            <div class="row m-b-sm">
                <div class="col-lg-12">
                    <div class="pull-left">
                        <?php
                            echo $this->Html->link(
                                "<i class=\"fa fa-edit\"></i> Chỉnh sửa",
                                array("controller" => "users", "action" => "edit"),
                                array("class" => "btn btn-sm btn-s-sm btn-primary", "style" => "font-weight: bold;", "escape" => false));
                            echo ' '; 
                            echo $this->Html->link(
                                "<i class=\"fa fa-unlock\"></i> Đổi mật khẩu",
                                array("controller" => "users", "action" => "changepassword"),
                                array("class" => "btn btn-sm btn-s-sm btn-primary", "style" => "font-weight: bold;", "escape" => false));
                        ?>
                    </div>
                </div>
            </div>
            <section class="panel" style="border: 1px solid #65bd77">
                <div class="panel-body">
                    <div class="wrapper">
                        <div class="clearfix m-b">
                            <a href="#" class="pull-left thumb m-r">
                                <?php
                                    echo $this->Html->image(
                                            Configure::read('FOLDER_IMG_USER_UPLOAD').$data['User']['avatar'],
                                            array(
                                                'class' => 'img-circle'));
                                ?>
                            </a>
                            <div class="clear">
                                <div class="h3 m-t-xs m-b-xs"><?php echo $data['User']['first_name'].' '.$data['User']['last_name']; ?></div>
                                <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo $data['User']['email']; ?></small>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div>
                            <small class="text-uc text-xs text-muted">Họ</small>
                            <p><?php echo $data['User']['first_name']?></p>
                            <small class="text-uc text-xs text-muted">Tên</small>
                            <p><?php echo $data['User']['last_name']?></p>
                            <small class="text-uc text-xs text-muted">Email</small>
                            <p><?php echo $data['User']['email']?></p>
                            <small class="text-uc text-xs text-muted">Thông tin khác</small>
                            <p><?php echo $data['User']['about']?>.</p>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

