<form action="" method="POST" id="UpdateProgramModel">
    <input type="text" name="id" value="<?php echo $row['course_id'] ?>" hidden>
    <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$row['course_name']?>">
        <small class="nameError"></small>
    </div>
    <div class="form-group">
        <label for="dept">Select Department </label>
        <select name="dept" id="dept" class="form-control">
            <option value="">Select Department</option>
            <?php
			if (!empty($d_list)) { ?>

            <?php foreach ($d_list as $rows) { ?>
            <option <?php  echo ($row['dept_id']== $rows['dept_id']) ? "selected":"";  ?>
                value="<?= $rows['dept_id'] ?>"><?= $rows['dept_name'] ?></option>
            <?php }
			} else { ?>
            <option>Recored Not Found</option>
            <?php } ?>
        </select>
    </div>
    <small class="deptError"></small>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<a href="#" class="btn btn-primary" id="submit_form_update" onclick="updateStudent()">Update changes</a>

	</div>
</form>
