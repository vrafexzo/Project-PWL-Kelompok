-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema laravel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema laravel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 ;
USE `laravel` ;

-- -----------------------------------------------------
-- Table `failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `password_reset_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) ,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS role (
  `id_role` INT NOT NULL,
  `nama_role` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id_role`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `role_id_role` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) ,
  INDEX `fk_users_role1_idx` (`role_id_role` ASC) ,
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`role_id_role`)
    REFERENCES role (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `polling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `polling` (
  `id_polling` VARCHAR(16) NOT NULL,
  `nama_polling` VARCHAR(100) NULL,
  `tanggal_mulai` DATETIME NULL,
  `tanggal_selesai` DATETIME NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id_polling`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kurikulum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id_kurikulum` VARCHAR(16) NOT NULL,
  `nama_kurikulum` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id_kurikulum`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mata_kuliah`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id_mk` VARCHAR(16) NOT NULL,
  `nama_mk` VARCHAR(45) NULL,
  `sks` INT NULL,
  `tanggal_mulai` DATETIME NULL,
  `tanggal_selesai` DATETIME NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `mata_kuliahcol` VARCHAR(45) NULL,
  `kurikulum_id_kurikulum` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id_mk`),
  INDEX `fk_mata_kuliah_kurikulum1_idx` (`kurikulum_id_kurikulum` ASC) ,
  CONSTRAINT `fk_mata_kuliah_kurikulum1`
    FOREIGN KEY (`kurikulum_id_kurikulum`)
    REFERENCES `kurikulum` (`id_kurikulum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `polling_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `polling_detail` (
  `id_polling_detail` VARCHAR(16) NOT NULL,
  `nama_polling_detail` VARCHAR(45) NULL,
  `users_id` BIGINT(20) UNSIGNED NOT NULL,
  `polling_id_polling` VARCHAR(16) NOT NULL,
  `mata_kuliah_id_mk` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id_polling_detail`, `users_id`, `polling_id_polling`, `mata_kuliah_id_mk`),
  INDEX `fk_polling_detail_users1_idx` (`users_id` ASC),
  INDEX `fk_polling_detail_polling1_idx` (`polling_id_polling` ASC) ,
  INDEX `fk_polling_detail_mata_kuliah1_idx` (`mata_kuliah_id_mk` ASC) ,
  CONSTRAINT `fk_polling_detail_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_polling_detail_polling1`
    FOREIGN KEY (`polling_id_polling`)
    REFERENCES `polling` (`id_polling`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_polling_detail_mata_kuliah1`
    FOREIGN KEY (`mata_kuliah_id_mk`)
    REFERENCES `mata_kuliah` (`id_mk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
