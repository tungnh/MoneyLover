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
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<section class="scrollable padder w-f">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <?php
            echo '<li>';
            echo $this->Html->link(
                    '<i class="fa fa-credit-card"></i><strong> QUẢN LÝ VÍ</strong>',
                    array(
                        'controller' => 'wallets',
                        'action' => 'index'),
                    array(
                        'escape' => FALSE));
            echo '</li>';
            echo '<li>SỬA VÍ</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                    <?php
                        if($this->request->data != NULL){
                            echo $this->Form->create(
                                    'Wallet',
                                    array(
                                        'type' => 'post',
                                        'class' => 'form-horizontal',
                                        'data-validate' => 'parsley'));
                    ?>
                    <h5 class="page-header m-t-xs" style="font-weight: 600;">
                        <i class="fa fa-foursquare"></i> THÔNG TIN VÍ
                    </h5>
                    <?php
                        echo $this->Form->input(
                                'name',
                                array(
                                    'label' => 'Tên ví',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Tên ví không được để trống'));
                        echo $this->Form->input(
                                'initial_total',
                                array(
                                    'label' => 'Số tiền ban đầu',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Số tiền ban đầu không được để trống',
                                    'data-type' => 'number',
                                    'data-type-number-message' => 'Phải nhập đúng định dạng số'));
                    ?>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group m-b-xs">
                        <div class="col-lg-6">
                            <?php
                                echo $this->Form->submit(
                                        'Lưu',
                                        array(
                                            'div' => FALSE,
                                            'class' => 'btn btn-sm btn-primary btn-s-sm'));
                                echo " ";
                                echo $this->Html->link(
                                        "Hủy bỏ",
                                        array(
                                            "controller" => "wallets", 
                                            "action" => "index"),
                                        array(
                                            "class" => "btn btn-sm btn-s-sm btn-danger", 
                                            "escape" => false));
                            ?>
                        </div>
                    </div>
                    <?php
                            echo $this->Form->end();
                        } else{
                            echo '<p class="text-danger">Dữ liệu không tồn tại</p>';
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>
<script>
    $('#slCategoryType').select2();
</script>