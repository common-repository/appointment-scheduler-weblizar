<?phpif ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directlyglobal $wpdb;$appointment_staff_details = $wpdb->get_results( "select * from $wpdb->prefix"."apt_staff");?><label for="staff_member"><?php _e( 'Staff Member', WF_A_P_SYSTEM) ?></label><select id="staff_member" class="field form-control" name="staff_member">	<option value="0"><?php _e("Select Staff",WF_A_P_SYSTEM ); ?></option>	<?php foreach($appointment_staff_details as $appointment_staff_single_detail){ ?>	<option  value="<?php echo $appointment_staff_single_detail->id;?>"><?php echo $appointment_staff_single_detail->staff_member_name;?></option>	<?php } ?></select><span class="validation_alert" id="cal_staff_alert"><?php _e("Please select one",WF_A_P_SYSTEM); ?></span>