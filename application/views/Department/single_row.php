<tr id="row-<?php echo $row['dept_id'] ?>">
	<td><?php echo $row['dept_id'] ?></td>
	<td class="modelid"><?php echo $row['dept_name'] ?></td>
	<td><a class="btn-sm text-white btn-link btn-primary" href="#"  onclick="showDetailsForm(<?php echo $row['dept_id'] ?>)" data-toggle="modal" data-target="#student_details">View</a></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['dept_id'] ?>)" data-toggle="modal" data-target="#updateStudentModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['dept_id']?>)">Delete</a></td>
</tr>
