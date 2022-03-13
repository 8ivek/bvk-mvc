CREATE TABLE `bvk_mvc`.`posts` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(45) NULL,
`content` VARCHAR(45) NULL,
`created_at` DATETIME NULL,
`updated_at` DATETIME NULL,
PRIMARY KEY (`id`));

INSERT INTO `bvk_mvc`.`posts` (`title`, `content`, `created_at`, `updated_at`) VALUES ('first post', 'first post content', '2021-03-09 06:10:00', '2021-03-09 06:10:00');

INSERT INTO `bvk_mvc`.`posts` (`title`, `content`, `created_at`, `updated_at`) VALUES ('second post', 'second post content', '2021-03-08 06:10:00', '2021-03-09 06:10:00');

INSERT INTO `bvk_mvc`.`posts` (`title`, `content`, `created_at`, `updated_at`) VALUES ('third post', 'third post content', '2021-03-07 06:10:00', '2021-03-09 06:10:00');