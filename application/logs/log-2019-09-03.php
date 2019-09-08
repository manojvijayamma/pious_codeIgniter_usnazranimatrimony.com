<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-03 20:24:23 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `who_viewed_my_profile`
LEFT JOIN `register_view` ON `who_viewed_my_profile`.`viewed_member_id` = `register_view`.`matri_id`
WHERE `who_viewed_my_profile`.`my_id` = 'USNZM34'
AND `register_view`.`is_deleted` = 'No'
ERROR - 2019-09-03 20:24:24 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `who_viewed_my_profile`
LEFT JOIN `register_view` ON `who_viewed_my_profile`.`viewed_member_id` = `register_view`.`matri_id`
WHERE `who_viewed_my_profile`.`my_id` = 'USNZM34'
AND `register_view`.`is_deleted` = 'No'
ERROR - 2019-09-03 20:42:45 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:04 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:05 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:06 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:41 --> Severity: error --> Exception: Call to undefined method Common_model::query() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:41 --> Severity: error --> Exception: Call to undefined method Common_model::query() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:43:52 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:45:09 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:50:55 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:50:56 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:50:57 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:50:57 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:50:57 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:51:11 --> Severity: Notice --> Array to string conversion /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:51:25 --> Severity: Notice --> Array to string conversion /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 9
ERROR - 2019-09-03 20:53:20 --> Severity: error --> Exception: Call to a member function result() on array /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 10
ERROR - 2019-09-03 20:54:15 --> Severity: error --> Exception: Cannot use object of type stdClass as array /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 10
ERROR - 2019-09-03 20:54:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*) as total from register_view as r' at line 1 - Invalid query: select count(r.*) as total from register_view as r
ERROR - 2019-09-03 20:54:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*) as total from register_view as r' at line 1 - Invalid query: select count(r.*) as total from register_view as r
ERROR - 2019-09-03 21:10:57 --> Severity: Notice --> Array to string conversion /var/www/html/pious/pious_usnazranimatrimony.com/application/views/front_end/express_interest.php 8
ERROR - 2019-09-03 21:45:27 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `payments_view`
WHERE `matri_id` = 'USNZM34'
AND `is_deleted` = 'No'
AND `current_plan` = 'Yes'
 LIMIT 1
ERROR - 2019-09-03 21:45:41 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT `id`
FROM `payments_view`
WHERE `payments_view`.`is_deleted` = 'No'
AND `matri_id` = 'USNZM34'
AND `current_plan` = 'Yes'
AND `is_deleted` = 'No'
ERROR - 2019-09-03 21:46:41 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `payments_view`
WHERE `matri_id` = 'USNZM34'
AND `is_deleted` = 'No'
AND `current_plan` = 'Yes'
 LIMIT 1
ERROR - 2019-09-03 21:47:29 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `payments_view`
WHERE `matri_id` = 'USNZM34'
AND `is_deleted` = 'No'
AND `current_plan` = 'Yes'
 LIMIT 1
ERROR - 2019-09-03 21:47:36 --> Query error: The user specified as a definer ('smccubnr'@'localhost') does not exist - Invalid query: SELECT *
FROM `payments_view`
WHERE `matri_id` = 'USNZM34'
AND `is_deleted` = 'No'
AND `current_plan` = 'Yes'
 LIMIT 1
