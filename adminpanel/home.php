<?php
include "lib/head.php";
include "lib/header.php";
include "lib/left_menu.php";
?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    
                    <!-- END PAGE HEADER-->
                    <div class="mt-bootstrap-tables">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Dashboard</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table id="table-pagination" data-toggle="table" data-url="" data-height="380" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>
                                                    <th data-field="id" data-align="right" data-sortable="true">Sl/No</th>
                                                    <th data-field="username" data-align="center" data-sortable="true">Username</th>
                                                    <th data-field="ip_address" data-sortable="true" data-sorter="priceSorter">Ip Address</th>
                                                    <th data-field="date" data-align="right" data-sortable="true">Date</th>
                                                    <th data-field="time" data-align="center" data-sortable="true">Time</th>
                                                    <th data-field="status" data-sortable="true" data-sorter="priceSorter">Status</th>
                                                </tr>
											</thead>
											<tbody>
												<?php
												$sql_login="SELECT * FROM `admin_login` ORDER BY `id` DESC";
												
                                                $res_login=mysqli_query($con, $sql_login);
                                                while($row_login=mysqli_fetch_array($res_login))// $res_login=mysql_query($sql_login);
												// while($row_login=mysql_fetch_array($res_login))
												{
												$c++;
												?>
											
												<tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $row_login[username];?></td>
													<td><?php echo $row_login[ip_address];?></td>
                                                    <td><?php echo $row_login[date];?></td>
													<td><?php echo $row_login[time];?></td>
													<td><?php echo $row_login[status];?></td>
                                                </tr>
												<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
<?php
include "lib/footer.php";
?>