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
                            <h4 class="panel-title">SERVICE CENTER MANAGEMENT  </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

															<a href="<?php echo base_url('service_center/store');?>" class="btn btn-large btn-danger"> <i class="fa fa-plus-circle"></i> ADD </a>
															<br>
															&nbsp;
																 <table id="data-table" class="table table-striped table-bordered">
                                   <thead>
                                     <tr> 
                                       <th>Kode Service Center</th>
                                       <th>Nama Service Center</th>
                                       <th>Alamat Service Center</th>
																			 <th>PIC Service Center</th>
																			 <th>Kontak Service Center</th>
																			 <th>Foto Service Center</th>
                                       <th>Opsi</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php
                                      foreach($listing->result() as $row){
                                      ?>
                                      <tr class="gradeX">

                                       <td><?php echo $row->kode_sc; ?></td>
                                       <td><?php echo $row->nama_sc; ?></td>
																			 <td><?php echo $row->alamat_sc; ?></td>
																			 <td><?php echo $row->pic_sc; ?></td>
																			 <td><?php echo "Telp : " .$row->telp_sc. "Email : " .$row->email_sc; ?></td>
																			 <?php
																			 if($row->foto_sc == '' || $row->foto_sc == NULL ){
																			 ?>
   																	 	 <td> <h4 align="center"> Image Not Found! </h4> </td>
																			 <?php
																		 	 }else{
																			 ?>
																			 <td> <div align="center"> <img src="<?php echo base_url("uploads/".$row->foto_sc); ?>" style="width:25%; height:25%;" > </div> </td>
																			 <?php
																		   }
																			 ?>

                                       <td class="center"><a href="<?php echo base_url('service_center/store/'.$row->id); ?>"> Edit </a> &nbsp; | &nbsp; <a href="<?php echo base_url('service_center/delete/'.$row->id); ?>"> Delete </a></td>
                                     </tr>
                                     <?php
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
