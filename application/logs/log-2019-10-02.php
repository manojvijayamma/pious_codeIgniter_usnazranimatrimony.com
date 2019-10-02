<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-02 19:58:03 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'pious_matrimony.country_master.country_name' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `country_code`, `country_name`
FROM `country_master`
WHERE `is_deleted` = 'No' AND `country_code` != '' GROUP BY country_code
