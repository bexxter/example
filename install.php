<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!$CI->db->table_exists(db_prefix() . 'cars')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'cars` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `client_id` int(11) DEFAULT NULL,
            `license_plate` varchar(20) NOT NULL,
            `vin` varchar(64) NOT NULL,
            `make` varchar(100) DEFAULT NULL,
            `type` varchar(100) DEFAULT NULL,
            `model` varchar(100) DEFAULT NULL,
            `year` smallint(4) DEFAULT NULL,
            `color` varchar(50) DEFAULT NULL,
            `engine_displacement` int(11) DEFAULT NULL,
            `fuel_type` varchar(50) DEFAULT NULL,
            `power_kw` int(11) DEFAULT NULL,
            `engine_code` varchar(50) DEFAULT NULL,
            `body_style` varchar(50) DEFAULT NULL,
            `inspection_valid_until` date DEFAULT NULL,
            `coating_type` varchar(50) DEFAULT "none",
            `data_source` varchar(50) DEFAULT NULL,
            `created_by` int(11) DEFAULT NULL,
            `active` tinyint(1) DEFAULT 1,
            `is_deleted` tinyint(1) DEFAULT 0,
            `created_at` datetime DEFAULT current_timestamp(),
            `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
            PRIMARY KEY (`id`),
            UNIQUE KEY `uniq_license_plate_vin` (`license_plate`, `vin`),
            KEY `idx_cars_client` (`client_id`),
            KEY `idx_cars_vin` (`vin`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
}
