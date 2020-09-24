<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header card-header-primary bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							<h4 class="card-title ">Driver Information</h4>
							<p class="card-category"> Here is the list of Departments</p>
						</div>
						<div class="col-md-4 text-right">
							<button class="btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModalCenter" onclick="showModal()">Create</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Contact</th>
									<th>Addrrss</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($rows)) { ?>

									<?php foreach ($rows as $row) { ?>
										<?php $data['row'] = $row; ?>
										<?php $this->load->view('Driver/single_row', $data); ?>
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
						<h5 class="modal-title" id="exampleModalCenterTitle">Add Driver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="add_modal_body">
					</div>
				</div>
			</div>
		</div>
		<!--End of Adding Data Model-->

		<!-- Modal For Update -->
		<div class="modal fade" id="updateStudentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Edit Driver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="update_modal_body">
					</div>
				</div>
			</div>
		</div>
		<!-- End of Update Modal -->

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


		<!-- Modal For Confirming Delete Opreation -->
		<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Alert</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="delete_modal_body">
						Are You Sure To Delete This Recore ?
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="#deleteConfirm">Close</button>
						<button class=" btn btn-danger" id="delete_button">Delete</button>
					</div>

				</div>
			</div>
		</div>

		<!-- End of Modal -->

		<!--StudentDetails Dialog-->
		<div class="modal" tabindex="-1" role="dialog" id="student_details">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Student Details</h5>
						<button type="button" class="close" data-dismiss="#student_details" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="student_details_body">

					</div>
				</div>
			</div>
		</div>
		<!--End of StudentDetails 	Dialog-->


		<!-- JavaScript For Ajax Requests  -->

		<script>
			function showModal() {

				$.ajax({
					url: '<?php echo base_url() . 'index.php/DriverController/showCreateForm'; ?>',
					method: 'POST',
					data: {},
					dataType: 'json',
					success: function(response) {
						console.log(response['html']);
						$("#add_modal_body").html(response['html']);
					},
					error: function(error) {
						console.log(error);
					}
				});
				$("body").on("submit", "#CreateDriverModel", function(e) {
					e.preventDefault();
					$.ajax({
						url: '<?php echo base_url() . 'index.php/DriverController/saveDriverModel'; ?>',
						method: 'POST',
						data: $("#CreateDriverModel").serializeArray(),
						dataType: 'json',
						success: function(response) {
							if (response['status'] == 0) {
								if (response['name'] != "") {
									$(".nameError").html(response['name']).addClass("invalid-feedback d-block");
									$("#name").addClass('is-invalid');

								} else {
									$(".nameError").html("").removeClass("invalid-feedback d-block");
									$("#name").removeClass('is-invalid');
									$("#name").addClass('is-valid');

								}
								if (response['contact'] != "") {
									$(".contError").html(response['contact']).addClass("invalid-feedback d-block");
									$("#contact").addClass('is-invalid');
								} else {
									$(".contError").html("").removeClass("invalid-feedback d-block");
									$("#contact").removeClass('is-invalid');
									$("#contact").addClass('is-valid');

								}
								if (response['address'] != "") {
									$(".addressError").html(response['address']).addClass("invalid-feedback d-block");
									$("#address").addClass('is-invalid');
								} else {
									$(".addressError").html("").removeClass("invalid-feedback d-block");
									$("#address").removeClass('is-invalid');
									$("#address").addClass('is-valid');

								}
							} else {
								$("#exampleModalCenter").hide();
								$("#msg_body").html(response['message']);
								$("#hello").show();
								$("#hello_btn").on("click", function(e) {
									// //e.preventDefault();
									$("body #hello").hide();
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();
									// alert("Click on Alert");

								});
								// //Adding Row To Table

								// $("#StudentModelList").append(response['row']);
								//alert("Data Inserted Successfully");
							}
							// console.log(response);
						},
						error: function(error) {
							console.log(error);
						}
					});
				});
			}

			//Edit Method

			function showUpdateForm(id) {

				$.ajax({
					url: '<?php echo base_url() . 'index.php/DriverController/updateDriverForm/'; ?>' + id,
					method: 'POST',
					data: {},
					dataType: 'json',
					success: function(response) {
						//console.log(response['html']);
						//
						$("#update_modal_body").html(response['html']);
					},
					error: function(error) {
						console.log(error);
					}
				});

				$("body").on("submit", "#UpdateDriverModel", function(e) {
					e.preventDefault();
					$.ajax({
						url: '<?php echo base_url() . 'index.php/DriverController/updateDriver'; ?>',
						method: 'POST',
						data: $("#UpdateDriverModel").serializeArray(),
						dataType: 'json',
						success: function(response) {
							if (response['status'] == 0) {
								if (response['name'] != "") {
									$(".nameError").html(response['name']).addClass("invalid-feedback d-block");
									$("#name").addClass('is-invalid');

								} else {
									$(".nameError").html("").removeClass("invalid-feedback d-block");
									$("#name").removeClass('is-invalid');
									$("#name").addClass('is-valid');

								}
								if (response['contact'] != "") {
									$(".contError").html(response['contact']).addClass("invalid-feedback d-block");
									$("#contact").addClass('is-invalid');
								} else {
									$(".contError").html("").removeClass("invalid-feedback d-block");
									$("#contact").removeClass('is-invalid');
									$("#contact").addClass('is-valid');

								}
								if (response['address'] != "") {
									$(".addressError").html(response['address']).addClass("invalid-feedback d-block");
									$("#address").addClass('is-invalid');
								} else {
									$(".addressError").html("").removeClass("invalid-feedback d-block");
									$("#address").removeClass('is-invalid');
									$("#address").addClass('is-valid');

								}
							} else {
								$("#updateStudentModel").hide();
								$("#msg_body").html(response['message']);
								$("#hello").show();
								$("#hello_btn").on("click", function(e) {
									// //e.preventDefault();
									$("body #hello").hide();
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();
									// alert("Click on Alert");

								});
								// //Adding Row To Table

								// $("#StudentModelList").append(response['row']);
								//alert("Data Inserted Successfully");
							}
							// console.log(response);
						},
						error: function(error) {
							console.log(error);
						}
					});
				});
			}
			//End of Method Loading Form In Modal

			//Function To Delete Recored//

			function deleteRecored(id) {
				console.log(id);
				$("#deleteConfirm").modal('show');
				$("#deleteConfirm").data("id", id);
				$("body").on('click', '#delete_button', function(e) {
					$.ajax({
						url: '<?php echo base_url() . 'index.php/DriverController/deleteDriverModel/'; ?>' + id,
						method: 'POST',
						data: {},
						dataType: 'json',
						success: function(response) {

							console.log(response['message']);
							$("#deleteConfirm").modal("hide");
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

				});

			}

		</script>
		<!-- End Of JavaScript Ajax Requests -->

