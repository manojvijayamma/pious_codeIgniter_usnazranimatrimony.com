<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-12 10:11:23 --> Severity: Notice --> Undefined property: Lead_generation::$base_url_admin_cm C:\xampp\htdocs\mega_matrimony\original_script\system\core\Model.php 77
ERROR - 2019-06-12 10:16:56 --> Severity: error --> Exception: Call to undefined method Lead_generation::display_filter_form() C:\xampp\htdocs\mega_matrimony\original_script\application\controllers\control-panel\Lead_generation.php 167
ERROR - 2019-06-12 10:18:32 --> Query error: The target table leads_generation_view of the INSERT is not insertable-into - Invalid query: INSERT INTO `leads_generation_view` (`username`, `email`, `gender`, `address`, `phone_no_1`, `phone_no_2`, `phone_no_3`, `phone_no_4`, `country`, `interest`, `next_followup_date`) VALUES ('dfh', 'sdfg@dffgh.dfg', 'Male', '', '', '', '', '', '3', 'Green', '2019-06-12 10:18:32')
ERROR - 2019-06-12 10:18:48 --> Query error: The target table leads_generation_view of the INSERT is not insertable-into - Invalid query: INSERT INTO `leads_generation_view` (`username`, `email`, `gender`, `address`, `phone_no_1`, `phone_no_2`, `phone_no_3`, `phone_no_4`, `country`, `interest`, `next_followup_date`) VALUES ('sdfgh', 'drfh@dhfj.sdfg', 'Male', '', '', '', '', '', '3', 'New', '2019-06-12 10:18:48')
ERROR - 2019-06-12 10:19:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation_view`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation_view`
WHERE   (
 )
AND `leads_generation_view`.`is_deleted` = 'No'
ERROR - 2019-06-12 10:22:22 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 1952
ERROR - 2019-06-12 10:27:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation_view`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation_view`
WHERE   (
 )
AND `leads_generation_view`.`is_deleted` = 'No'
ERROR - 2019-06-12 10:29:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation`
WHERE   (
 )
AND `leads_generation`.`is_deleted` = 'No'
ERROR - 2019-06-12 10:30:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation`
WHERE   (
 )
AND `leads_generation`.`is_deleted` = 'No'
ERROR - 2019-06-12 10:31:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation`
WHERE   (
 )
AND `leads_generation`.`is_deleted` = 'No'
ERROR - 2019-06-12 10:31:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `leads_generation`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `leads_generation`
WHERE   (
 )
AND `leads_generation`.`is_deleted` = 'No'
ERROR - 2019-06-12 11:01:23 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\mega_matrimony\original_script\application\models\back_end\Lead_generation_model.php 205
ERROR - 2019-06-12 11:24:14 --> Query error: Unknown column 'leads_generation_view.last_login' in 'order clause' - Invalid query: SELECT `leads_generation_view`.*
FROM `leads_generation_view`
WHERE `leads_generation_view`.`is_deleted` = 'No'
ORDER BY `leads_generation_view`.`last_login` DESC
 LIMIT 10
ERROR - 2019-06-12 11:24:18 --> Query error: Unknown column 'leads_generation_view.registered_on' in 'order clause' - Invalid query: SELECT `leads_generation_view`.*
FROM `leads_generation_view`
WHERE `leads_generation_view`.`is_deleted` = 'No'
ORDER BY `leads_generation_view`.`registered_on` ASC
 LIMIT 10
ERROR - 2019-06-12 11:24:35 --> Query error: Unknown column 'leads_generation_view.registered_on' in 'order clause' - Invalid query: SELECT `leads_generation_view`.*
FROM `leads_generation_view`
WHERE `leads_generation_view`.`is_deleted` = 'No'
ORDER BY `leads_generation_view`.`registered_on` ASC
 LIMIT 10
ERROR - 2019-06-12 11:25:24 --> Query error: Unknown column 'leads_generation_view.last_login' in 'order clause' - Invalid query: SELECT `leads_generation_view`.*
FROM `leads_generation_view`
WHERE `leads_generation_view`.`is_deleted` = 'No'
ORDER BY `leads_generation_view`.`last_login` DESC
 LIMIT 10
ERROR - 2019-06-12 11:40:43 --> Query error: Table 'mega_matrimony.$tab' doesn't exist - Invalid query: SELECT *
FROM `$tab`
WHERE `$tab`.`is_deleted` = 'No'
AND `id` = '12'
 LIMIT 1
ERROR - 2019-06-12 11:40:52 --> Query error: Table 'mega_matrimony.$tab' doesn't exist - Invalid query: SELECT *
FROM `$tab`
WHERE `$tab`.`is_deleted` = 'No'
AND `id` = '12'
 LIMIT 1
ERROR - 2019-06-12 11:41:17 --> Query error: Table 'mega_matrimony.$tab' doesn't exist - Invalid query: SELECT *
FROM `$tab`
WHERE `$tab`.`is_deleted` = 'No'
AND `id` = '12'
 LIMIT 1
ERROR - 2019-06-12 11:41:37 --> Query error: Table 'mega_matrimony.lead_generation' doesn't exist - Invalid query: SELECT *
FROM `lead_generation`
WHERE `lead_generation`.`is_deleted` = 'No'
AND `id` = '12'
 LIMIT 1
ERROR - 2019-06-12 11:41:52 --> Query error: Unknown column '$add_id' in 'where clause' - Invalid query: SELECT *
FROM `assign_history`
WHERE `assign_history`.`is_deleted` = 'No'
AND `$add_id` = '12'
AND `user_type` = 'Staff'
 LIMIT 1
ERROR - 2019-06-12 11:42:21 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2988
ERROR - 2019-06-12 11:42:21 --> Severity: Notice --> Undefined index: matri_id C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 2990
ERROR - 2019-06-12 12:15:17 --> Query error: Unknown column 'lead_generation_id' in 'where clause' - Invalid query: SELECT `assign_history_view`.*
FROM `assign_history_view`
WHERE `lead_generation_id` != '' and `action` = 'Assign' and `user_type` = 'Staff' 
AND `assign_history_view`.`is_deleted` = 'No'
ORDER BY `assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 15:16:30 --> Severity: Warning --> Use of undefined constant sdf - assumed 'sdf' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 511
ERROR - 2019-06-12 17:00:38 --> Query error: Table 'mega_matrimony.lead_generation_followup_system_view' doesn't exist - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` = '2019-06-12' 
