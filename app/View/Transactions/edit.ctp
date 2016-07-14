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
                    '<i class="fa fa-key"></i><strong> SỔ GIAO DỊCH</strong>',
                    array(
                        'controller' => 'transactions',
                        'action' => 'index'),
                    array(
                        'escape' => FALSE));
            echo '</li>';
            echo '<li>SỬA GIAO DỊCH</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                    <?php
                        echo $this->Form->create(
                                'Transaction',
                                array(
                                    'method' => 'post',
                                    'name' => 'form',
                                    'class' => 'form-horizontal',
                                    'data-validate' => 'parsley'));
                    ?>
                    <h5 class="page-header m-t-xs" style="font-weight: 600;">
                        <i class="fa fa-foursquare"></i> THÔNG TIN GIAO DỊCH
                    </h5>
                    <?php
                        echo $this->Form->input(
                                'type',
                                array(
                                    'label' => array(
                                        'text' => 'Nhóm',
                                        'class' => 'label-maxwidth'),
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                        'id' => 'slTypeCategory',
                                        'options' => array(0 => 'Chi tiêu', 1 => 'Thu Nhập'),
                                        'onchange' => 'javascript: changeType();',
                                        'empty' => 'Chọn nhóm',
                                        'style' => 'width: 246px;'));
                        echo $this->Form->input(
                                'category_id',
                                array(
                                    'label' => array(
                                        'text' => 'Danh mục',
                                        'class' => 'label-maxwidth'),
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'id' => 'slCategory',
                                    'options' => $categorys,
                                    'empty' => 'Chọn danh mục',
                                    'style' => 'width: 246px;',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Bạn cần chọn danh mục'));
                        echo $this->Form->input(
                                'amount',
                                array(
                                    'label' => 'Số tiền giao dịch',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Số tiền giao dịch không được để trống',
                                    'data-type' => 'number',
                                    'data-type-number-message' => 'Phải nhập đúng định dạng số',
                                    'data-min' => '1',
                                    'data-min-message' => 'Phải nhập số tiền > 0'));
                        echo $this->Form->input(
                                'description',
                                array(
                                    'type' => 'textarea',
                                    'rows' => '3',
                                    'label' => 'Ghi chú',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated'));
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
                                echo $this->Form->end();
                                echo " ";
                                if($this->request->data != NULL){
                                    echo $this->Form->postLink(
                                        "Xóa",
                                        array(
                                            'controller' => 'transactions',
                                            'action' => 'delete',
                                            $this->request->data['Transaction']['id']),
                                        array(
                                            'confirm' => 'Bạn có thực sự muốn xóa',
                                            'class' => 'btn btn-sm btn-s-sm btn-danger', 
                                            'escape' => false));
                                }
                                echo " ";
                                echo $this->Html->link(
                                        "Hủy bỏ",
                                        array(
                                            "controller" => "transactions", 
                                            "action" => "index"),
                                        array(
                                            "class" => "btn btn-sm btn-s-sm btn-danger", 
                                            "escape" => false));
                            ?>
                        </div>
                    </div>
                    <?php
                        //echo $this->Form->end();
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>
<script>
    $('#slTypeCategory').select2();
    $('#slCategory').select2();
    $(function(){
        //changeType();
    });
    
    function changeType(){
        var url = "/cakephp/transactions/getcategorybytype/" + $('#slTypeCategory').val();
        $('#slCategory').load(url, function(data){});
    }
</script>
