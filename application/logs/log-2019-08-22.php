<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-22 21:25:31 --> Query error: Unknown column 'designation.occupation_id' in 'on clause' - Invalid query: SELECT `designation`.*, `occupation`.`occupation_name`
FROM `designation`
LEFT JOIN `occupation` ON `occupation`.`id` = `designation`.`occupation_id`
WHERE `designation`.`is_deleted` = 'No'
ORDER BY `designation`.`designation_name` DESC
 LIMIT 10
