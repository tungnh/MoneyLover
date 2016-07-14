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
            echo '<li>CHỈNH SỬA</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                    <?php
                        if($this->request->data != NULL){
                            echo $this->Form->create(
                                    'User',
                                    array(
                                        'type' => 'post',
                                        'class' => 'form-horizontal',
                                        'enctype' => 'multipart/form-data',
                                        'data-validate' => 'parsley'));
                    ?>
                    <h5 class="page-header m-t-xs" style="font-weight: 600;">
                        <i class="fa fa-foursquare"></i> THÔNG TIN TÀI KHOẢN
                    </h5>
                    <?php
                        echo $this->Form->input(
                                'first_name',
                                array(
                                    'label' => 'Họ',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Họ không được để trống',
                                    'data-maxlength' => '50',
                                    'data-maxlength-message' => 'Trường Họ không được quá 50 ký tự'));
                        echo $this->Form->input(
                                'last_name',
                                array(
                                    'label' => 'Tên',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường Tên không được để trống',
                                    'data-maxlength' => '50',
                                    'data-maxlength-message' => 'Trường Tên không được quá 50 ký tự'));
                        echo $this->Form->input(
                                'email',
                                array(
                                    'label' => 'Email',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'disabled' => 'disabled',
                                    'required' => FALSE));
                        echo $this->Form->input(
                                'about',
                                array(
                                    'label' => 'Thông tin khác',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'type' => 'textarea',
                                    'rows' => '3',
                                    'class' => 'form-control input-sm text-lg parsley-validated'));
                    ?>
                    <div class="form-group m-b-xs p-a">
                        <label class="label-maxwidth">Ảnh đại diện</label>
                        <div class="input-file-row-1">
                            <div class="upload-file-container">
                                <?php
                                    echo $this->Html->image(
                                            Configure::read('FOLDER_IMG_USER_UPLOAD').$this->request->data['User']['avatar'],
                                            array(
                                                'id' => 'preview_image'));
                                ?>
                                <div class="upload-file-container-text">
                                    <div class='one_opacity_0'>
                                        <?php
                                            echo $this->Form->input(
                                                    'avatar',
                                                    array(
                                                        'label' => FALSE,
                                                        'div' => FALSE,
                                                        'type' => 'file',
                                                        'id' => 'file_avatar',
                                                        'style' => 'line-height: 1.5; padding: 5px 10px; font-size: 12px;'));
                                        ?>
                                    </div>
                                    <button class="btn btn-sm btn-default btn-s-sm pull-left" style="width: 150px;">
                                        <i class="fa fa-pencil"></i><strong> Chọn ảnh</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
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
    
    $(function () {
        function readURL(input, target) {
            var size = input.files[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var image_target = $(target);
                reader.onload = function (e) {
                    image_target.attr('src',
                            e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("body").on("change", "#file_avatar", function () {
            readURL(this, "#preview_image")
        });
    });
</script>
