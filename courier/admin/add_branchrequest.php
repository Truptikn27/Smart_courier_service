<script>
function show(a)
{
	var reqid=a;

	$.ajax({
			url:'getbyid.php',
			 type: 'POST',
			data:{'id':reqid},
			success:function(res)
			{
				result=JSON.parse(res);
					console.log(result);
				   // result=JSON.stringify(response);

				   if (result.status==="sucess") {
				   	console.log(result.data.name);

				   	$("#dearname").val(result.data.name);
				   	$("#branchlocation").val(result.data.branch_location);
				   	$("#pincode").val(result.data.pincode);
				   	$("#officeaddress").val(result.data.office);
				   	$("#phone").val(result.data.phone)






				   }


			

			}

		});
}
</script>

<?php
include('header.php');
include('sidebar.php');
include('../connection.php');	
?>

<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Branch Address</h3>
		<div class="col-sm-12">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-2">
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Branch id:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" name="branch_id" placeholder="Enter branch id" required="" id="branch_id">

							</div>
						</div>
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Dealer name :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="name" placeholder="Enter name" required="" id="dearname">
							</div>
						</div>
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Branch Location :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="branch_location" placeholder="branch location" required="" id="branchlocation">
							</div>
						</div>
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Branch Name :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="branch_name" placeholder="branch name" required="">
							</div>
						</div>

						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Pincode</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="pincode" required="" id="pincode">
							</div>
						</div>
							<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="phone" required="" id="phone">
							</div>
						</div>

						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label"> Branch Address</label>
							<div class="col-sm-8">
							<input type="text" class="form-control1" name="branchaddress" required="" id="officeaddress">
							</div>
						</div>

						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<button type="Submit" class="btn btn-success" name="applybranch">Submit</button>
								<a href=""><button type="button" class="btn btn-danger">Cancel</button></a>
							</div>
						</div>

					</form>
				</div>
			</div>
			<!--body wrapper start-->
		</div>
		<!--body wrapper end-->
	</div>


	<?php 

	if(isset($_REQUEST['applybranch']))
	{
		include('../connection.php');	

		 $name=$_REQUEST['name'];
		 $branchaddress=$_REQUEST['branchaddress'];
		 $phone=$_REQUEST['phone'];
		 $branchlocation=$_REQUEST['branch_location'];
		 $pincode=$_REQUEST['pincode'];
		 $reqid=$_REQUEST['reqid'];
		 $branch_name=$_REQUEST['branch_name'];
		 $branch_Id=$_REQUEST['branch_id'];



		$sql="INSERT INTO `branch` (`id`, `dealer_name`, `branchaddress`, `phone`, `branch_location`, `pincode`, `reqid`, `branch_name`,`branch_id`) VALUES (NULL, '$name', ' $branchaddress', '$phone', '$branchlocation', '$pincode', '$reqid', '$branch_name','$branch_Id')";

		$res=mysqli_query($conn,$sql);

		if($res)
		{
			echo"<script>alert('data insert sucessfully');window.location='add_branchrequest.php'</script>";
		}
		else
		{
			echo"<script>alert('data insert error');window.location='add_dealerrequest.php'</script>";

		}

	}
	?>











	<?php
	include('footer.php');
	?>
