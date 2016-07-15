<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<footer class="footer bg-white b-t">
    <div class="row text-center-xs">
        <div class="col-md-4 hidden-sm">
            <p class="m-t" style="color: #2e3e4e;">
                Tổng số <strong><?php echo $this->Paginator->params()['count']; ?></strong> bản ghi
            </p>
        </div>
        <?php
            if(sizeof($data) > 0){
        ?>
        <div class="col-md-8 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-sm m-b-none m-r-xs">
                <li><?php echo $this->Paginator->first('<i class="fa fa-step-backward"></i>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => FALSE)); ?></li>
                <li><?php echo $this->Paginator->prev('<i class="fa fa-backward"></i>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => FALSE)); ?></li>
                <?php
                    if(empty($this->Paginator->numbers())){
                        echo '<li class="active"><a>1</a></li>';
                    } else{
                        echo '<li>'.$this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active', 'first' => 1)).'</li>';
                    }
                ?>
                <li><?php echo $this->Paginator->next('<i class="fa fa-forward"></i>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => FALSE)); ?></li>
                <li><?php echo $this->Paginator->last('<i class="fa fa-step-forward"></i>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => FALSE)); ?></li>
            </ul>
        </div>
        <?php
            }
        ?>
    </div>
</footer>
