<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-18 09:55:59 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `education_detail`
WHERE   (
`education_name` = '≈≈≈Ω≈Ωç√'
 )
AND `education_detail`.`is_deleted` = 'No'
ERROR - 2019-06-18 09:56:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `education_detail`.`is_deleted` = 'No'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `education_detail`
WHERE   (
 )
AND `education_detail`.`is_deleted` = 'No'
ERROR - 2019-06-18 10:04:33 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:05:30 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:05:36 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:05:47 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:18:42 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:19:49 --> Severity: Notice --> Undefined property: Assignment_reports::$set_table_name C:\xampp\htdocs\mega_matrimony\original_script\system\core\Model.php 77
ERROR - 2019-06-18 10:29:23 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:40:41 --> Query error: Unknown column 'country_name' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`email` like ( _latin1 '%india%' ) or `country_name` like ( _latin1 '%india%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:40:53 --> Query error: Unknown column 'country_name' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`email` like ( _latin1 '%india%' ) or `country_name` like ( _latin1 '%india%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 10:54:12 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 10:54:23 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 10:55:59 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 10:56:16 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:10:21 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:11:59 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:13:03 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:21:21 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:30:18 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:33:51 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 11:33:56 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 11:37:39 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_assign_history_view`.*
FROM `lead_generation_assign_history_view`
WHERE `lead_generation_id` != '' and `user_type` = 'Staff' and `action` = 'Unassigned' 
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
AND `lead_generation_assign_history_view`.`is_deleted` = 'No'
ORDER BY `lead_generation_assign_history_view`.`assign_date` DESC
 LIMIT 10
ERROR - 2019-06-18 11:38:28 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:45:15 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 11:48:06 --> Severity: Notice --> Undefined index: display_in C:\xampp\htdocs\mega_matrimony\original_script\application\models\back_end\Assignment_reports_model.php 607
ERROR - 2019-06-18 11:49:18 --> Query error: Unknown column 'matri_id' in 'where clause' - Invalid query: SELECT `lead_generation_followup_system_view`.*
FROM `lead_generation_followup_system_view`
WHERE `next_followup_date` != '' and `next_followup_date` > '2019-06-18'
AND  (`matri_id` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) or `email` like ( _latin1 '%≈≈≈Ω≈Ωç√%' ) )
ORDER BY `lead_generation_followup_system_view`.`created_on` DESC
 LIMIT 10
ERROR - 2019-06-18 12:17:48 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `education_detail`
WHERE   (
`education_name` = '≈ç≈˜∫ç˙ß∂˙ß∂∫∫≈µç˜∫µ≈∫çµ≈cn'
 )
AND `education_detail`.`is_deleted` = 'No'
ERROR - 2019-06-18 12:21:31 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `education_detail`
WHERE   (
`education_name` = '≈ç≈˜∫ç˙ß∂˙ß∂∫∫≈µç˜∫µ≈∫çµ≈cn'
 )
AND `education_detail`.`is_deleted` = 'No'
ERROR - 2019-06-18 13:45:07 --> Severity: Warning --> preg_match(): Unknown modifier ']' C:\xampp\htdocs\mega_matrimony\original_script\system\core\URI.php 328
ERROR - 2019-06-18 15:57:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '≈≈≈Ω≈Ωç√' or `matri_id` = ''≈≈≈Ω≈Ωç√' ) 
 LIMIT 1' at line 6 - Invalid query: SELECT `id`, `matri_id`, `status`, `email`, `username`, `firstname`, `lastname`, `photo1`, `plan_name`, `plan_status`, `gender`, `password`, `mobile`, `mobile_verify_status`, `logged_in`
FROM `register`
WHERE `register`.`is_deleted` = 'No'
AND `password` = '4c47e3fbf3f65f1b781f6435b3284c79'
AND `is_deleted` = 'No'
AND  (`email` = ''≈≈≈Ω≈Ωç√' or `matri_id` = ''≈≈≈Ω≈Ωç√' ) 
 LIMIT 1
ERROR - 2019-06-18 15:58:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '≈≈≈Ω≈Ωç√' or `matri_id` = ''≈≈≈Ω≈Ωç√' ) 
 LIMIT 1' at line 6 - Invalid query: SELECT `id`, `matri_id`, `status`, `email`, `username`, `firstname`, `lastname`, `photo1`, `plan_name`, `plan_status`, `gender`, `password`, `mobile`, `mobile_verify_status`, `logged_in`
FROM `register`
WHERE `register`.`is_deleted` = 'No'
AND `password` = '4c47e3fbf3f65f1b781f6435b3284c79'
AND `is_deleted` = 'No'
AND  (`email` = ''≈≈≈Ω≈Ωç√' or `matri_id` = ''≈≈≈Ω≈Ωç√' ) 
 LIMIT 1
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:06:16 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:22 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:14:44 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:15:25 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:16:02 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 453
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:17:33 --> Severity: Notice --> Undefined variable: disp_select_all C:\xampp\htdocs\mega_matrimony\original_script\application\views\back_end\data_table_member.php 454
ERROR - 2019-06-18 17:35:12 --> Severity: Notice --> Undefined variable: query_generated_org C:\xampp\htdocs\mega_matrimony\original_script\application\models\Common_model.php 854
ERROR - 2019-06-18 17:35:12 --> Query error: Query was empty - Invalid query: 
ERROR - 2019-06-18 17:50:32 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT `id`, `matri_id`, `status`, `email`, `username`, `firstname`, `lastname`, `photo1`, `plan_name`, `plan_status`, `gender`, `password`, `mobile`, `mobile_verify_status`, `logged_in`
FROM `register`
WHERE `register`.`is_deleted` = 'No'
AND `password` = 'ba4195b95833a7b3b0928ff598afb40c'
AND `is_deleted` = 'No'
AND  (`email` = '≈ç≈˜∫ç˙ß∂˙ß∂∫∫≈µç˜∫µ≈∫çµ≈cn' or `matri_id` = '≈ç≈˜∫ç˙ß∂˙ß∂∫∫≈µç˜∫µ≈∫çµ≈cn' ) 
 LIMIT 1
