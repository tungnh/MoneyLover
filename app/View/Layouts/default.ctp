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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en" class="app">
    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
            <?php echo 'Money Lover | '.$title; ?>
        </title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('app.v2');
                echo $this->Html->css('font');
                echo $this->Html->css('select2/select2');
                echo $this->Html->css('select2/theme');
                echo $this->Html->script('app.v2');
                echo $this->Html->script('select2/select2.min');
                echo $this->Html->script('parsley/parsley.min');
                echo $this->Html->script('parsley/parsley.extend');
                
                echo $this->Html->script('highchart/highcharts');
                echo $this->Html->script('highchart/modules/data');
                echo $this->Html->script('highchart/modules/drilldown');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body>
        <section class="vbox">
            <?php echo $this->Element('Page/header');?>
            <section>
                <section class="hbox stretch"> <!-- .aside -->
                    <?php echo $this->Element('Page/aside');?>
                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">
                            <?php echo $this->fetch('content'); ?>
                        </section>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                    </section>
                    <!--<aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>-->
                </section>
            </section>
        </section>
        <?php 
            echo $this->Element('Modal/edit_balance');
            echo $this->Element('Modal/tranfer_wallet');
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                if(window.location.href.lastIndexOf("/") === window.location.href.length - 1)
                {
                    $(".link-home").addClass("active");
                }
                else
                {
                    $(".nav-primary .nav li a").each(function(){
                        if(!$(this).attr("href").match("/$") && window.location.href.indexOf($(this).attr("href")) >= 0)
                        {
                            if($(this).parent().parent().parent().is("li"))
                            {
                                $(this).parent().parent().parent().addClass("active");
                            }
                            else
                            {
                                $(this).parent().addClass("active");
                            }
                        }
                    });
                }
            });
            $('#slToWallet').select2();
            $('#btn_close_tranfer').click(function(){
                $('#modal-tranfer-money').modal('toggle');
            });
            $('#btn_close_edit_balance').click(function(){
                $('#modal-edit-balance').modal('toggle');
            });
       </script>
    </body>
</html>
