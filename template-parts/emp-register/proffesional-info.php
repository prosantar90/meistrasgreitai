<div class="builder_select">
	<div class="row">
		<div class="col-md-6 mb-3">
			<div class="form-group">
				<input type="text" name="emp_id" id="" class="form-control" placeholder="Employee ID">
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="form-group">
				<input type="text" name="eusername" id="eusername" class="form-control" placeholder="Username">
			</div>
		</div>
		<div class="col-6 mb-3">
			<select class="select2 form-control wide mb_30" name="etype">
				<option value='' >Select Employee Type</option>
				<option value='Software'>Software Engineer</option>
				<option value='Analyst'>Systems Analyst</option>
			</select>
		</div>
		<div class="col-6 mb-3">
			<select class="select2 form-control wide mb_30" name="edepart">
				<option value='' >Select Departmet</option>
				<option value='It'>It</option>
				<option value='ui/ux'>UI/UX</option>
			</select>
		</div>
		<div class="col-6 mb-3">
			<div class="form-group">
				<input type="text" name="edesignation" id="edesignation" class="form-control" placeholder="Enter Designation">
			</div>
		</div>
		<div class="col-6 mb-3">
			<select id="empworkingDay" class="select2 wide mb_30 form-control" name="eday[]" multiple="multiple">  
				<!-- <option value='' selected='selected' disabled>Select Working days</option> -->
				<option value='sunday'>Sunday</option>
				<option value='monday'>Monday</option>
				<option value='tuesday'>Tuesday</option>
				<option value='wednesday'>Wednesday</option>
				<option value='thursday'>Thursday</option>
				<option value='Friday'>Friday</option>
				<option value='satarday'>Satarday</option>
			</select>

		</div>
		<div class="col-6 mb-3">
			<div class="input-group common_date_picker">
				<input class="datepicker-here  digits" type="text" data-language="en" name="ejoin" placeholder="Joining date">
			</div>
		</div>
		<div class="col-6 mb-3">
			<select class="select2 form-control wide mb_30" name="elocation">
				<option value='' >Select Location</option>
				<option value='a'>In Ofice</option>
				<option value='ui/ux'>In home</option>
			</select>
		</div>
	</div>
</div>
