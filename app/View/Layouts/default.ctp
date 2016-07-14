<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en" class="app">
    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
            <?php echo 'Money Lover | '.$title; ?>
        </title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('app.v2');
                echo $this->Html->css('font');
                echo $this->Html->css('select2/select2');
                echo $this->Html->css('select2/theme');
                echo $this->Html->script('app.v2');
                echo $this->Html->script('select2/select2.min');
                echo $this->Html->script('parsley/parsley.min');
                echo $this->Html->script('parsley/parsley.extend');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body>
        <section class="vbox">
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
            <section>
                <section class="hbox stretch"> <!-- .aside -->
                    <aside class="bg-light lter b-r aside-md hidden-print nav-xs-right" id="nav">
                        <section class="vbox">
                            <header class="header bg-primary lter text-center clearfix">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-dark btn-icon" title="New wallet">
                                        <a style="display: block;" href="/cakephp/wallets/add"><i class="fa fa-plus"></i></a>
                                    </button>
                                    <div class="btn-group hidden-nav-xs">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                            <strong>
                                                <?php 
                                                    $lengthName = strlen($selectWallet['Wallet']['name']);
                                                    if($lengthName > 15){
                                                        echo substr($selectWallet['Wallet']['name'], 0, 15).'...';
                                                    }
                                                    else{
                                                        echo $selectWallet['Wallet']['name'];
                                                    }
                                                ?>
                                            </strong>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu text-left">
                                            <?php
                                                foreach ($wallets as $item){
                                                    //total money
                                                    $cong = 0;
                                                    $tru = 0;
                                                    $text = '';
                                                    foreach($transactionbyusers as $transaction){
                                                        if($transaction['Transaction']['wallet_id'] == $item['Wallet']['id']){
                                                            if($transaction['Category']['user_id'] == $user['User']['id']){
                                                                if($transaction['Category']['type'] == 0){
                                                                    $tru += $transaction['Transaction']['amount'];
                                                                }
                                                                if($transaction['Category']['type'] == 1){
                                                                    $cong += $transaction['Transaction']['amount'];
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo '<li';
                                                    if($item['Wallet']['id'] == $selectWallet['Wallet']['id']){
                                                        $text = '<i class="fa fa-check-circle text-primary pull-right" style="margin-top: 3px;"></i>';
                                                        echo ' class="active"';
                                                    }
                                                    echo '>';
                                                    echo $this->Form->postLink(
                                                            '<strong>'.$item['Wallet']['name'].' '.$text.'</strong></br><span class="span-transactions text-info">'.CakeNumber::currency(($item['Wallet']['initial_total'] + $cong - $tru), '', array('places' => '0')).'</span>',
                                                            array(
                                                                'controller' => 'wallets',
                                                                'action' => 'selectwallet',
                                                                $item['Wallet']['id']),
                                                            array(
                                                                'escape' => FALSE));
                                                    echo '</li>';
                                                }
                                            ?>
                                            <li class="divider"></li>
                                            <li><a href="/cakephp/wallets/index"><i class="fa fa-credit-card icon"></i> Quản lý ví</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <section class="w-f scrollable">
                                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0"
                                     data-size="5px" data-color="#333333"> <!-- nav -->
                                    <nav class="nav-primary hidden-xs">
                                        <ul class="nav">
                                            <li class="link-home">
                                                <a href="/cakephp/transactions/index">
                                                    <i class="fa fa-key icon">
                                                        <b class="bg-primary"></b>
                                                    </i>
                                                    <span>SỔ GIAO DỊCH</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-minus-circle icon">
                                                        <b class="bg-primary"></b>
                                                    </i>
                                                    <span>SỔ NỢ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cakephp/categorys/index">
                                                    <i class="fa fa-book icon">
                                                        <b class="bg-primary"></b>
                                                    </i>
                                                    <span>DANH MỤC</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cakephp/report/index">
                                                    <i class="fa fa-signal icon">
                                                        <b class="bg-primary"></b>
                                                    </i>
                                                    <span>BÁO CÁO</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cakephp/users/profile">
                                                    <i class="fa fa-user icon">
                                                        <b class="bg-primary"></b>
                                                    </i>
                                                    <span>TÀI KHOẢN</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </section>
                            <footer class="footer lt hidden-xs b-t b-light">
                                <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-default btn-icon"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-right text-active"></i> </a>
                            </footer>
                        </section>
                    </aside>
                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">
                            <?php echo $this->fetch('content'); ?>
                        </section>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                    </section>
                    <aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>
                </section>
            </section>
        </section>
        
        <!--Model Edit Balance-->
        <div class="modal fade m-t-xxl" id="modal-edit-balance">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="page-header m-t-xs" style="font-weight: 600;">
                                    <i class="fa fa-foursquare"></i> ĐIỀU CHỈNH SỐ DƯ
                                </h5>
                                <?php
                                    if(sizeof($wallets) == 0){
                                        echo '<strong class="text-danger">Bạn không có ví nào</strong>';
                                        echo '<div class="checkbox m-t-lg"><button id="btn_close_tranfer" class="btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs" >Đóng</button></div>';
                                    } else{
                                        echo $this->Form->create(
                                            'Wallet',
                                            array(
                                                'action' => 'changeinitialtotal',
                                                'data-validate' => 'parsley'));
                                        echo $this->Form->input(
                                                'initial_total',
                                                array(
                                                    'label' => 'Số dư hiện tại',
                                                    'div' => array(
                                                        'class' => 'form-group'),
                                                    'class' => 'form-control',
                                                    'data-required' => 'true',
                                                    'data-required-message' => 'Trường số tiền không được để trống',
                                                    'data-type' => 'number',
                                                    'data-type-number-message' => 'Phải nhập đúng định dạng số',
                                                    'value' => $selectWallet['Wallet']['initial_total']));
                                        echo $this->Form->submit(
                                            'Đồng ý',
                                            array(
                                                'div' => array(
                                                    'class' => 'checkbox m-t-lg',),
                                                'class' => 'btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs'));
                                        echo $this->Form->end();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/-->
        <!--Model Tranfer money-->
        <div class="modal fade m-t-xxl" id="modal-tranfer-money">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="page-header m-t-xs" style="font-weight: 600;">
                                    <i class="fa fa-foursquare"></i> CHUYỂN TIỀN ĐẾN VÍ KHÁC
                                </h5>
                                <?php
                                    if(sizeof($wallets) == 0){
                                        echo '<strong class="text-danger">Bạn không có ví nào</strong>';
                                        echo '<div class="checkbox m-t-lg"><button id="btn_close_tranfer" class="btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs" >Đóng</button></div>';
                                    }
                                    else if(sizeof($wallets) == 1){
                                        echo '<strong class="text-danger">Bạn chỉ có một ví</strong>';
                                        echo '<div class="checkbox m-t-lg"><button id="btn_close_tranfer" class="btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs" >Đóng</button></div>';
                                    } else{
                                        echo $this->Form->create(
                                                'Transaction',
                                                array(
                                                    'action' => 'tranfermoney',
                                                    'data-validate' => 'parsley'
                                                ));
                                        echo $this->Form->input(
                                                'from_wallet',
                                                array(
                                                    'label' => 'Từ',
                                                    'div' => array(
                                                        'class' => 'form-group m-b-sm'),
                                                    'class' => 'form-control text-lg',
                                                    'readonly' => TRUE,
                                                    'value' => $selectWallet['Wallet']['name']));
                                        $to_wallets = Set::combine($wallets, '{n}.Wallet.id', '{n}.Wallet.name');
                                        echo $this->Form->input(
                                                'to_wallet',
                                                array(
                                                    'label' => array(
                                                        'text' => 'Đến',
                                                        'class' => 'label-maxwidth'),
                                                    'div' => array(
                                                        'class' => 'form-group m-b-sm'),
                                                    'id' => 'slToWallet',
                                                    'options' => $to_wallets,
                                                    'empty' => 'Chọn ví',
                                                    'style' => 'width: 100%;',
                                                    'data-required' => 'true',
                                                    'data-required-message' => 'Bạn cần chọn Ví chuyển đến'));
                                        echo $this->Form->input(
                                                'amount',
                                                array(
                                                    'label' => 'Số tiền',
                                                    'div' => array(
                                                        'class' => 'form-group m-b-sm'),
                                                    'class' => 'form-control text-lg',
                                                    'data-required' => 'true',
                                                    'data-required-message' => 'Trường số tiền không được để trống',
                                                    'data-type' => 'number',
                                                    'data-type-number-message' => 'Phải nhập đúng định dạng số',
                                                    'data-min' => '1',
                                                    'data-min-message' => 'Phải nhập số tiền > 0'));
                                        echo $this->Form->input(
                                                'description',
                                                array(
                                                    'label' => 'Ghi chú',
                                                    'div' => array(
                                                        'class' => 'form-group m-b-sm'),
                                                    'type' => 'textarea',
                                                    'rows' => '3',
                                                    'class' => 'form-control text-lg'));
                                        echo $this->Form->submit(
                                            'Đồng ý',
                                            array(
                                                'div' => array(
                                                    'class' => 'checkbox m-t-lg',),
                                                'class' => 'btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs'));
                                        echo $this->Form->end();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/-->
        <script type="text/javascript">
            $(document).ready(function(){
                if(window.location.href.lastIndexOf("/") === window.location.href.length - 1)
                {
                    $(".link-home").addClass("active");
                }
                else
                {
                    $(".nav-primary .nav li a").each(function(){
                        if(!$(this).attr("href").match("/$") && window.location.href.indexOf($(this).attr("href")) >= 0)
                        {
                            if($(this).parent().parent().parent().is("li"))
                            {
                                $(this).parent().parent().parent().addClass("active");
                            }
                            else
                            {
                                $(this).parent().addClass("active");
                            }
                        }
                    });
                }
            });
            $('#slToWallet').select2();
            $('#btn_close_tranfer').click(function(){
                $('#modal-tranfer-money').modal('toggle');
            });
       </script>
    </body>
</html>
