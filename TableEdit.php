<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body
		{
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		}
		.editbox
		{
		display:none
		}
		td
		{
		padding:5px;
		}
		.editbox
		{
		font-size:14px;
		width:100px;
		background-color:#ffffcc;
		border:solid 1px #000;
		padding:4px;
		}
		.edit_tr:hover
		{
		cursor:pointer;
		}
	</style>
</head>
<body>
	<table border="1">
		<?php
			include_once('db.php');
			$sql=mysqli_query($bd,"select * from table_name");
			while($row=mysqli_fetch_array($sql))
			{
				$id=$row['id'];
				$name=$row['name'];
				$age=$row['age'];
				?>
				<tr id="<?php echo $id; ?>" class="edit_tr">

					<td class="edit_td" id="<?php echo $id; ?>">
						<span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
						<input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>" width="250px" />
						</td>

					<td class="edit_td">
					<span id="age_<?php echo $id; ?>" class="text"><?php echo $age; ?></span> 
					<input type="text" value="<?php echo $age; ?>" class="editbox" id="age_input_<?php echo $id; ?>"/>
					</td>

				</tr>
				<?php
			}
		?>
	</table>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$(".edit_td").dblclick(function()
			{
				var ID=$(this).attr('id');
				$("#first_"+ID).hide();
				$("#last_"+ID).hide();
				$("#first_input_"+ID).show();
				$("#last_input_"+ID).show();
			}).change(function()
			{
				var ID=$(this).attr('id');
				var name=$("#name_input_"+ID).val();
				var age=$("#age_input_"+ID).val();
				var dataString = 'id='+ ID +'&name='+first+'&age='+age;
				
				if(name.length>0&& age.length>0)
				{

					$.ajax({
						type: "POST",
						url: "table_edit_ajax.php",
						data: dataString,
						cache: false,
						success: function(html)
						{
							$("#name_"+ID).html(name);
							$("#age_"+ID).html(age);
						}
					});
				}
				else
				{
					alert('Enter something.');
				}

			});

			// Edit input box click action
			$(".editbox").mouseup(function() 
			{
				return false
			});

			// Outside click action
			$(document).mouseup(function(){
				$(".editbox").hide();
				$(".text").show();
			});
		});
		
	</script>
</body>
</html>
	