<form action="" method="POST" id="UpdateUserModel">
	<input type="text" name="id" value="<?php echo $row['user_id'] ?>" hidden>
	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
		<small class="nameError"></small>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>">
		<small class="userError"></small>
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['user_email'] ?>">
		<small class="emailError"></small>
	</div>

	<div class="form-group">
		<label for="pass">New Password</label>
		<input type="password" class="form-control" id="pass" name="pass" placeholder="Leave it Blank If Dont Change">
		<small class="passError"></small>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<!-- <button type="submit" ></button> -->
		<a href="#" class="btn btn-primary" id="submit_form_update" onclick="updateUser()">Update changes</a>
	</div>
</form>
