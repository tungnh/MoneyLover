<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
