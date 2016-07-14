<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $thu = 0;
    $chi = 0;
    $sotienbandau = $selectWallet['Wallet']['initial_total'];
    foreach ($transactions as $item){
        if($item['Category']['type'] == 0){
            $chi += $item['Transaction']['amount'];
        }
    }
    foreach ($transactions as $item){
        if($item['Category']['type'] == 1){
            $thu += $item['Transaction']['amount'];
        }
    }
?>
<section class="scrollable padder w-f">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <?php
            echo '<li>';
            echo $this->Html->link(
                    '<i class="fa fa-key"></i><strong> SỔ GIAO DỊCH</strong>',
                    array(
                        'controller' => 'transactions',
                        'action' => 'index'),
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
                                "<i class=\"fa fa-plus\"></i> Thêm giao dịch",
                                array("controller" => "transactions", "action" => "add"),
                                array("class" => "btn btn-sm btn-s-sm btn-primary", "style" => "font-weight: bold;", "escape" => false));
                        ?>
                    </div>
                </div>
            </div>
            <section class="panel" style="border: 1px solid #65bd77">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <h5 class="page-header m-t-xs" style="font-weight: 600;">
                            <i class="fa fa-hand-o-right"></i> TỔNG QUAN
                        </h5>
                        <div class="form-group m-b-xs">
                            <span class="control-span span-transactions m-l">SỐ DƯ BAN ĐẦU</span>
                            <label class="pull-right text-info m-r"><?php echo CakeNumber::currency($sotienbandau, '', array('places' => '0')); ?></label>
                        </div>
                        <div class="form-group m-b-xs">
                            <span class="control-span span-transactions m-l">THU NHẬP</span>
                            <label class="pull-right text-info m-r"><?php echo CakeNumber::currency($thu, '', array('places' => '0')); ?></label>
                        </div>
                        <div class="form-group m-b-xs">
                            <span class="control-span span-transactions m-l">CHI TIÊU</span>
                            <label class="pull-right text-danger m-r"><?php echo CakeNumber::currency($chi, '', array('places' => '0')); ?></label>
                        </div>
                        <div class="form-group m-b-xs">
                            <hr style="width: 50%; margin: 0px 15px;" class="pull-right">
                        </div>
                        <div class="form-group m-b-xs">
                            <label class="pull-right m-r"><?php echo CakeNumber::currency($sotienbandau+$thu-$chi, '', array('places' => '0')); ?></label>
                        </div>
                    </form>
                </div>
            </section>
            <?php
                foreach($categorys as $category){
                    $total = 0;
                    $check = FALSE;
                    $text_style = 'text-danger';
                    if($category['Category']['type'] == 1){
                        $text_style = 'text-info';
                    }
                    foreach ($transactions as $item){
                        if($category['Category']['id'] == $item['Transaction']['category_id']){
                            $check = TRUE;
                            $total += $item['Transaction']['amount'];
                        }
                    }
                    if($check){
            ?>
            <section class="panel panel-default m-b-sm">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <h5 class="page-header m-t-xs" style="font-weight: 600;">
                            <i class="fa <?php if($category['Category']['type'] == 0){ echo 'fa-plus-circle text-info';} else {echo 'fa-minus-circle text-danger';}?>"></i> <?php echo $category['Category']['name']?>
                            <span class="pull-right"><?php echo CakeNumber::currency($total, '', array('places' => '0'));?></span>
                        </h5>
                        <?php
                            foreach ($transactions as $transaction){
                                if($transaction['Transaction']['category_id'] == $category['Category']['id']){
                        ?>
                        <div class="form-group m-b-sm">
                            <?php
                                echo $this->Html->link(
                                        '<div>
                                            <span class="control-span m-l">'.$this->Time->format($transaction['Transaction']['upd_datetime'], '%d thg %m, %Y %H:%M %p').'</span>
                                            <label class="pull-right '.$text_style.' m-r" style="cursor: pointer;">'.CakeNumber::currency($transaction['Transaction']['amount'], '', array('places' => '0')).'</label>
                                        </div>
                                        <div>
                                            <span class="span-transactions pull-left m-l" style="font-size: 12px;">'.$transaction['Transaction']['description'].'</span>
                                        </div>',
                                        array(
                                            'controller' => 'transactions',
                                            'action' => 'edit',
                                            $transaction['Transaction']['id']),
                                        array(
                                            'escape' => FALSE));
                            ?>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </form>
                </div>
            </section>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</section>