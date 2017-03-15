<style>
div#option_value {
    padding: 26px;
    border: 1px solid #d6cbcb;
    margin: 40px;
}
.each-val-sec.col-sm-9{
	padding-bottom: 10px;
}
.required {
	color: #FF0000;
	font-weight: bold;
}
.inp-form{
		width: 65%;
		height: 34px;
		font-size: 14px;
		color: #555;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 4px;
		margin:5px;
		padding: 0 10px 0 10px;
	}
	.border {
		border-top: 1px solid #d6cbcb;
		padding-top: 10px;
}
.error{
	color: #b94a48;
	font-weight: normal;
}
</style>

<?php
$category_id="";
	if($this->uri->segment(4)!="")
	{
		 $category_id=$this->uri->segment(4);
	}
?>

	<section id="main-content">
		<section class="wrapper">
			<!-- page start-->
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							 Add Question
						</header>
						<div class="panel-body">
							<div class="form">
								<form class="cmxform form-horizontal " name="addoption_from" enctype="multipart/form-data"  id="addoption_from" method="post" onsubmit="javascript:return chkFrm();"; action="<?php echo site_url("control").'/profileform/add' ; ?>">
								<div class="form-group ">
									   <label for="cat_select" class="control-label col-lg-3"> Category:</label>
									   <div class="col-lg-6">
										   <select class="form-control" style="width:330px" name="category_id"  id="category_id"  required >
											<option value="">Select Category</option>
											<?php
										    if(isset($category_det) && count($category_det)>0)
										    {
												foreach($category_det as $k=>$v)
										    {
										    ?>
										     <option value="<?php echo strval($v['_id']); ?>">
														<?php echo $v['title']; ?>
														</option>
										    <?php
											}
											}
										    ?>
										   </select>
									   </div>		
								</div>			
								<div class="form-group ">
										<label for="firstname" class="control-label col-lg-3"><span class="required">*</span>Question:</label>
										<div class="col-lg-4">
											<input class="form-control" name="type_lebel_eng" id="type_lebel_eng" value="" type="text" required />
										</div>
										
									</div>
								

								    <div class="form-group ">
									   <label for="cat_select" class="control-label col-lg-3">Answer:</label>
									   <div class="col-lg-6">
										   <select class="form-control" style="width:330px" name="type_id"  id="type_id"  required >
												
												<option value='1'>Textbox</option>
												<option value='2'>Radio Button</option>
												<option value='3'>Checkbox</option>
												
											</select>
									   </div>
								    </div>
									

							<input type="hidden" name="hid_count" id="hid_count" value="1">
						  <div class="row" id="option_value" style="display: none;">
							<div class="col-sm-12" id="more_opt_sec">
								<div class="row" id="more_opt1" >
									<div class="each-val-sec col-sm-5">
										<img src="<?php echo base_url().'assets/images/eng.ico';?>" alt="" style="height: 16px; width: 16px;">&nbsp;
										<input type="text" class="inp-form" name="option_eng[1]" id="option_eng1" value="" required >
										<br>
										<img src="<?php echo base_url().'assets/images/jap.png';?>" alt="" style="height: 16px; width: 16px;">&nbsp;
										<input type="text" class="inp-form" name="option_jap[1]" id="option_jap1" value="" required >
										
									</div>
									<div class="col-sm-5">
										<input type="text" class="inp-form" name="option_val[1]" id="option_val1" value="" required >
									</div>
									<div class="col-sm-2">
										<a onclick="addOptionValue();" class="btn btn-warning">Add Option Value</a>
									</div>
								</div>
							</div>
								
						  </div>
						  	<div class="form-group ">
										<label for="email" class="control-label col-lg-3">Status</label>
										<div class="col-lg-6">
											<select required name="status" id="status" style="width:330px"  class=" form-control">
												<option value="1">Active</option>
												<option value="0">Inctive</option>
											</select>
										</div>
									</div>
								    <div class="form-group">
									   <div class="col-lg-offset-3 col-lg-6">
										  <button class="btn btn-primary" type="submit" id="check_now">Save</button>
										  <button class="btn btn-default" type="button" onclick="location.href='<?php echo base_url();?>control/profileform';">Cancel</button>
									   </div>
								    </div>
								</form>
	  
					  
							</div>
						</div>
					</section>
				</div>
			</div>
		    <!-- page end-->
		</section>
    </section>

<script src="<?php echo base_url();?>assets/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$('#check_now').click(function(){
			$("#addoption_from").validate();
		});
	});    
	$('#type_id').bind('change', function() {
			var fld_type	= $('#type_id').val();
			if(fld_type=='2' || fld_type=='3' )
			{
				$('#option_value').show();
			}else{
				$('#option_value').hide();
			}
		});
				
		
		function addOptionValue() {
			var count = (parseInt($('#hid_count').val())+parseInt(1));
			var html='';
			//alert(count);
			html='<div class="row border" id="more_opt'+count+'" >'+
									'<div class="each-val-sec col-sm-5">'+
									'<img src="<?php echo base_url().'assets/images/eng.ico';?>"  alt="" style="height: 16px; width: 16px;">'+
										'<input type="text" class="inp-form" name="option_eng['+count+']" id="option_eng'+count+'" value="" required >&nbsp;'+
										'<br>'+
										'<img src="<?php echo base_url().'assets/images/jap.png';?>" alt="" style="height: 16px; width: 16px;">'+
										'<input type="text" class="inp-form" name="option_jap['+count+']" id="option_jap'+count+'" value="" required >&nbsp;'+
									'</div>'+
									'<div class="col-sm-5">'+
										'<input type="text" class="inp-form" name="option_val['+count+']" id="option_val'+count+'" value="" required >'+
									'</div>'+
									'<div class="col-sm-2">'+
										'<a onclick="removeOptionValue('+count+');" class="btn btn-danger">Remove</a>'+
									'</div>'+
								'</div>';
				$('#more_opt_sec').append(html);
				$('#hid_count').val(count);
				count++;
		}
		function removeOptionValue(c) {
			$('#more_opt'+c).remove();
			var hid_count=$('#hid_count').val()-1;
			$('#hid_count').val(hid_count);
		}
    </script>