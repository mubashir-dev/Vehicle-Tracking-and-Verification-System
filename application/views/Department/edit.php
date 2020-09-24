<form action="" method="POST" id="UpdateStudentModel">
    <input type="text" name="id" value="<?php echo $row['dept_id'] ?>" hidden>
	<div class="form-group">
		<label for="dept">Department Name</label>
		<input type="text" class="form-control" id="dept" name="dept" value="<?php echo $row['dept_name'] ?>">
		<small class="deptError"></small>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<a href="#" class="btn btn-primary" id="submit_form_update" onclick="updateStudent()">Update changes</a>

	</div>
</form>
