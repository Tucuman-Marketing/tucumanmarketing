# DEVMC 2024.9.1
ALTER TABLE recruitment_jobs ADD COLUMN country VARCHAR(255) NULL;

INSERT INTO recruitment_candidates_statuses (uuid, name, icon, color, sort_order, is_protected, created_at, updated_at, deleted_at) VALUES
    ('d2ce654a-bc4c-445e-ae03-19a9d3214277', 'Pendiente', 'bi-stopwatch-fill', '#FFFF00', 1, 0, '2024-08-28 17:29:48', '2024-08-29 14:56:17', NULL),
    ('ce2ee53d-ccc9-41b3-a122-ccc32d5376c3', 'Rechazado', 'bi-clipboard-x', '#FF0000', 2, 0, '2024-08-29 14:55:52', '2024-08-29 14:55:52', NULL),
    ('14874b47-62f9-4989-b096-999fc405b27d', 'Presentado', 'bi-people-fill', '#008000', 3, 0, '2024-08-29 14:56:55', '2024-08-29 14:56:55', NULL);


# DEVGS 2024.8.29
ALTER TABLE recruitment_job_candidates ADD candidate_status_id BIGINT UNSIGNED NOT NULL;

# DEVGS 2024.8.28 
ALTER TABLE recruitment_candidates ADD status_id bigint unsigned NULL;
ALTER TABLE recruitment_candidates ADD CONSTRAINT recruitment_candidates_statuses_FK FOREIGN KEY (status_id) REFERENCES recruitment_candidates_statuses(id);

CREATE TABLE `recruitment_candidates_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recruitment_statuses_uuid_unique` (`uuid`)
)

# DEVMC 2024.8.27
ALTER TABLE recruitment_jobs 
ADD COLUMN work_mode VARCHAR(255) NULL, 
ADD COLUMN work_type VARCHAR(255) NULL;

# DEVGS 2024.8.20
ALTER TABLE `recruitment_candidates`
  DROP COLUMN `job_title`;

CREATE TABLE `recruitment_candidates_educations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `education_level` varchar(100) DEFAULT NULL,
  `education_state` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recruitment_candidates_educations_recruitment_candidates_FK` (`candidate_id`),
  CONSTRAINT `recruitment_candidates_educations_recruitment_candidates_FK` FOREIGN KEY (`candidate_id`) REFERENCES `recruitment_candidates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# DEVMC 2024.8.20
ALTER TABLE recruitment_candidates
    MODIFY COLUMN name VARCHAR(255) NULL,
    MODIFY COLUMN email VARCHAR(255) NULL,
    MODIFY COLUMN phone VARCHAR(20) NULL,
    MODIFY COLUMN cv VARCHAR(255) NULL,
    MODIFY COLUMN last_name VARCHAR(100) NULL,
    MODIFY COLUMN gender VARCHAR(25) NULL,
    MODIFY COLUMN title VARCHAR(100) NULL,
    MODIFY COLUMN education_level VARCHAR(100) NULL,
    MODIFY COLUMN education_state VARCHAR(100) NULL,
    MODIFY COLUMN linkedin VARCHAR(100) NULL,
    ADD COLUMN description VARCHAR(255) NULL;

# DEVGS 2024.8.18
CREATE TABLE `recruitment_job_candidates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `job_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `recruitment_job_candidates_recruitment_jobs_FK` (`job_id`),
  KEY `recruitment_job_candidates_recruitment_candidates_FK` (`candidate_id`),
  CONSTRAINT `recruitment_job_candidates_recruitment_candidates_FK` FOREIGN KEY (`candidate_id`) REFERENCES `recruitment_candidates` (`id`),
  CONSTRAINT `recruitment_job_candidates_recruitment_jobs_FK` FOREIGN KEY (`job_id`) REFERENCES `recruitment_jobs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `recruitment_candidates`
ADD COLUMN `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
ADD COLUMN `gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
ADD COLUMN `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
ADD COLUMN `education_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
ADD COLUMN `education_state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
ADD COLUMN `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
ADD COLUMN `job_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL;

CREATE TABLE `recruitment_candidates_lenguages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `language` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `language_level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recruitment_candidates_lenguages_recruitment_candidates_FK` (`candidate_id`),
  CONSTRAINT `recruitment_candidates_lenguages_recruitment_candidates_FK` FOREIGN KEY (`candidate_id`) REFERENCES `recruitment_candidates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `recruitment_candidates_skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_id` bigint unsigned NOT NULL,
  `skill_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recruitment_candidates_skills_recruitment_candidates_FK` (`candidate_id`),
  KEY `recruitment_candidates_skills_recruitment_skills_FK` (`skill_id`),
  CONSTRAINT `recruitment_candidates_skills_recruitment_candidates_FK` FOREIGN KEY (`candidate_id`) REFERENCES `recruitment_candidates` (`id`),
  CONSTRAINT `recruitment_candidates_skills_recruitment_skills_FK` FOREIGN KEY (`skill_id`) REFERENCES `recruitment_skills` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# DEVMC 2024.8.13
ALTER TABLE blog_tags ADD COLUMN slug VARCHAR(255) NULL;

ALTER TABLE recruitment_job_skills DROP COLUMN uuid;

ALTER TABLE recruitment_job_tags DROP COLUMN uuid;

ALTER TABLE recruitment_job_skills 
DROP COLUMN sort_order, 
DROP COLUMN is_protected;

ALTER TABLE recruitment_categories 
ADD COLUMN slug VARCHAR(255),
MODIFY COLUMN name VARCHAR(255) UNIQUE;

ALTER TABLE recruitment_tags 
MODIFY COLUMN name VARCHAR(255) UNIQUE,
ADD COLUMN slug VARCHAR(255);

ALTER TABLE recruitment_jobs 
ADD COLUMN slug VARCHAR(255);

ALTER TABLE recruitment_skills 
MODIFY COLUMN name VARCHAR(255) UNIQUE,
ADD COLUMN slug VARCHAR(255) UNIQUE;

# DEVMC 2024.7.17
ALTER TABLE blog_statuses
ADD COLUMN `uuid` CHAR(36) NOT NULL;

ALTER TABLE blog_tags
ADD COLUMN `uuid` CHAR(36) NOT NULL;

ALTER TABLE blog_comments
ADD COLUMN `uuid` CHAR(36) NOT NULL;

ALTER TABLE blog_categories
DROP COLUMN image_filename,
DROP COLUMN thumbnail,
DROP COLUMN thumbnail_filename;

# DEVMC 2024.6.30
CREATE TABLE `core_forms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `instruction` longtext NOT NULL,
  `create` longtext DEFAULT NULL,
  `edit` longtext DEFAULT NULL,
  `sort_order` int unsigned NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `css` longtext DEFAULT NULL,
  `js` longtext DEFAULT NULL,
  `html` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE blogs 
ADD COLUMN views BIGINT DEFAULT 0,
ADD COLUMN likes BIGINT DEFAULT 0,
ADD COLUMN is_published BOOLEAN DEFAULT FALSE,
ADD COLUMN published_at TIMESTAMP NULL;


CREATE TABLE `blog_comments` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `post_id` BIGINT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `content` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT `fk_blog_comments_post_id` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_blog_comments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE blog_tags
ADD COLUMN sort_order INT NULL,
ADD COLUMN is_protected BOOLEAN NOT NULL DEFAULT 0,
ADD COLUMN icon VARCHAR(255) NULL;


ALTER TABLE blog_statuses
ADD COLUMN sort_order INT NULL,
ADD COLUMN is_protected BOOLEAN NOT NULL DEFAULT 0,
ADD COLUMN icon VARCHAR(255) NULL;


ALTER TABLE blog_categories
ADD COLUMN sort_order INT NULL,
ADD COLUMN is_protected BOOLEAN NOT NULL DEFAULT 0,
ADD COLUMN icon VARCHAR(255) NULL,
ADD COLUMN color VARCHAR(255) NULL;


# DEVMC 2024.5.5
ALTER TABLE media
ADD temp BOOLEAN DEFAULT 0;



# DEVMC 2024.3.20
ALTER TABLE users ADD deleted_at TIMESTAMP NULL DEFAULT NULL;


INSERT INTO permissions (name, slug, module)
VALUES 
('blog', 'blog-access', 'blog'),
('ticket', 'ticket-access', 'ticket'),
('recibos', 'recibos-access', 'recibos'),
('user', 'user-access', 'user'),
('ticket-area', 'ticket-area-access', 'ticket-area'),
('ticket-status', 'ticket-status-access', 'ticket-status'),
('ticket-categories', 'ticket-categories-access', 'ticket-categories'),
('ticket-staff', 'ticket-staff-access', 'ticket-staff'),
('expenses', 'expenses-access', 'expenses'),
('setting-company', 'setting-company-access', 'setting-company'),
('setting-email', 'setting-email-access', 'setting-email');

# DEVMC 2024.3.8
ALTER TABLE media
ADD url VARCHAR(255);

CREATE TABLE `media` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `model_type` varchar(255) NOT NULL,
    `model_id` bigint unsigned NOT NULL,
    `uuid` char(36) DEFAULT NULL,
    `collection_name` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `file_name` varchar(255) NOT NULL,
    `mime_type` varchar(255) DEFAULT NULL,
    `disk` varchar(255) NOT NULL,
    `conversions_disk` varchar(255) DEFAULT NULL,
    `size` bigint unsigned NOT NULL,
    `manipulations` json NOT NULL,
    `custom_properties` json NOT NULL,
    `generated_conversions` json NOT NULL,
    `responsive_images` json NOT NULL,
    `order_column` int unsigned DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `media_uuid_unique` (`uuid`),
    KEY `media_model_id_model_type_index` (`model_id`,`model_type`),
    KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

# DEVMC 2024.3.8
INSERT INTO `role_user` VALUES (24, NULL, 1, 2, NULL, NULL, NULL);
INSERT INTO `roles` VALUES (1, '19536505-13eb-493b-ad66-6b4e481158ww', 'superadmin', 'superadmin', 'superadmin', 1, NULL, NULL, NULL);


# DEVMC 2024.1.3
ALTER TABLE subscription_plans
ADD quantity_vehicles INT NULL;

# DEVMC 2024.2.24
ALTER TABLE subscription_plans
ADD COLUMN request JSON NULL,
ADD COLUMN response JSON NULL,
ADD COLUMN response_error BOOLEAN NULL;
ADD COLUMN price INT NULL;
ADD COLUMN frequency INT NULL,
ADD COLUMN frequency_type VARCHAR(255) NULL,
ADD COLUMN repetitions INT NULL,
ADD COLUMN billing_day INT NULL,
ADD COLUMN billing_day_proportional BOOLEAN NULL;

ALTER TABLE subscription_plans ADD mp_planId VARCHAR(255) NULL;


# DEVMC 2024.2.13
ALTER TABLE subscriptions DROP COLUMN status;
ALTER TABLE subscriptions ADD COLUMN `status` ENUM('Cancelado', 'Pendiente', 'Pagado') NOT NULL DEFAULT 'Pendiente';

ALTER TABLE subscriptions ADD COLUMN last_edited_by_user_at TIMESTAMP NULL;
ALTER TABLE subscriptions ADD COLUMN next_edited_by_user_at TIMESTAMP NULL;

# DEVMC 2024.2.11 
ALTER TABLE `user_data_vehicles`
ADD `description` VARCHAR(255);

# DEVMC 2024.2.11 
ALTER TABLE subscriptions ADD COLUMN user_vehicle_id INT(10) UNSIGNED NULL;
ALTER TABLE subscriptions ADD CONSTRAINT subscriptions_user_vehicle_id_foreign FOREIGN KEY (user_vehicle_id) REFERENCES user_data_vehicles(id) ON DELETE CASCADE;
ALTER TABLE subscriptions ADD INDEX subscriptions_user_vehicle_id_index (user_vehicle_id);


# DEVMC 2024.2.11 
ALTER TABLE `subscriptions` 
ADD `subscription_pay_id` UNSIGNED NULL, 
ADD INDEX `subscriptions_subscription_pay_id_index` (`subscription_pay_id`), 
ADD CONSTRAINT `subscriptions_subscription_pay_id_foreign` FOREIGN KEY (`subscription_pay_id`) REFERENCES `subscription_pays` (`id`) ON DELETE SET NULL;


<!-- /devmc 2024.1.8  -->
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `lote` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `thumbsnail` varchar(255) DEFAULT NULL,
  `thumbsnail_filename` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_uuid_unique` (`uuid`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cf_cash_flows`
ADD COLUMN `employee_id` INT(11) NULL,
ADD INDEX `employee_id` (`employee_id`);
