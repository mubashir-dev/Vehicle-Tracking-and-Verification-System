<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header card-header-primary bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							<h4 class="card-title ">Faculty Status</h4>
							<p class="card-category">Current Faculty Status who are using bus service</p>
						</div>
						<div class="col-md-4 text-right">
							<button class="btn btn-lg btn-success"  onclick="FacultyStatusData()">Load Data</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<tr>
									<th>#</th>
									<th>Reg No</th>
									<th>Name</th>
									<th>Status</th>
									<th>Date</th>
									<th>Activate</th>
									<th>Dactivate</th>
									<!-- <th>Delete</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($rows)) { ?>

									<?php foreach ($rows as $row) { ?>
										<?php $data['row'] = $row; ?>
										<?php $this->load->view('facultystatus/single_row', $data); ?>
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
						<p class="alert alert-success">Data Successfully Inserted</p>
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
			function FacultyStatusData() {
				$.ajax({
					url: '<?php echo base_url() . 'index.php/FStatusController/FacultyStatusData'; ?>',
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

			function activateFaculty(id) {
				// alert(id);
				$.ajax({
					url: '<?php echo base_url() . 'index.php/FStatusController/activateFaculty'; ?>',
					method: 'POST',
					data: {
						id: id
					},
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
		<!-- End of JavaScript Code -->
