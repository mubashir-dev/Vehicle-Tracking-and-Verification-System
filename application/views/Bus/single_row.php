<tr id="row-<?php echo $row['bus_id'] ?>">
	<td><?php echo $row['bus_id'] ?></td>
	<td class="modelid"><?php echo $row['bus_model'] ?></td>
	<td class="modelid"><?php echo $row['bus_number'] ?></td>
	<td class="modelid"><a class="btn btn-sm btn-info text-white font-weight-bold"><?php echo $row['bus_tag_number'] ?></a></td>
	<td class="modelid"><?php echo $row['driver_name'] ?></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['bus_id'] ?>)" data-toggle="modal" data-target="#updateStudentModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['bus_id']?>)">Delete</a></td>
</tr>
