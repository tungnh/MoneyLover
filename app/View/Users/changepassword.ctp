<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
            echo '<li>ĐỔI MẬT KHẨU</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                    <?php
                        echo $this->Form->create(
                                'User',
                                array(
                                    'type' => 'post',
                                    'class' => 'form-horizontal',
                                    'data-validate' => 'parsley'));
                    ?>
                    <h5 class="page-header m-t-xs" style="font-weight: 600;">
                        <i class="fa fa-foursquare"></i> THÔNG TIN MẬT KHẨU
                    </h5>
                    <?php
                        echo $this->Form->input(
                                'current_password',
                                array(
                                    'label' => 'Mật khẩu hiện tại',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'type' => 'password',
                                    'placeholder' => 'Mật khẩu hiện tại',
                                    'required' => FALSE,
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Mật khẩu hiện tại không được để trống',
                                    'data-maxlength' => '50',
                                    'data-maxlength-message' => 'Trường Mật khẩu hiện tại không được quá 50 ký tự'));
                        echo $this->Form->input(
                                'password',
                                array(
                                    'label' => 'Mật khẩu mới',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'type' => 'password',
                                    'placeholder' => 'Mật khẩu mới',
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'id' => 'password',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Mật khẩu mới không được để trống',
                                    'data-maxlength' => '50',
                                    'data-maxlength-message' => 'Trường Mật khẩu mới không được quá 50 ký tự'));
                        echo $this->Form->input(
                                're_password', 
                                    array(
                                        'label' => 'Nhập lại mật khẩu', 
                                        'div' => array(
                                            'class' => 'form-group m-b-sm p-a'), 
                                        'type' => 'password',
                                        'placeholder' => 'Nhập lại mật khẩu',
                                        'class' => 'form-control input-sm text-lg parsley-validated', 
                                        'data-required' => 'true',
                                        'data-required-message' => 'Trường Nhập lại mật khẩu không được để trống',
                                        'data-maxlength' => '50',
                                        'data-maxlength-message' => 'Trường Nhập lại mật khẩu phải có độ dài không quá 100 ký tự',
                                        'data-equalto' => '#password',
                                        'data-equalto-message' => 'Xác nhận mật khẩu không chính xác'));
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
                                            "controller" => "users", 
                                            "action" => "profile"),
                                        array(
                                            "class" => "btn btn-sm btn-s-sm btn-danger", 
                                            "escape" => false));
                            ?>
                        </div>
                    </div>
                    <?php
                        echo $this->Form->end();
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>
<script>
    $('#slCategoryType').select2();
</script>

