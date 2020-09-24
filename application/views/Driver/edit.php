<form action="" method="POST" id="UpdateDriverModel">

<input type="text" name="id" id="id" value="<?= $row['driver_id']?>" hidden>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" value="<?=$row['driver_name']?>">
		<small class="nameError"></small>
	</div>

	<div class="form-group">
		<label for="contact">Contact</label>
		<input type="text" class="form-control" id="contact" name="contact" value="<?= $row['driver_contact']?>">
		<small class="contError"></small>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<textarea id="address" class="form-control" name="address" rows="3"><?= $row['driver_address']?></textarea>
		<small class="addressError"></small>

	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form" >Save changes</button>
	</div>
</form>
