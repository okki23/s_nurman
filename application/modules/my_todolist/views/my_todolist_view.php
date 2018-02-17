<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">MY TODO LIST</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">


															<br>
															&nbsp;
																 <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
																					  <th>No</th>
																						<th>No Reg Claim</th>
                                            <th>PIC</th>
                                            <th>Priority</th>
                                            <th>Status</th>
																						<th>Date Assign</th>
                                            <th>Note</th>
																						<th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
																			<?php
																			$no = 1;
																			foreach ($listing as $row) {
																			?>
 																			<tr>
																					<td><?php echo $no; ?></td>
																					<td><?php echo $row->no_registrasi; ?></td>
																					<td><?php echo $row->nama; ?></td>
																					<td><?php echo strtoupper($row->priority); ?></td>
																					<td><?php echo strtoupper($row->status); ?></td>
																					<td><?php echo $row->date_assign; ?></td>
																					<td><?php echo $row->note; ?></td>
																					<td>
																						<a class="btn btn-warning" href="<?php echo base_url('my_todolist/store/'.$row->id); ?>">  <i class="fa fa-pencil"></i> Report Progress </a>   &nbsp;

																					</td>


																			</tr>

																			<?php
																			$no++;
																			}
																			?>


                                        <!--
																				<tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td>4</td>

                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td>5</td>

                                        </tr>
																			-->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
