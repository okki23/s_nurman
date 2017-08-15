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
                            <h4 class="panel-title">DAFTAR LG SERVICE CENTER</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">


															&nbsp;
																 <table id="data-table" class="table table-striped table-bordered">
                                    <thead>

                                      <!--id
kode_sc
nama_sc
alamat_sc
pic_sc
telp_sc
email_sc
foto_sc
           -->
                                        <tr>
                                           <th>No</th>
																						<th>Kode </th>
                                            <th>Nama </th>
                                            <th>Alamat</th>
																						<th>Kontak</th>
                                            <th>Foto</th>

                                        </tr>
                                    </thead>

																		<tbody>
																			<?php
																			$no = 1;
																			foreach ($listing as $row) {
																			?>

																				<tr>
																					<td><?php echo $no; ?></td>
																					<td><?php echo $row->kode_sc; ?></td>
																					<td><?php echo $row->nama_sc; ?></td>
																					<td><?php echo $row->alamat_sc; ?></td>
																					<td><?php echo "Telp : ". $row->telp_sc. "<br>Email : ". $row->email_sc; ?></td>
																					<td><?php echo $row->telp_sc; ?></td>



																			</tr>

																			<?php
																			$no++;
																			}
																			?>

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
