<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-13 09:52:14 --> Severity: error --> Exception: Call to undefined method Staff_assignment_reports::clear_filter() C:\xampp\htdocs\mega_matrimony\original_script\application\controllers\control-panel\Staff_assignment_reports.php 25
ERROR - 2019-06-13 11:04:01 --> Query error: Unknown column 'member_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `member_id` != '' and `action` = 'Assign' and `user_type` = 'Staff' and `assign_to` = '1'
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-13 11:06:20 --> Severity: Notice --> Undefined index: adminrole_id C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\lead_generation_add_comment.php 97
ERROR - 2019-06-13 11:09:46 --> Severity: Notice --> Undefined index: adminrole_id C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\lead_generation_add_comment.php 97
ERROR - 2019-06-13 11:11:12 --> Severity: Notice --> Undefined index: adminrole_id C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\lead_generation_add_comment.php 97
ERROR - 2019-06-13 11:46:49 --> Severity: Warning --> Illegal string offset 'email_subject' C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2939
ERROR - 2019-06-13 11:46:49 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2939
ERROR - 2019-06-13 11:46:49 --> Severity: Warning --> Illegal string offset 'email_content' C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2940
ERROR - 2019-06-13 11:46:49 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2940
ERROR - 2019-06-13 13:52:49 --> Query error: Unknown column 'adminrole_id' in 'field list' - Invalid query: SELECT `username`, `email`, `phone_no_1`, `adminrole_id`, `franchised_by`
FROM `leads_generation_view`
WHERE `id` = '1'
 LIMIT 1
ERROR - 2019-06-13 13:53:04 --> Query error: Unknown column 'adminrole_id' in 'field list' - Invalid query: SELECT `username`, `email`, `phone_no_1`, `adminrole_id`, `franchised_by`
FROM `leads_generation_view`
WHERE `id` = '1'
 LIMIT 1
ERROR - 2019-06-13 14:33:12 --> Query error: Unknown column 'lead_generation_id' in 'where clause' - Invalid query: SELECT `lead_generstion_followup_system_view`.*
FROM `lead_generstion_followup_system_view`
WHERE `lead_generation_id` != '' and `action` = 'Assign' and `user_type` = 'admin' and `assign_to` = '1'
AND `lead_generstion_followup_system_view`.`is_deleted` = 'No'
ORDER BY `lead_generstion_followup_system_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-13 14:33:20 --> Query error: Unknown column 'lead_generstion_followup_system_view.is_deleted' in 'where clause' - Invalid query: SELECT `lead_generstion_followup_system_view`.*
FROM `lead_generstion_followup_system_view`
WHERE `lead_generstion_followup_system_view`.`is_deleted` = 'No'
ORDER BY `lead_generstion_followup_system_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-13 14:33:45 --> Query error: Unknown column 'lead_generstion_followup_system_view.is_deleted' in 'where clause' - Invalid query: SELECT `lead_generstion_followup_system_view`.*
FROM `lead_generstion_followup_system_view`
WHERE `lead_generstion_followup_system_view`.`is_deleted` = 'No'
ORDER BY `lead_generstion_followup_system_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-13 14:34:54 --> Query error: Unknown column 'lead_generstion_followup_system_view.assign_date' in 'order clause' - Invalid query: SELECT `lead_generstion_followup_system_view`.*
FROM `lead_generstion_followup_system_view`
ORDER BY `lead_generstion_followup_system_view`.`assign_date` DESC
 LIMIT 10
