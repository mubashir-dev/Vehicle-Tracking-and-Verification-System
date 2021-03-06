<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header card-header-primary bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							<h4 class="card-title ">User Information</h4>
							<p class="card-category"> Here is the list of faculty who are using bus service</p>
						</div>
						<div class="col-md-4 text-right">
							<button class="btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModalCenter" onclick="showModal()">Create</button>
						</div>
					</div>

				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="FacultyModelList">
							<thead class=" text-primary">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Username</th>
									<th>Email</th>
									<th>Hash</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($rows)) { ?>

									<?php foreach ($rows as $row) { ?>
										<?php $data['row'] = $row; ?>
										<?php $this->load->view('user/single_row', $data); ?>
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

		<!-- Models For Data Modifications -->

		<!--Modal For Adding Data-->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog  modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="add_modal_body">
					</div>
				</div>
			</div>
		</div>

		<!-- End of Adding Model  -->


		<!-- Modal For Update -->
		<div class="modal fade" id="updateFacultyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
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
			function showModal() {

				$.ajax({
					url: '<?php echo base_url() . 'index.php/UserController/showCreateForm'; ?>',
					method: 'POST',
					data: {},
					dataType: 'json',
					success: function(response) {
						//console.log(response['html']);
						$("#add_modal_body").html(response['html']);
					},
					error: function(error) {
						console.log(error);
					}
				});
				$("body").on("submit", "#CreateUserModel", function(e) {
					e.preventDefault();
					$.ajax({
						url: '<?php echo base_url() . 'index.php/UserController/saveUserModel'; ?>',
						method: 'POST',
						data: $("#CreateUserModel").serializeArray(),
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
								if (response['username'] != "") {
									$(".userError").html(response['username']).addClass("invalid-feedback d-block");
									$("#userError").addClass('is-invalid');

								} else {
									$(".userError").html("").removeClass("invalid-feedback d-block");
									$("#username").removeClass('is-invalid');
									$("#username").addClass('is-valid');

								}


								if (response['email'] != "") {
									$(".emailError").html(response['email']).addClass("invalid-feedback d-block");
									$("#email").addClass('is-invalid');

								} else {
									$(".emailError").html("").removeClass("invalid-feedback d-block");
									$("#email").removeClass('is-invalid');
									$("#email").addClass('is-valid');

								}

								if (response['password'] != "") {
									$(".passError").html(response['password']).addClass("invalid-feedback d-block");
									$("#password").addClass('is-invalid');
								} else {
									$(".passError").html("").removeClass("invalid-feedback d-block");
									$("#password").removeClass('is-invalid');
									$("#password").addClass('is-valid');
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

								});
								//Adding Row To Table

								$("#FacultyModelList").append(response['row']);
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


			//Show FacultyDetails Method

			function showDetailsForm(id) {
				console.log(id);
				$.ajax({
					url: '<?php echo base_url() . 'index.php/FacultyController/FacultyInformation'; ?>',
					method: 'POST',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						console.log(response['html']);
						$("#faculty_details_body").html(response['html']);
					},
					error: function(error) {
						console.log(error);
					}
				});

			}
			// End of FacultyDetails Method


			//Edit Method

			function showUpdateForm(id) {

				$.ajax({
					url: '<?php echo base_url() . 'index.php/UserController/updateUserForm/'; ?>' + id,
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

				//Update Method 
				function updateUser() {
					$.ajax({
						url: '<?php echo base_url() . 'index.php/UserController/updateUserModel'; ?>',
						method: 'POST',
						data: $("#UpdateUserModel").serializeArray(),
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
								if (response['cnic'] != "") {
									$(".cnicError").html(response['cnic']).addClass("invalid-feedback d-block");
									$("#cnic").addClass('is-invalid');

								} else {
									$(".cnicError").html("").removeClass("invalid-feedback d-block");
									$("#cnic").removeClass('is-invalid');
									$("#cnic").addClass('is-valid');

								}


								if (response['faculty_no'] != "") {
									$(".factError").html(response['faculty_no']).addClass("invalid-feedback d-block");
									$("#faculty_no").addClass('is-invalid');

								} else {
									$(".factError").html("").removeClass("invalid-feedback d-block");
									$("#faculty_no").removeClass('is-invalid');
									$("#faculty_no").addClass('is-valid');

								}

								if (response['dept'] != "") {
									$(".deptError").html(response['dept']).addClass("invalid-feedback d-block");
									$("#dept").addClass('is-invalid');
								} else {
									$(".deptError").html("").removeClass("invalid-feedback d-block");
									$("#dept").removeClass('is-invalid');
									$("#dept").addClass('is-valid');

								}
								if (response['bus'] != "") {
									$(".busError").html(response['bus']).addClass("invalid-feedback d-block");
									$("#bus").addClass('is-invalid');
								} else {
									$(".busError").html("").removeClass("invalid-feedback d-block");
									$("#bus").removeClass('is-invalid');
									$("#bus").addClass('is-valid');

								}
								if (response['route'] != "") {
									$(".routeError").html(response['route']).addClass("invalid-feedback d-block");
									$("#route").addClass('is-invalid');
								} else {
									$(".routeError").html("").removeClass("invalid-feedback d-block");
									$("#route").removeClass('is-invalid');
									$("#route").addClass('is-valid');

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
								$("#updateFacultyModel").hide();
								$("#msg_body").html(response['message']);
								$("#hello").show();
								$("#hello_btn").on("click", function(e) {
									// //e.preventDefault();
									$("body #hello").hide();
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();

								});
								//Adding Row To Table

								$("#FacultyModelList").append(response['row']);
								//alert("Data Inserted Successfully");
							}
							// console.log(response);
						},
						error: function(error) {
							console.log(error);
						}
					});

				}
			}

				//Function To Delete Recored//

				function deleteRecored(id) {
					console.log(id);
					$("#deleteConfirm").modal('show');
					$("#deleteConfirm").data("id", id);
					$("body").on('click', '#delete_button', function(e) {
						$.ajax({
							url: '<?php echo base_url() . 'index.php/UserController/deleteUserModel/'; ?>' + id,
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

				// End of Update Method
		</script>
