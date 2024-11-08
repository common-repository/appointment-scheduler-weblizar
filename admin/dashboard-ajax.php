<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<script>
jQuery(document).ready(function() {
	jQuery('[data-toggle=popover_coupon_used]').popover({
		content: jQuery('#popover_coupon_used').html(),
		html: true
	}).on("mouseenter", function () {
		jQuery(this).popover('show');
	}).on("mouseleave", function () {
		jQuery(this).popover('hide');
	});

	jQuery('[data-toggle=coupon_used_month]').popover({
		content: jQuery('#coupon_used_month').html(),
		html: true
	}).on("mouseenter", function () {
		jQuery(this).popover('show');
	}).on("mouseleave", function () {
		jQuery(this).popover('hide');
	});
});
</script>
<style>
.popover-title {
	background-color: white !important;
	color:black !important;	
}
</style>
<?php
global $wpdb;
$appointments_table =	$wpdb->prefix."apt_appointments";
$staff_table =	$wpdb->prefix."apt_staff";
$clients_table =	$wpdb->prefix."apt_clients";
$payment_table =	$wpdb->prefix."apt_payment";
$coupon_table =	$wpdb->prefix."apt_coupons";
$services_table =	$wpdb->prefix."apt_services";
?>
<div class="row ap-total-graph">
	<div class="col-md-12 col-sm-12"><h3 style="padding-left: 0px"><?php _e( 'Appointment Reports',WF_A_P_SYSTEM ) ?></h3></div>
	<div class="col-md-3 col-sm-6">
		<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
			<div class="boxchart"><i class="fa fa-thumbs-up dashboard_icons" aria-hidden="true"></i><?php _e( 'Status',WF_A_P_SYSTEM ) ?>  </div>
			<?php
			$approved_appointment_details = $wpdb->get_results( "select * from $appointments_table where status='approved'");
			$approved_appointments= count($approved_appointment_details);
			?>
			<div class="number"><?php echo $approved_appointments; ?><i class="icon-arrow-up"></i></div>
			<div class="title"><?php _e( 'Approved',WF_A_P_SYSTEM ) ?></div>
			<div class="footer">
				<div class="boxchart"><?php _e( 'Approved Report',WF_A_P_SYSTEM ) ?></div>
			</div>	
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
			<div class="boxchart"><i class="fa fa-unlock dashboard_icons" aria-hidden="true"></i><?php _e( 'Status',WF_A_P_SYSTEM ) ?>  </div>
			<?php
			$pending_appointment_details = $wpdb->get_results( "select * from $appointments_table where status='pending'");
			$pending_appointments= count($pending_appointment_details);
			?>
			<div class="number"><?php echo $pending_appointments; ?><i class="icon-arrow-up"></i></div>
			<div class="title"><?php _e( 'Pending',WF_A_P_SYSTEM ) ?></div>
			<div class="footer">
				<div class="boxchart"><?php _e( 'Pending Report',WF_A_P_SYSTEM ) ?></div>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-6">
		<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
			<div class="boxchart"><i class="fa fa-times dashboard_icons" aria-hidden="true"></i><?php _e( 'Status',WF_A_P_SYSTEM ) ?>  </div>
			<?php
			$cancelled_appointment_details = $wpdb->get_results( "select * from $appointments_table where status='cancelled'");
			$cancelled_appointments= count($cancelled_appointment_details);
			?>
			<div class="number"><?php echo $cancelled_appointments; ?><i class="icon-arrow-up"></i></div>
			<div class="title"><?php _e( 'Cancel', WF_A_P_SYSTEM) ?></div>
			<div class="footer">
				<div class="boxchart"><?php _e( 'Cancel Report', WF_A_P_SYSTEM) ?></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6">
		<div class="span3 statbox orange" onTablet="span6" onDesktop="span3">
			<div class="boxchart"><i class="fa fa-check-square-o dashboard_icons" aria-hidden="true"></i><?php _e( 'Status',WF_A_P_SYSTEM ) ?> </div>
				<?php
				$completed_appointment_details = $wpdb->get_results( "select * from $appointments_table where status='completed'");
				$completed_appointments= count($completed_appointment_details);
				?>
			<div class="number"><?php echo $completed_appointments; ?><i class="icon-arrow-down"></i></div>
			<div class="title"><?php _e( 'Complete',WF_A_P_SYSTEM ) ?></div>
			<div class="footer">
				<div class="boxchart"><?php _e( 'Complete Report',WF_A_P_SYSTEM ) ?>  </div>
			</div>
		</div>
	</div>
</div>
<div class="row ap-services-graph">
	<div class="col-md-12 col-sm-12"><h3 style="padding-left: 0px"><?php _e( 'Overall Report',WF_A_P_SYSTEM ) ?></h3></div>
	<div class="col-md-4 col-sm-4">
		<div class="span2" onTablet="span4" onDesktop="span2">
			<div class="circleStatsItemBox orange">
				<div class="header dashboard_appt"><?php _e('Total Customers',WF_A_P_SYSTEM ) ?></div>
				<span class="percent"><?php _e( 'Customers',WF_A_P_SYSTEM ) ?></span>
				<div class="circleStat">
					<?php
					$customer_email_id = $wpdb->get_col( "Select id from $clients_table");
					$regular_clients= count($customer_email_id);
					?>
					<input type="text" value="<?php echo $regular_clients ;?>" class="whiteCircle" />
				</div>		
			</div>
		</div>
	</div>
	
	<div class="col-md-4 col-sm-4">
		<div class="span2" onTablet="span4" onDesktop="span2">
			<div class="circleStatsItemBox purple">
				<div class="header dashboard_appt"><?php _e('Total Services',WF_A_P_SYSTEM ) ?></div>
				<span class="percent"><?php _e( 'Services',WF_A_P_SYSTEM ) ?></span>
				<div class="circleStat">
					<?php
					$service_id = $wpdb->get_col( "Select id from $services_table");
					$total_services= count($service_id);
					?>
					<input type="text" value="<?php echo $total_services ;?>" class="whiteCircle" />
				</div>		
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-4">
		<div class="span2" onTablet="span4" onDesktop="span2">
			<div class="circleStatsItemBox black">
				<div class="header dashboard_appt"><?php _e('Total Appointments',WF_A_P_SYSTEM ) ?></div>
				<span class="percent"><?php _e( 'Appointments',WF_A_P_SYSTEM ) ?></span>
				<div class="circleStat">
					<?php   
					$appointments = $wpdb->get_col( "Select id from $appointments_table");
					$total_appointments= count($appointments);
					?>
					<input type="text" value="<?php echo $total_appointments ;?>" class="whiteCircle" />
				</div>		
			</div>
		</div>
	</div>
</div>