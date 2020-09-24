<form action="" method="POST" id="CreateProgramModel">

	<div class="form-group">
		<label for="name">Name </label>
		<input type="text" class="form-control" id="name" name="name">
		<small class="nameError"></small>
	</div>
	<div class="form-group">
		<label for="dept">Select Department </label>
		<select name="dept" id="dept" class="form-control">
			<option value="" selected>Select Department</option>
			<?php
			if (!empty($d_list)) { ?>

				<?php foreach ($d_list as $row) { ?>
					<option value="<?= $row['dept_id'] ?>"><?= $row['dept_name'] ?></option>
				<?php }
			} else { ?>
				<option>Recored Not Found</option>
			<?php } ?>
		</select>
	</div>
	<small class="deptError"></small>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="submit_form">Save changes</button>
	</div>
</form>
