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
        ?>
    </ul>
    <form class="bs-example form-horizontal" name="form" method="post" action="index">
        <input type="hidden" name="direction">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group m-b-sm">
                            <div class="col-lg-9">
                                <label class="col-lg-2 control-label" style="padding-right: 0px; text-align: left;">
                                    Từ khóa
                                </label>
                                <div class="col-lg-9" style="padding-right: 0px;">
                                    <input id="keysearch" type="text" class="form-control input-sm" placeholder="Từ khóa" name="keySearch">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="text-center">
                                    <button type="submit" id="btn_search" onclick="search();" class="btn btn-sm btn-s-sm btn-primary">
                                        <i class="fa fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row m-b-sm">
            <div class="col-lg-12">
                <div class="pull-left">
                    <?php
                        echo $this->Html->link(
                            "<i class=\"fa fa-plus\"></i> Thêm mới",
                            array("controller" => "wallets", "action" => "add"),
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
                                Tên ví
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
                                echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
                            } else{
                                $i = 1;
                                foreach($data as $item){
                                    echo "<tr>";
                                    echo "<td class=\"text-center\">".$i."</td>";
                                    echo "<td>".$item['Wallet']['name']."</td>";
                                    echo "<td class=\"text-center\">";
                                    echo $this->Html->link("<i class=\"fa fa-edit text-dark text\" style=\"font-size : 15px;\"></i>", 
                                            array('controller' => 'Wallets', 'action' => 'edit', $item['Wallet']['id']),
                                            array('escape'=>false));
                                    echo "</td>";
                                    echo "<td class=\"text-center\">";
                                    echo $this->Form->postLink(
                                            "<i class=\"fa fa-times text-danger text\" style=\"font-size : 15px;\"></i>",
                                            array("action" => "delete", $item['Wallet']['id']),
                                            array("confirm" => "Bạn có thực sự muốn xóa", "escape" => false));
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </form>
</section>