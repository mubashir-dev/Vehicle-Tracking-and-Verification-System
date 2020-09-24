<form action="" method="POST" id="CreateUserModel">
	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name">
		<small class="nameError"></small>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username">
		<small class="userError"></small>
	</div>
	
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email">
		<small class="emailError"></small>
	</div>

	<div class="form-group">
		<label for="pass">Password</label>
		<input type="password" class="form-control" id="pass" name="pass">
		<small class="passError"></small>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form">Save changes</button>
	</div>
</form>
