<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
                                            'data-validate' => 'parsley')); 
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
