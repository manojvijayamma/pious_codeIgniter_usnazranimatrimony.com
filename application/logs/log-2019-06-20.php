<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-20 10:56:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' or matri_id = '1 = 1 or 1' or 1 = 1' )
 LIMIT 1' at line 6 - Invalid query: SELECT `id`, `matri_id`, `status`, `email`, `username`, `firstname`, `lastname`, `photo1`, `plan_name`, `plan_status`, `gender`, `password`, `mobile`, `mobile_verify_status`, `logged_in`
FROM `register`
WHERE `register`.`is_deleted` = 'No'
AND `password` = 'e127fba112c1a685e69a66b2533ff811'
AND `is_deleted` = 'No'
AND  (email = '1 = 1 or 1' or 1 = 1' or matri_id = '1 = 1 or 1' or 1 = 1' )
 LIMIT 1
