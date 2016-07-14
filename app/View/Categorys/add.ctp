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
                    '<i class="fa fa-book"></i><strong> DANH MỤC</strong>',
                    array(
                        'controller' => 'categorys',
                        'action' => 'index'),
                    array(
                        'escape' => FALSE));
            echo '</li>';
            echo '<li>THÊM DANH MỤC</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel-body">
                    <?php
                        echo $this->Form->create(
                                'Category',
                                array(
                                    'type' => 'post',
                                    'class' => 'form-horizontal',
                                    'data-validate' => 'parsley'));
                    ?>
                    <h5 class="page-header m-t-xs" style="font-weight: 600;">
                        <i class="fa fa-foursquare"></i> THÔNG TIN DANH MỤC
                    </h5>
                    <?php
                        echo $this->Form->input(
                                'name',
                                array(
                                    'label' => 'Tên danh mục',
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'class' => 'form-control input-sm text-lg parsley-validated',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Trường tên danh mục không được để trống'));
                        echo $this->Form->input(
                                'type',
                                array(
                                    'label' => array(
                                        'text' => 'Nhóm',
                                        'class' => 'label-maxwidth'),
                                    'div' => array(
                                        'class' => 'form-group m-b-sm p-a'),
                                    'id' => 'slCategoryType',
                                    'options' => array(0 => 'Chi tiêu', 1 => 'Thu Nhập'),
                                    'empty' => 'Chọn nhóm',
                                    'style' => 'width: 246px;',
                                    'data-required' => 'true',
                                    'data-required-message' => 'Bạn cần chọn một loại'));
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
                                        array("controller" => "categorys", "action" => "index"),
                                        array("class" => "btn btn-sm btn-danger btn-s-sm", "style" => "width: 90px;", "escape" => false));
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    echo $this->Form->end();
                ?>
            </section>
        </div>
    </div>
</section>
<script>
    $('#slCategoryType').select2();
</script>