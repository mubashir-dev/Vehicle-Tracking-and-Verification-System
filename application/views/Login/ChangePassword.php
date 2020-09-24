<div class="container-fluid">
	<div class="row h-100">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header card-header-primary bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							<h4 class="card-title ">Change Password</h4>
							<p class="card-category">Change Your Password To Protect Your Account</p>
						</div>
					</div>

				</div>
				<div class="card-body">
					<div class="row">
						<input type="text" name="id" id="id" hidden value="<?= $user['id'] ?>">
						<div class="col-md-6 col-xs-12 justify-content-center">
							<form action="" method="post" id="changepassword">
								<div class="form-group">
									<label for="my-input">Current Password</label>
									<input id="my-input" class="form-control" type="text" name="curr_pass">
									<small class="currError"></small>

								</div>
								<div class="form-group">
									<label for="my-input">New Password</label>
									<input id="my-input" class="form-control" type="text" name="new_pass">
									<small class="newrError"></small>

								</div>
								<div class="form-group">
									<label for="my-input">Repeat Password</label>
									<input id="my-input" class="form-control" type="text" name="rep_pass">
									<small class="repError"></small>
								</div>
								<button type="submit" class="btn btn-primary" onclick="changePassword();">Change Password</button>
							</form>

						</div>
					</div>
					<!--/row-->
				</div>
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



<!-- JavScript 	 Ajax Requests -->
<script>
	function changePassword() {
		$("body").on("submit", "#changepassword", function(e) {
			e.preventDefault();

			$.ajax({
				url: '<?php echo base_url() . 'index.php/UserController/ChangePassword'; ?>',
				method: 'POST',
				data: $("#changepassword").serializeArray(),
				dataType: 'json',
				success: function(response) {
					if (response['status'] == 0) {
						if (response['curr_pass'] != "") {
							$(".currError").html(response['curr_pass']).addClass("invalid-feedback d-block");
							$("#curr_pass").addClass('is-invalid');

						} else {
							$(".currError").html("").removeClass("invalid-feedback d-block");
							$("#curr_pass").removeClass('is-invalid');
							$("#curr_pass").addClass('is-valid');

						}
						if (response['new_pass'] != "") {
							$(".newrError").html(response['new_pass']).addClass("invalid-feedback d-block");
							$("#new_pass").addClass('is-invalid');

						} else {
							$(".newrError").html("").removeClass("invalid-feedback d-block");
							$("#new_pass").removeClass('is-invalid');
							$("#new_pass").addClass('is-valid');

						}


						if (response['rep_pass'] != "") {
							$(".repError").html(response['rep_pass']).addClass("invalid-feedback d-block");
							$("#re_pass").addClass('is-invalid');

						} else {
							$(".repError").html("").removeClass("invalid-feedback d-block");
							$("#rep_pass").removeClass('is-invalid');
							$("#rep_pass").addClass('is-valid');

						}

						
					}
					else if(response['status'] === -1)
					{
						$("#exampleModalCenter").hide();
						$("#msg_body").html(response['message']);
						$("#hello").show();
						$("#hello_btn").on("click", function(e) {
							// //e.preventDefault();
							$("body #hello").hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();

						});
					}
					else if(response['status'] == -2)
					{
						$("#exampleModalCenter").hide();
						$("#msg_body").html(response['message']);
						$("#hello").show();
						$("#hello_btn").on("click", function(e) {
							// //e.preventDefault();
							$("body #hello").hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();

						});
	
					}

					 else {
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
</script>
