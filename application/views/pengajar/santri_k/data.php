<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
										<tr>
										<th colspan="7" class="text-center bg-info text-white"><h4>Data Santri/wati</h4></th>
										</tr>
											<tr>
												<th>#</th>
												<th>NIS</th>
												<th>Nama Santri</th>
												<th>Ruang Kelas</th>
												<th>kelas</th>
												<th>No Kelas</th>

											</tr>
										</thead>
										<tbody>
											
										<?php 
										if(!$v_data->result()){
											echo"<td colspan='7' style='text-align:center;font-weight:bolder;font-size:18pt;'>- TIDAK ADA DATA -</td>";
										}else{
										foreach($v_data->result() as $key){ ?>
												<tr>
													<td><input type="checkbox" name="p_nis[]" value="<?= $key->nis ?>" ></td>
													<td><?= $key->nis ?></td>
													<td><?= $key->nama ?></td>
													<td><?= $key->nama_kelas ?></td>
													<td><?= $key->kelass ?></td>
													<td><?= $key->no_kls ?></td>
													

												</tr>
											<?php } } ?>
										</tbody>
									</table>
								</div>
							</div>