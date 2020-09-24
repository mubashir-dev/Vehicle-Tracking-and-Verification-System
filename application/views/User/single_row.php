<tr id="row-<?php echo $row['user_id'] ?>">
    <td class="modelid"><?php echo $row['user_id'] ?></td>
    <td class="modelemail"><?php echo $row['name'] ?></td>
    <td class="modelfather_name"><?php echo $row['username'] ?></td>
    <td class="modeladdress"><?php echo $row['user_email'] ?>th</td>
    <td class="modeladdress"><?php echo $row['user_password'] ?></td>
	<td><a class="btn-sm text-white btn-link btn-warning" href="#"  onclick="showUpdateForm(<?php echo $row['user_id'] ?>)" data-toggle="modal" data-target="#updateFacultyModel">Edit</a></td>
	<td><a class="btn-sm text-white btn-link btn-danger" href="#" onclick="deleteRecored(<?php echo $row['user_id'] ?>)" data-toggle="modal" data-target="#deleteConfirm">Delete</a></td>
</tr>
