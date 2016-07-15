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
                    '<i class="fa fa-key"></i><strong> BÁO CÁO</strong>',
                    array(
                        'controller' => 'report',
                        'action' => 'index'),
                    array(
                        'escape' => FALSE));
            echo '</li>';
        ?>
    </ul>
    <div class="row">
        <div class="col-sm-6">
            <section class="panel" style="border: 1px solid #65bd77">
                <div>
                    <div id="container_thu" style="padding: 10px;"></div>
                    <div class="list-group">
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">200</label><strong>Mua sắm</strong></a>
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">1,000</label><strong>Xăng xe</strong></a>
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">50,000</label><strong>Ăn uống</strong></a>
                    </div>
                </div>
            </section>
            <section class="panel" style="border: 1px solid #65bd77">
                <div class="panel-body">
                    <div id="container_chi"></div>
                    <div class="list-group">
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">200</label><strong>Mua sắm</strong></a>
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">1,000</label><strong>Xăng xe</strong></a>
                        <a href="#" class="list-group-item text-ellipsis" style="padding: 5px 10px;"><label class="text-danger pull-right">50,000</label><strong>Ăn uống</strong></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('#container_thu').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Browser market shares. January, 2015 to May, 2015'
            },
            subtitle: {
                text: 'Click the slices to view versions. Source: netmarketshare.com.'
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33,
                    drilldown: 'Microsoft Internet Explorer'
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    drilldown: 'Chrome'
                }, {
                    name: 'Firefox',
                    y: 10.38,
                    drilldown: 'Firefox'
                }, {
                    name: 'Safari',
                    y: 4.77,
                    drilldown: 'Safari'
                }, {
                    name: 'Opera',
                    y: 0.91,
                    drilldown: 'Opera'
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    drilldown: null
                }]
            }],
            drilldown: {
                series: [{
                    name: 'Microsoft Internet Explorer',
                    id: 'Microsoft Internet Explorer',
                    data: [
                        ['v11.0', 24.13],
                        ['v8.0', 17.2],
                        ['v9.0', 8.11],
                        ['v10.0', 5.33],
                        ['v6.0', 1.06],
                        ['v7.0', 0.5]
                    ]
                }, {
                    name: 'Chrome',
                    id: 'Chrome',
                    data: [
                        ['v40.0', 5],
                        ['v41.0', 4.32],
                        ['v42.0', 3.68],
                        ['v39.0', 2.96],
                        ['v36.0', 2.53],
                        ['v43.0', 1.45],
                        ['v31.0', 1.24],
                        ['v35.0', 0.85],
                        ['v38.0', 0.6],
                        ['v32.0', 0.55],
                        ['v37.0', 0.38],
                        ['v33.0', 0.19],
                        ['v34.0', 0.14],
                        ['v30.0', 0.14]
                    ]
                }, {
                    name: 'Firefox',
                    id: 'Firefox',
                    data: [
                        ['v35', 2.76],
                        ['v36', 2.32],
                        ['v37', 2.31],
                        ['v34', 1.27],
                        ['v38', 1.02],
                        ['v31', 0.33],
                        ['v33', 0.22],
                        ['v32', 0.15]
                    ]
                }, {
                    name: 'Safari',
                    id: 'Safari',
                    data: [
                        ['v8.0', 2.56],
                        ['v7.1', 0.77],
                        ['v5.1', 0.42],
                        ['v5.0', 0.3],
                        ['v6.1', 0.29],
                        ['v7.0', 0.26],
                        ['v6.2', 0.17]
                    ]
                }, {
                    name: 'Opera',
                    id: 'Opera',
                    data: [
                        ['v12.x', 0.34],
                        ['v28', 0.24],
                        ['v27', 0.17],
                        ['v29', 0.16]
                    ]
                }]
            }
        });
    
        $('#containerf_thu').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'THU NHẬP'
            },
            tooltip: {
                pointFormat: '<span style="color:{point.color}">\u25CF</span><b> {point.y} %</b><br/>'
            },
            subtitle: {
                text: '3D donut in Highcharts'
            },
            plotOptions: {
                pie: {
                    innerSize: 0,
                    depth: 45
                }
            },
            series: [{
                name: 'Ti lệ',
                data: <?php echo $json_data?>
            }]
        });
    });
    
    $(function () {
        $('#container_chi').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'CHI TIÊU'
            },
            tooltip: {
                pointFormat: '<span style="color:{point.color}">\u25CF</span><b> {point.y} %</b><br/>'
            },
            subtitle: {
                text: '3D donut in Highcharts'
            },
            plotOptions: {
                pie: {
                    innerSize: 0,
                    depth: 45
                }
            },
            series: [{
                name: 'Ti lệ',
                data: <?php echo $json_data?>
            }]
        });
    });
</script>
