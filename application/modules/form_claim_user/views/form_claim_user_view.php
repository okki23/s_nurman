<!-- begin row -->
			<div class="row">

 			    <div class="col-md-12">
 			        <!-- begin panel -->
                     <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                         <div class="panel-heading">
                             <div class="panel-heading-btn">
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                             </div>
                             <h4 class="panel-title">FORM CLAIM USER</h4>
                         </div>
												 <?php
												 $parseform = new StdClass;
												  ?>
                         <div class="panel-body">
                             <form class="form-horizontal" action="<?php echo base_url('form_claim_user/save'); ?>" method="POST" enctype="multipart/form-data">

															 <div class="form-group">
																	<label class="col-md-3 control-label">No Registrasi
																	</label>
																	<div class="col-md-9">
																		  <input type="hidden" name="date_insert" value="<?php echo date("Y-m-d"); ?>" readonly="readonly"  id="date_insert"  class="form-control" />
																			<input type="text" name="no_registrasi" value="<?php echo "CU".$last_id; ?>" readonly="readonly"  id="nama_barang"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Nama Pelanggan
																	</label>
																	<div class="col-md-9">
																			<input type="text" name="nama_pelanggan"  id="nama_pelanggan"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Alamat Pelanggan
																	</label>
																	<div class="col-md-9">
																			<input type="text" name="alamat_pelanggan"   id="alamat_pelanggan"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Telp Pelanggan
																	</label>
																	<div class="col-md-9">
																			<input type="text" name="telp_pelanggan"   id="telp_pelanggan"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Email Pelanggan
																	</label>
																	<div class="col-md-9">
																			<input type="text" name="email_pelanggan"  id="email_pelanggan"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Produk Pelanggan
																	</label>
																	<div class="col-md-9">
																			<select name="id_product" id="id_product" class="form-control">
																				<option value="">--Pilih--</option>
																				<?php
																				foreach ($list_barang as $row) {
																					echo "<option value=".$row->id."> ".$row->kode_produk." - ".$row->nama_produk." </option>";
																				}
																				?>
																			</select>

																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Jenis Keluhan
																	</label>
																	<div class="col-md-9">
																		<select name="jenis_keluhan" id="jenis_keluhan" class="form-control">
																			<option value="">--Pilih--</option>
																			<option value="1">Service</option>
																			<option value="2">Claim Produk</option>
																			<option value="3">Lainnya</option>
																		</select>
																	</div>
															 </div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Lainnya
																	</label>
																	<div class="col-md-9">
																			<input type="text" name="jenis_keluhan_other"   id="jenis_keluhan_other"  class="form-control" />
																	</div>
															 </div>
															 <div class="form-group">
																 <label class="col-md-3 control-label">Foto Barang/Bukti
																 </label>
																 <div class="col-md-9">
																		 <input type="file" name="foto_keluhan"   id="foto_keluhan"  class="form-control" />
																		  <input type="text" name="foto_keluhanx"   id="foto_keluhanx"  class="form-control" />
																 </div>
															</div>
															 <div class="form-group">
																	<label class="col-md-3 control-label">Catatan
																	</label>
																	<div class="col-md-9">
																			<textarea name="catatan"  id="catatan" class="form-control"> </textarea>

																	</div>
															 </div>
															 <div  align="center">
																	<button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
																	<a class="btn btn-danger" href="<?php echo base_url('req_goods'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
															 </div>
                             </form>
                         </div>
                     </div>
                     <!-- end panel -->
                 </div>
                 <!-- end col-6 -->
            </div>
            <!-- end row -->

						<script>

						$(document).ready(function(e){

							var base_url = "<?php echo base_url();?>";
							alert(base_url);
							var input = $("#no_po").val();

								$.get(base_url+'rec_goods/get_content_form', function(data){
											input.typeahead({
													source: data,
													minLength: 1,
											});
								}, 'json');

								input.change(function(){
									var current = input.typeahead("getActive");
									$('#id_barang').val(current.id_barang);
								});
						});
						</script>
