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
            ?>
        </ul>
        <?php
            echo $this->Form->create(
                    'Search',
                    array(
                        'url' => array(
                            'controller' => 'categorys',
                            'action' => 'search'),
                        'class' => 'bs-example form-horizontal',
                        'method' => 'post'));
        ?>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group m-b-sm">
                            <div class="col-lg-9">
                                <label class="col-lg-2 control-label" style="padding-right: 0px; text-align: left;">
                                    Tên danh mục
                                </label>
                                <?php
                                    echo $this->Form->input(
                                            'keyword',
                                            array(
                                                'label' => FALSE,
                                                'div' => array(
                                                    'class' => 'col-lg-9',
                                                    'style' => 'padding-right: 0px;'),
                                                'class' => 'form-control input-sm',
                                                'placeholder' => 'Tên danh mục',
                                                'value' => $filter));
                                ?>
                            </div>
                            <div class="col-lg-3">
                                <div class="text-center">
                                    <button type="submit" id="btn_search" class="btn btn-sm btn-s-sm btn-primary">
                                        <i class="fa fa-search"></i> <strong>Tìm kiếm</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php
            echo $this->Form->end();
        ?>
        <div class="row m-b-sm">
            <div class="col-lg-12">
                <div class="pull-left">
                    <?php
                        echo $this->Html->link(
                            "<i class=\"fa fa-plus\"></i> Thêm mới",
                            array("controller" => "categorys", "action" => "add"),
                            array("class" => "btn btn-sm btn-s-sm btn-primary", "style" => "font-weight: bold;", "escape" => false));
                    ?>
                </div>
            </div>
        </div>
        <section class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped m-b-none">
                    <thead>
                        <tr style="background-color: #65bd77; color: white;">
                            <th class="text-center" style="vertical-align: middle; width : 40px;">STT</th>
                            <th class="text-center" style="vertical-align: middle;">
                                Tên danh mục
                            </th>
                            <th class="text-center" style="vertical-align: middle; width : 100px;">
                                Phân loại
                            </th>
                            <th class="text-center" style="vertical-align: middle; width : 50px;">
                                Sửa
                            </th>
                            <th class="text-center" style="vertical-align: middle; width : 50px;">
                                Xóa
                            </th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php
                            if($data == NULL){
                            } else{
                                $i = 1;
                                foreach($data as $item){
                                    echo "<tr>";
                                    echo "<td class=\"text-center\">".$i."</td>";
                                    echo "<td>".$item['Category']['name']."</td>";
                                    if($item['Category']['type'] == 0){
                                            echo "<td class=\"text-center\"><div class=\"label bg-danger\"><b>Chi tiêu</b></div></td>";
                                    } else{
                                            echo "<td class=\"text-center\"><div class=\"label bg-primary\"><b>Thu nhập</b></div></td>";
                                    }
                                    echo "<td class=\"text-center\">";
                                    echo $this->Html->link("<i class=\"fa fa-edit text-dark text\" style=\"font-size : 15px;\"></i>", 
                                            array('controller' => 'categorys', 'action' => 'edit', $item['Category']['id']),
                                            array('escape'=>false));
                                    echo "</td>";
                                    echo "<td class=\"text-center\">";
                                    echo $this->Form->postLink(
                                            "<i class=\"fa fa-times text-danger text\" style=\"font-size : 15px;\"></i>",
                                            array("action" => "delete", $item['Category']['id']),
                                            array("confirm" => "Bạn có thực sự muốn xóa", "escape" => false));
                                    echo "</td>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <?php echo $this->element('Page/pagination'); ?>
            </div>
        </section>
    </section>