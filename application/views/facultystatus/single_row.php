<tr id="row-<?php echo $row['status_id'] ?>">
	<td class="modelid"><?php echo $row['status_id'] ?></td>
	<td class="modelid"><?php echo $row['faculty_no'] ?></td>
	<td class="modelname"><?php echo $row['faculty_name'] ?></td>
	<?php 
	if($row['status']==true)
	{?>
		<td class="modeladdress">Leave Bus</td>
	<?php
	}
	else
	{?>
		<td class="modeladdress">Active</td>
	<?php
	}

	?>
	<td class="modeladdress"><?php echo $row['date'] ?></td>
	<td><a class="btn-sm text-white btn-link btn-primary" href="#"  onclick="activateFaculty(<?php echo $row['status_id'] ?>)">Activate</a></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['status_id'] ?>)" >Deactivate</a></td>
</tr>
