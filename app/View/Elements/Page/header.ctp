<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<header class="bg-dark dk header navbar navbar-fixed-top-xs">
    <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a>
        <?php
            echo $this->Html->link(
                    $this->Html->image('icon-wage.png').' MONEY LOVER',
                    array(
                        'controller' => 'transactions',
                        'action' => 'index'),
                    array(
                        'class' => 'navbar-brand',
                        'escape' => FALSE));
        ?>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a></div>
    <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
        <li class="dropdown hidden-xs"><a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i
                    class="fa fa-fw fa-search"></i></a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
                <section class="panel bg-white">
                    <form role="search">
                        <div class="form-group wrapper m-b-none">
                            <div class="input-group"><input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn"> <button type="submit" class="btn btn-info btn-icon">
                                        <i class="fa fa-search"></i></button> </span></div>
                        </div>
                    </form>
                </section>
            </section>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-left">
                <?php
                    echo $this->Html->image(
                            Configure::read('FOLDER_IMG_USER_UPLOAD').$user['User']['avatar'],
                            array(
                                'class' => 'preview_image'));
                ?>
                </span><?php echo $user['User']['first_name'].' '.$user['User']['last_name'];?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight"><span class="arrow top"></span>
                <li><a href="#modal-edit-balance" data-toggle="modal"><i class="fa fa-pencil pull-left" style="width: 15px;"></i> Điều chỉnh số dư</a></li>
                <li><a href="#modal-tranfer-money" data-toggle="modal"><i class="fa fa-exchange pull-left" style="width: 15px;"></i> Chuyển tiền đến ví khác</a></li>
                <li class="divider"></li>
                <li><?php echo $this->Html->link('<i class="fa fa-sign-out pull-left" style="width: 15px;"></i> Đăng xuất', array('controller' => 'users', 'action' => 'logout'), array('escape' => FALSE)); ?></li>
            </ul>
        </li>
    </ul>
</header>
