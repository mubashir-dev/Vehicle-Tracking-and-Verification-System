<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header card-header-primary bg-primary text-white">
						<div class="row">
							<div class="col-md-8">
								<h4 class="card-title ">Faculty Fee Information</h4>
								<p class="card-category"> Here is the list of Faculty Details of student who are using bus service</p>
							</div>
							<div class="col-md-4 text-right">
								<button class="btn btn-lg btn-success"  onclick="LoadModalData()">Load Data</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead class=" text-primary">
									<tr>
										<th>#</th>
										<th>Faculty No</th>
										<th>Name</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Status</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (!empty($rows)) { ?>

										<?php foreach ($rows as $row) { ?>
											<?php $data['row'] = $row; ?>
											<?php $this->load->view('facultyfee/single_row', $data); ?>
										<?php }
									} else { ?>
										<td>Recored Not Found</td>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!--Modal For Adding Data-->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog  modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Load Faculty Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="add_modal_body">
						 <button class="btn btn-success">Load Data</button>
						</div>
					</div>
				</div>
			</div>
			<!--End of Adding Data Model-->


			<!--Message Dialog-->
			<div class="modal" tabindex="-1" role="dialog" id="hello">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Alert</h5>
							<button type="button" class="close" data-dismiss="#hello" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="msg_body">
							<p class="alert alert-success"></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="#hello" id="hello_btn">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End of Message 	Dialog-->


			<!-- JavaScript For Ajax Requests  -->

			<script>
				function LoadModalData()
				{
					$.ajax({
						url: '<?php echo base_url() . 'index.php/FFeeController/getFacultyFeeData'; ?>',
						method: 'POST',
						data: {},
						dataType: 'json',
						success: function(response) {
							console.log(response['html']);
							$("#msg_body").html(response['message']);
							$("#hello").show();

							$("#hello_btn").on("click", function(e) {
										// //e.preventDefault();
										$("body #hello").hide();
										$('body').removeClass('modal-open');
										$('.modal-backdrop').remove();
										// alert("Click on Alert");

									}); 
									
						},
						error: function(error) {
							console.log(error);
						}
					});

				}

				//Pay Fee Faculty

				function payFacultyFee(id)
				{
					// alert(id);
					$.ajax({
						url: '<?php echo base_url() . 'index.php/FFeeController/payFacultyFee'; ?>',
						method: 'POST',
						data: {id:id},
						dataType: 'json',
						success: function(response) {
							console.log(response['html']);
							$("#msg_body").html(response['message']);
							$("#hello").show();

							$("#hello_btn").on("click", function(e) {
										// //e.preventDefault();
										$("body #hello").hide();
										$('body').removeClass('modal-open');
										$('.modal-backdrop').remove();
										// alert("Click on Alert");

									}); 
									
						},
						error: function(error) {
							console.log(error);
						}
					});

				}
		
				// function showModal() {

				// 	$.ajax({
				// 		url: '<?php echo base_url() . 'index.php/SFeeController/showCreateForm'; ?>',
				// 		method: 'POST',
				// 		data: {},
				// 		dataType: 'json',
				// 		success: function(response) {
				// 			console.log(response['html']);
				// 			$("#add_modal_body").html(response['html']['student']);
				// 		},
				// 		error: function(error) {
				// 			console.log(error);
				// 		}
				// 	});

				// } -->
			</script>
