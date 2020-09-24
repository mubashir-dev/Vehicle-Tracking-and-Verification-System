<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header card-header-primary bg-primary text-white">
						<div class="row">
							<div class="col-md-8">
								<h4 class="card-title ">Bus Information</h4>
								<p class="card-category"> Here is the list bus  currently use  In University</P></p>
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
										<th>Bus Model</th>										
										<th>Bus Number</th>
										<th>Tag No</th>
										<th>Driver</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (!empty($rows)) { ?>

										<?php foreach ($rows as $row) { ?>
											<?php $data['row'] = $row; ?>
											<?php $this->load->view('Bus/single_row', $data); ?>
										<?php }
									} else { ?>
										<td>Record Not Found</td>
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
							<h5 class="modal-title" id="exampleModalCenterTitle">Add Bus</h5>
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
							<h5 class="modal-title" id="exampleModalCenterTitle">Edit Program</h5>
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
						url: '<?php echo base_url() . 'index.php/BusController/showCreateForm'; ?>',
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

					
				//	$("body").on("submit", "#CreateBusModel", function(e) {
					// 	e.preventDefault();
					// 	$.ajax({
					// 		url: '<?php echo base_url() . 'index.php/BusController/saveBusModel'; ?>',
					// 		method: 'POST',
					// 		data: $("#CreateBusModel").serializeArray(),
					// 		dataType: 'json',
					// 		success: function(response) {
					// 			if (response['status'] == 0) {
					// 				if (response['bus'] != "") {
					// 					$(".busError").html(response['bus']).addClass("invalid-feedback d-block");
					// 					$("#bus").addClass('is-invalid');

					// 				} else {
					// 					$(".busError").html("").removeClass("invalid-feedback d-block");
					// 					$("#bus").removeClass('is-invalid');
					// 					$("#bus").addClass('is-valid');

					// 				}
					// 				if (response['busmodel'] != "") {
					// 					$(".bmError").html(response['busmodel']).addClass("invalid-feedback d-block");
					// 					$("#busmodel").addClass('is-invalid');
					// 				} else {
					// 					$(".bmError").html("").removeClass("invalid-feedback d-block");
					// 					$("#busmodel").removeClass('is-invalid');
					// 					$("#busmodel").addClass('is-valid');

					// 				}
					// 				if (response['bustag'] != "") {
					// 					$(".btError").html(response['bustag']).addClass("invalid-feedback d-block");
					// 					$("#bustag").addClass('is-invalid');
					// 				} else {
					// 					$(".btError").html("").removeClass("invalid-feedback d-block");
					// 					$("#bustag").removeClass('is-invalid');
					// 					$("#bustag").addClass('is-valid');

					// 				}
									
					// 				if (response['driver'] != "") {
					// 					$(".drError").html(response['driver']).addClass("invalid-feedback d-block");
					// 					$("#driver").addClass('is-invalid');
					// 				} else {
					// 					$(".drError").html("").removeClass("invalid-feedback d-block");
					// 					$("#driver").removeClass('is-invalid');
					// 					$("#driver").addClass('is-valid');

					// 				}

					// 			} else {
					// 				$("#exampleModalCenter").hide();
					// 				$("#msg_body").html(response['message']);
					// 				$("#hello").show();
					// 				$("#hello_btn").on("click", function(e) {
					// 					// //e.preventDefault();
					// 					$("body #hello").hide();
					// 					$('body').removeClass('modal-open');
					// 					$('.modal-backdrop').remove();
					// 					// alert("Click on Alert");

					// 				});
					// 				// //Adding Row To Table

					// 				// $("#StudentModelList").append(response['row']);
					// 				//alert("Data Inserted Successfully");
					// 			}
					// 			// console.log(response);
					// 		},
					// 		error: function(error) {
					// 			console.log(error);
					// 		}
					// 	});
					// });
				}

				//Edit Method

				function showUpdateForm(id) {

					$.ajax({
						url: '<?php echo base_url() . 'index.php/BusController/updateBusForm/'; ?>' + id,
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
				}
				//End of Method Loading Form In Modal


				// Update Method
				function updateBus() {
					$.ajax({
						url: '<?php echo base_url() . 'index.php/BusController/updateBus'; ?>',
						method: 'POST',
						data: $("#UpdateBusModel").serializeArray(),
						dataType: 'json',
						success: function(response) {
							if (response['status'] == 0) {
								if (response['bus'] != "") {
										$(".busError").html(response['bus']).addClass("invalid-feedback d-block");
										$("#bus").addClass('is-invalid');

									} else {
										$(".busError").html("").removeClass("invalid-feedback d-block");
										$("#bus").removeClass('is-invalid');
										$("#bus").addClass('is-valid');

									}
									if (response['busmodel'] != "") {
										$(".bmError").html(response['busmodel']).addClass("invalid-feedback d-block");
										$("#busmodel").addClass('is-invalid');
									} else {
										$(".bmError").html("").removeClass("invalid-feedback d-block");
										$("#busmodel").removeClass('is-invalid');
										$("#busmodel").addClass('is-valid');

									}
									if (response['bustag'] != "") {
										$(".btError").html(response['bustag']).addClass("invalid-feedback d-block");
										$("#bustag").addClass('is-invalid');
									} else {
										$(".btError").html("").removeClass("invalid-feedback d-block");
										$("#bustag").removeClass('is-invalid');
										$("#bustag").addClass('is-valid');

									}
									
									if (response['driver'] != "") {
										$(".drError").html(response['driver']).addClass("invalid-feedback d-block");
										$("#driver").addClass('is-invalid');
									} else {
										$(".drError").html("").removeClass("invalid-feedback d-block");
										$("#driver").removeClass('is-invalid');
										$("#driver").addClass('is-valid');

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
								}
								// console.log(response);
							

						},
						error: function(error) {
							console.log(error);
						}
					});


				}

				// End Update Method


				//Function To Delete Recored//

				function deleteRecored(id) {
					console.log(id);
					$("#deleteConfirm").modal('show');
					$("#deleteConfirm").data("id", id);
					$("body").on('click', '#delete_button', function(e) {
						$.ajax({
							url: '<?php echo base_url() . 'index.php/BusController/deleteBusModel/'; ?>' + id,
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


				//Show StudentDetails Method

				function showDetailsForm(id) {
					console.log(id);
					$.ajax({
						url: '<?php echo base_url() . 'index.php/StudentController/studentInformation'; ?>',
						method: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							console.log(response['html']);
							$("#student_details_body").html(response['html']);
						},
						error: function(error) {
							console.log(error);
						}
					});

				}
				// End of StudentDetails Method
			</script>
			<!-- End Of JavaScript Ajax Requests -->
