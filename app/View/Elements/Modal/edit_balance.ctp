<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
                                echo '<div class="checkbox m-t-lg"><button id="btn_close_edit_balance" class="btn btn-sm btn-s-sm btn-primary pull-right text-uc m-t-n-xs" >Đóng</button></div>';
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

