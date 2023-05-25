<!DOCTYPE html>
<html>
<head>
	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('student/create/', "class='form-horizontal'"); ?>

<div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Student Name </label>
  <div class="col-sm-9">
  <input type="text" id="form-field-1" placeholder="Name" name="stud_name" class="col-xs-10 col-sm-5" value="<?php echo set_value('stud_name'); ?>">
  </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Phone_no </label>
  <div class="col-sm-9">
    <input type="number" id="form-field-2" placeholder="Mobile_no" class="col-xs-10 col-sm-5" name="mob_no" value="<?php echo set_value('mob_no'); ?>">
  </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> City </label>
<div class="col-sm-9">
      <input type="text" id="form-field-3" placeholder="City_name" class="col-xs-10 col-sm-5" name="city" value="<?php echo set_value('city'); ?>">
</div>



<div class="space-4"></div>
<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
      <button class="btn btn-info" type="submit">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Submit
      </button>
      &nbsp; &nbsp; &nbsp;
      <button class="btn" type="reset">
        <i class="ace-icon fa fa-undo bigger-110"></i>
        Reset
      </button>
</div>
</div>
</html>