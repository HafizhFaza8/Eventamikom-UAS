CREATE DATABASE IF NOT EXISTS `eventtiket_3328` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
RENAME TABLE `eventamikom-3328`.`cache` TO `eventtiket_3328`.`cache`,
`eventamikom-3328`.`cache_locks` TO `eventtiket_3328`.`cache_locks`,
`eventamikom-3328`.`categories` TO `eventtiket_3328`.`categories`,
`eventamikom-3328`.`events` TO `eventtiket_3328`.`events`,
`eventamikom-3328`.`failed_jobs` TO `eventtiket_3328`.`failed_jobs`,
`eventamikom-3328`.`job_batches` TO `eventtiket_3328`.`job_batches`,
`eventamikom-3328`.`jobs` TO `eventtiket_3328`.`jobs`,
`eventamikom-3328`.`migrations` TO `eventtiket_3328`.`migrations`,
`eventamikom-3328`.`partners` TO `eventtiket_3328`.`partners`,
`eventamikom-3328`.`password_reset_tokens` TO `eventtiket_3328`.`password_reset_tokens`,
`eventamikom-3328`.`sessions` TO `eventtiket_3328`.`sessions`,
`eventamikom-3328`.`transactions` TO `eventtiket_3328`.`transactions`,
`eventamikom-3328`.`users` TO `eventtiket_3328`.`users`;
