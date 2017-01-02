-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 06:49 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sadia1_dontorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `description`) VALUES
(1, 'admin@example.com', 'admin', '25d55ad283aa400af464c76d713c07ad', 'Mr Zaman');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('fee8ce7b2b2c6e10f436ed0d380c71aaa7e943f2', '58.97.195.137', 1478070235, 0x6d656e755f626173657c613a303a7b7d),
('f35826ca775d0d69f3a76fdfd6c79a74853610bc', '58.97.195.137', 1478070346, 0x6d656e755f626173657c613a303a7b7d63617465676f726965737c613a303a7b7d62617365737c613a303a7b7d73656c656374696f6e737c613a303a7b7d61747472636172747c613a303a7b7d67656e69647c733a31373a22323331357c333830307c322e372a322e37223b636f6d6d656e74737c613a313a7b733a31373a22323331357c333830307c322e372a322e37223b733a303a22223b7d636172747c613a313a7b693a303b733a31373a22323331357c333830307c322e372a322e37223b7d64656c69766572795f636f73747c693a303b636172747461787c643a303b);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`) VALUES
('address', '72 Nolton Street, Bridgend, CF31 3BP	'),
('api_host', 'http://localhost/munchnow.co.uk/'),
('api_id', '30'),
('api_key', 'e5262f2b8d5f3a743a830528e04a28dc69f0628b'),
('api_name', 'exotic'),
('api_password', 'shaad121'),
('api_username', 'exotic'),
('api_website', 'http://localhost/munchnow.co.uk/menu/Exotic-Shaad'),
('barcode_height', '120'),
('barcode_num_in_row', '10'),
('barcode_page_cellspacing', '10'),
('barcode_page_width', '100'),
('barcode_quality', '100'),
('barcode_second_row', 'item_code'),
('barcode_third_row', 'unit_price'),
('barcode_type', 'Code39'),
('barcode_width', '300'),
('company', 'Don''t order'),
('company_logo', 'company_logo3.png'),
('currency_decimals', '2'),
('currency_side', '0'),
('currency_symbol', '£'),
('custom10_name', ''),
('dateformat', 'd/m/Y'),
('decimal_point', '.'),
('default_sales_discount', '0'),
('default_tax_1_name', 'VAT '),
('default_tax_1_rate', '20'),
('default_tax_2_name', ''),
('default_tax_2_rate', ''),
('default_tax_rate', '8'),
('email', 'aktarcse152@gmail.com'),
('fax', ''),
('gk_address', 'restaurant address '),
('gk_category_line_page', '10'),
('gk_discount_applied', 'yes'),
('gk_discount_percent', '10'),
('gk_email', 'test@test.com'),
('gk_fax', 'abc@fax'),
('gk_logo', 'gk_logo1.png'),
('gk_menu_line_page', ''),
('gk_name', 'Restaurant Name'),
('gk_phone', '01717103734'),
('gk_policy', 'Thank you for your oder, Your attention is drawn to our terms and conditions of trading overleaf.'),
('gk_vat_included', 'no'),
('gk_vat_percent', '5'),
('gk_vat_reg', '31479963'),
('gk_website', 'gk_website'),
('home_menucarousel', 'off'),
('home_ourfeatures', 'on'),
('home_promotime', 'on'),
('home_slider', 'on'),
('home_testimonials', 'off'),
('home_weserve', 'off'),
('is_touch', 'disable'),
('language', 'en'),
('lines_per_page', '13'),
('msg_msg', 'Thanks for buying with us  '),
('msg_pwd', 'ecse100200152'),
('msg_src', 'GK-POS'),
('msg_uid', 'admin'),
('online_book', 'off'),
('online_review', 'off'),
('payment_cod', 'payment_cod'),
('payment_gateway', 'Nochex'),
('payment_merchant_id', 'info@exoticshaad.com'),
('payment_mode', 'Test'),
('payment_online', 'payment_online'),
('phone', '01656 372895'),
('print_bottom_margin', '0'),
('print_footer', '0'),
('print_header', '0'),
('print_left_margin', '0'),
('print_right_margin', '0'),
('print_silently', '1'),
('print_top_margin', '0'),
('quantity_decimals', '0'),
('receipt_show_description', '0'),
('receipt_show_serialnumber', '1'),
('receipt_show_taxes', '1'),
('receipt_show_total_discount', '1'),
('receiving_calculate_average_price', '0'),
('return_policy', 'Thank you for your oder, Your attention is drawn to our terms and conditions of trading overleaf.'),
('tax_decimals', '0'),
('tax_included', '0'),
('thousands_separator', ''),
('timeformat', 'H:i:s'),
('timezone', 'Europe/Amsterdam'),
('vatreg', '1212'),
('website', 'www.dontorder.com');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
`configuration_id` int(11) NOT NULL,
  `configuration_title` text,
  `configuration_key` varchar(255) DEFAULT NULL,
  `configuration_value` text,
  `configuration_description` text,
  `configuration_group_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(5) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=340 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES
(85, 'Installed Modules', 'MODULE_PAYMENT_INSTALLED', 'cod|Helcim|PayPal', 'This is automatically updated. No need to edit.', 6, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(112, 'Enable this Payment Module', 'MODULE_PAYMENT_PAYPALDP_STATUS', 'True', 'Do you want to enable this payment module?', 6, 25, NULL, '2010-01-26 14:24:30', NULL, 'form_radios(''keys[MODULE_PAYMENT_PAYPALDP_STATUS]'',array(''True'', ''False''), '),
(113, 'Live or Sandbox', 'MODULE_PAYMENT_PAYPALDP_SERVER', 'live', '<strong>Live: </strong> Used to process Live transactions<br><strong>Sandbox: </strong>For developers and testing', 6, 25, NULL, '2010-01-26 14:24:30', NULL, 'form_radios(''keys[MODULE_PAYMENT_PAYPALDP_SERVER]'',array(''live'', ''sandbox''), '),
(114, 'Sort order of display.', 'MODULE_PAYMENT_PAYPALDP_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 25, NULL, '2010-01-26 14:24:30', NULL, NULL),
(115, 'Payment Action', 'MODULE_PAYMENT_PAYPALDP_TRANSACTION_MODE', 'Final Sale', 'How do you want to obtain payment?<br /><strong>Default: Final Sale</strong>', 6, 25, NULL, '2010-01-26 14:24:30', NULL, 'form_radios(''keys[MODULE_PAYMENT_PAYPALDP_TRANSACTION_MODE]'', array(''Auth Only'', ''Final Sale''), '),
(116, 'Transaction Currency', 'MODULE_PAYMENT_PAYPALDP_CURRENCY', 'GBP', 'Which currency should the order be sent to PayPal as? <br />NOTE: if an unsupported currency is sent to PayPal, it will be auto-converted to USD (or GBP if using UK account)<br /><strong>Default: GBP</strong>', 6, 25, NULL, '2010-01-26 14:24:30', NULL, ''),
(117, 'API Signature -- Username', 'MODULE_PAYMENT_PAYPALWPP_APIUSERNAME', '', 'The API Username from your PayPal API Signature settings under *API Access*. This value typically looks like an email address and is case-sensitive.', 6, 25, NULL, '2010-01-26 14:24:30', NULL, NULL),
(118, 'API Signature -- Password', 'MODULE_PAYMENT_PAYPALWPP_APIPASSWORD', '', 'The API Password from your PayPal API Signature settings under *API Access*. This value is a 16-character code and is case-sensitive.', 6, 25, NULL, '2010-01-26 14:24:30', 'zen_cfg_password_display', ''),
(119, 'API Signature -- Signature Code', 'MODULE_PAYMENT_PAYPALWPP_APISIGNATURE', '', 'The API Signature from your PayPal API Signature settings under *API Access*. This value is a 56-character code, and is case-sensitive.', 6, 25, NULL, '2010-01-26 14:24:30', NULL, NULL),
(198, 'Customer registration welcome email', 'EMAIL_CUSTOMER_REGISTRATION', '1||1', 'Dear CUSTOMER_NAME,\r\n\r\nThanks for joining SITE_NAME. We take great pleasure in welcoming you to SITE_NAME family.\r\n\r\nPlease find your account login information below:\r\n\r\nEmail: USER_NAME\r\nPassword: ******\r\n\r\nIn order to be able to place orders and add restaurants as favorites,You need to activate your account with the following link: ACCOUNT_ACTIVATION_LINK\r\n\r\nPlease visit SITE_LINK to experience an all new way of ordering food online.\r\n\r\nThanks,\r\nSITE_NAME', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, USER_NAME, PASSWORD, CUSTOMER_EMAIL, CUSTOMER_ADDRESS, SITE_NAME,SITE_LINK', NULL),
(199, 'Email to friends', 'EMAIL_TELL_FRIEND', '1||1', '<p>Hi XXXXXXX</p>\n<p>Have you ever taken service from SITE_URL ? If NO, then you are missing something special. My first choice is SITE_NAME when I need any Takeout or Delivery. Very easily you can order for foods and it gives you the full menus of all the takeouts in your area. Moreover you can pay online or on delivery. Every time I order food on there, I earn points which I can reuse on further ordering. Besides, you can get your money back in case of any inconvenience.</p>\n<p>You can register yourself from here REGISTRATION_URL</p>\n<p>Don''t miss it!!! Just try once!!</p>\n<p>CUSTOMER_NAME</p>', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, REGISTRATION_URL, SITE_NAME', NULL),
(200, 'Customer verification email', 'EMAIL_CUSTOMER_VERIFICATION', '1||1', 'Dear CUSTOMER_NAME,<br><br>\n\n<font color="red">Thanks for creating munchnow Account</font> <br><br>Please click on the following link to verify your account<br><br> VERIFICATION_URL\n<br><br>\nRegards,\nSITE_NAME Team', 5, NULL, NULL, '0001-02-11 00:00:00', 'VERIFICATION_URL, SITE_NAME', NULL),
(201, 'Restaurant registration email notification', 'EMAIL_RESTAURANT_REGISTRATION', '1|1|', 'Hi OWNER_NAME,\n\nThank you for registering RESTAURANT_NAME with SITE_NAME.\nHere''s the details of your registration.\nEmail: OWNER_EMAIL\nLogin User: LOGIN_USERNAME\nPassword: LOGIN_PASSWORD\nLogin URL: LOGIN_URL\n\nThanks,\nSITE_NAME', 5, NULL, NULL, '0001-02-11 00:00:00', 'OWNER_NAME, RESTAURANT_NAME, OWNER_EMAIL, RESTAURANT_ADDRESS, SITE_NAME, LOGIN_USERNAME, LOGIN_PASSWORD, LOGIN_URL', ' '),
(202, 'Customer orders status notification', 'EMAIL_ORDER_STATUS_NOTIFICATION', '1|1|1', 'Order Status Notification\n\nCUSTOMER_NAME\nUSER_NAME\nCUSTOMER_EMAIL\nORDER_ID\nORDER_STATUS\nCUSTOMER_ADDRESS\nSITE_NAME', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, USER_NAME, CUSTOMER_EMAIL, ORDER_ID, ORDER_STATUS, CUSTOMER_ADDRESS, SITE_NAME ', NULL),
(203, 'Customer feedback notification', 'EMAIL_FEEDBACK_NOTIFICATION', '1||1', 'Hi CUSTOMER_NAME, \n\nThank you for rating the service of your order ORDER_ID from SITE_NAME.\n\n***\nFEEDBACK\n***\n\nRegards,\nSITE_NAME', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, ORDER_ID, FEEDBACK, SITE_NAME', NULL),
(204, 'Customer account banned notification', 'EMAIL_ACCOUNT_BANNED_NOTIFICATION', '1||1', 'Your account is banned\n\nCUSTOMER_NAME\nUSER_NAME\nCUSTOMER_EMAIL\nCUSTOMER_ADDRESS\nSITE_NAME\nBANCOMMENTS', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, USER_NAME, CUSTOMER_EMAIL, CUSTOMER_ADDRESS, SITE_NAME, BANCOMMENTS', NULL),
(205, 'Affiliates earning notification', 'EMAIL_AFFILIATE_EARNING_NOTIFICATION', '1||1', 'Dear CUSTOMER_NAME,\n\nYou have earned EARNS today which brings your total affiliates earnings to TOTAL_EARNS.\n\nRegards\n\nSITE_NAME', 5, NULL, NULL, '0001-02-11 00:00:00', 'CUSTOMER_NAME, USER_NAME, CUSTOMER_EMAIL, ORDER_ID, EARNS, TOTAL_EARNS, CUSTOMER_ADDRESS, SITE_NAME', NULL),
(207, 'Email Template', 'EMAIL_TEMPLATE', '<table  border="0" cellspacing="0" cellpadding="0" bgcolor="#d4d4d4">\r\n<tbody>\r\n<tr>\r\n<td align="center">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><br /><br /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n <table  border="0" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td>\r\n <table  border="0" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n <td>LOGO</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\nBODY_TEXT</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n <table  border="0" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n <td  width="240" align="right">&nbsp;</td>\r\n <td  align="right">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', 0, NULL, NULL, '0001-01-01 00:00:00', NULL, NULL),
(208, 'Enable Google Checkout Module', 'MODULE_PAYMENT_GOOGLECHECKOUT_STATUS', 'False', 'Do you want to accept Google Checkout payments?', 6, 0, NULL, '0000-00-00 00:00:00', NULL, 'form_radios(''keys[MODULE_PAYMENT_GOOGLECHECKOUT_STATUS]'', array(''True'', ''False''), '),
(209, 'Login ID', 'MODULE_PAYMENT_GOOGLECHECKOUT_LOGIN', 'testing', 'The API Login ID used for the google checkout service', 6, 0, NULL, '2011-01-14 10:33:56', NULL, NULL),
(210, 'Transaction Key', 'MODULE_PAYMENT_GOOGLECHECKOUT_TXNKEY', 'Test', 'Transaction Key used for encrypting sent transaction data', 6, 0, NULL, '2011-01-14 10:33:56', '', NULL),
(211, 'Transaction Mode', 'MODULE_PAYMENT_GOOGLECHECKOUT_TESTMODE', 'Test', 'Transaction mode used for processing orders', 6, 0, NULL, '2011-01-14 10:33:56', NULL, 'form_radios(''keys[MODULE_PAYMENT_GOOGLECHECKOUT_TESTMODE]'', array(''Test'', ''Production''), '),
(212, 'Sort order of display.', 'MODULE_PAYMENT_GOOGLECHECKOUT_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2011-01-14 10:33:56', NULL, NULL),
(213, 'Currency', 'CURRENCY', '&pound;', '', 0, 0, NULL, '2011-01-25 16:31:28', NULL, ''),
(214, 'Customer orders rejected notification', 'EMAIL_ORDER_REJECTED_NOTIFICATION', '1|1|1', 'Dear CUSTOMER_NAME,\n\nUnfortunately your order #ORDER_ID has been REJECTED by the restaurant. \n\nReject reason: REJECT_REASON\n\nIf you have question please contact at \ninfo@munchnow.co.uk\n\nThanks,\nSITE_NAME', 5, 6, NULL, '0001-01-01 00:00:00', 'CUSTOMER_NAME, USER_NAME, CUSTOMER_EMAIL, ORDER_ID, ORDER_STATUS, CUSTOMER_ADDRESS, SITE_NAME ', NULL),
(215, 'Order confirmation notification', 'EMAIL_ORDER_CONFIRMATION_NOTIFICATION', '1|1|1', 'Dear CUSTOMER_NAME,\n\nYour order ORDER_ID has been accepted.\nHere''s details of your order:\n\nOrder Address: CUSTOMER_ADDRESS\n\nDelivery Time: DELIVERY_TIME\n\nMessage from Restaurant:\nCONFIRMATION_MESSAGE\n\nThanks,\nSITE_NAME', 5, 5, NULL, '0001-01-01 00:00:00', 'CUSTOMER_NAME, USER_NAME, CUSTOMER_EMAIL, ORDER_ID, ORDER_STATUS, CUSTOMER_ADDRESS, SITE_NAME, DELIVERY_TIME, CONFIRMATION_MESSAGE ', NULL),
(216, 'Enable Authorize.net Module', 'MODULE_PAYMENT_AUTHORIZENET_STATUS', 'False', 'Do you want to accept Authorize.net payments?', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_STATUS]'', array(''True'', ''False''), '),
(217, 'Login ID', 'MODULE_PAYMENT_AUTHORIZENET_LOGIN', 'testing', 'The API Login ID used for the Authorize.net service', 6, 0, NULL, '2011-03-15 13:52:49', NULL, NULL),
(218, 'Transaction Key', 'MODULE_PAYMENT_AUTHORIZENET_TXNKEY', 'Test', 'Transaction Key used for encrypting sent transaction data', 6, 0, NULL, '2011-03-15 13:52:49', 'zen_cfg_password_display', NULL),
(219, 'MD5 Hash', 'MODULE_PAYMENT_AUTHORIZENET_MD5HASH', '*Set A Hash Value at AuthNet Admin*', 'Encryption key used for validating received transaction data (MAX 20 CHARACTERS)', 6, 0, NULL, '2011-03-15 13:52:49', 'zen_cfg_password_display', NULL),
(220, 'Transaction Mode', 'MODULE_PAYMENT_AUTHORIZENET_TESTMODE', 'Test', 'Transaction mode used for processing orders', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_TESTMODE]'', array(''Test'', ''Production''), '),
(221, 'Transaction Method', 'MODULE_PAYMENT_AUTHORIZENET_METHOD', 'Credit Card', 'Transaction method used for processing orders', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_METHOD]'', array(''Credit Card''), '),
(222, 'Authorization Type', 'MODULE_PAYMENT_AUTHORIZENET_AUTHORIZATION_TYPE', 'Authorize', 'Do you want submitted credit card transactions to be authorized only, or captured immediately?', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_AUTHORIZATION_TYPE]'', array(''Authorize'', ''Capture''), '),
(223, 'Request CVV Number', 'MODULE_PAYMENT_AUTHORIZENET_USE_CVV', 'False', 'Do you want to ask the customer for the card''s CVV number', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_USE_CVV]'', array(''True'', ''False''), '),
(224, 'Customer Notifications', 'MODULE_PAYMENT_AUTHORIZENET_EMAIL_CUSTOMER', 'False', 'Should Authorize.Net email a receipt to the customer?', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_EMAIL_CUSTOMER]'', array(''True'', ''False''), '),
(225, 'Sort order of display.', 'MODULE_PAYMENT_AUTHORIZENET_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2011-03-15 13:52:49', NULL, NULL),
(226, 'Gateway Mode', 'MODULE_PAYMENT_AUTHORIZENET_GATEWAY_MODE', 'offsite', 'Where should customer credit card info be collected?<br /><b>onsite</b> = here (requires SSL)<br /><b>offsite</b> = authorize.net site', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_GATEWAY_MODE]'', array(''onsite'', ''offsite''), '),
(227, 'Enable Database Storage', 'MODULE_PAYMENT_AUTHORIZENET_STORE_DATA', 'True', 'Do you want to save the gateway communications data to the database?', 6, 0, NULL, '2011-03-15 13:52:49', NULL, 'form_radios(''keys[MODULE_PAYMENT_AUTHORIZENET_STORE_DATA]'', array(''True'', ''False''), '),
(284, 'Enable COD Module', 'MODULE_PAYMENT_COD_STATUS', 'True', 'Do you want to accept COD payments?', 6, 0, NULL, '0000-00-00 00:00:00', NULL, 'form_radios(''keys[MODULE_PAYMENT_COD_STATUS]'', array(''True'', ''False''), '),
(285, 'Sort order of display.', 'MODULE_PAYMENT_COD_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2012-06-29 12:59:27', NULL, NULL),
(286, 'Enable PayPal Module', 'MODULE_PAYMENT_PAYPAL_STATUS', 'True', 'Do you want to accept PayPal payments?', 6, 0, NULL, '0000-00-00 00:00:00', NULL, 'form_radios(''keys[MODULE_PAYMENT_PAYPAL_STATUS]'', array(''True'', ''False''), '),
(287, 'Business ID', 'MODULE_PAYMENT_PAYPAL_BUSINESS_ID', 'jahid_rassel-facilitator@yahoo.com', 'Primary email address for your PayPal account.<br />NOTE: This must match <strong>EXACTLY </strong>the primary email address on your PayPal account settings.  It <strong>IS case-sensitive</strong>, so please check your PayPal profile preferences at paypal.com and be sure to enter the EXACT same primary email address here.', 6, 2, NULL, '2012-06-29 12:59:49', NULL, NULL),
(288, 'Transaction Currency', 'MODULE_PAYMENT_PAYPAL_CURRENCY', 'GBP', 'Which currency should the order be sent to PayPal as? <br />NOTE: if an unsupported currency is sent to PayPal, it will be auto-converted to USD.', 6, 3, NULL, '2012-06-29 12:59:49', NULL, ''),
(289, 'Sort order of display.', 'MODULE_PAYMENT_PAYPAL_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 8, NULL, '2012-06-29 12:59:49', NULL, NULL),
(290, 'Mode for PayPal web services<br /><br />Default:<br /><code>www.paypal.com/cgi-bin/webscr</code><br />or<br /><code>www.paypal.com/us/cgi-bin/webscr</code><br />or for the UK,<br /><code>www.paypal.com/uk/cgi-bin/webscr</code>', 'MODULE_PAYMENT_PAYPAL_HANDLER', 'www.sandbox.paypal.com/cgi-bin/webscr', 'Choose the URL for PayPal live processing', 6, 73, NULL, '2012-06-29 12:59:49', NULL, ''),
(291, 'PDT Token (Payment Data Transfer)', 'MODULE_PAYMENT_PAYPAL_PDTTOKEN', '', 'Enter your PDT Token value here in order to activate transactions immediately after processing (if they pass validation).', 6, 25, NULL, '2012-06-29 12:59:49', 'zen_cfg_password_display', NULL),
(327, 'Enable Helcim Module', 'MODULE_PAYMENT_HELCIM_STATUS', 'True', 'Do you want to accept payments via Helcim? ', 6, 0, NULL, '2012-11-22 18:19:13', NULL, 'form_radios(''keys[MODULE_PAYMENT_HELCIM_STATUS]'', array(''True'', ''False''), '),
(328, 'Merchant ID(Merchant DBA:)', 'MODULE_PAYMENT_HELCIM_MERCHANT_ID', '9999874544', 'Set this value to the Merchant ID assigned to you by Helcim', 6, 0, NULL, '2012-11-22 18:19:13', NULL, NULL),
(329, 'Merchant PIN', 'MODULE_PAYMENT_HELCIM_MERCHANT_PIN', 'g95ehi2i5a1fd8f658', 'Set this value to the Virtual Merchant PIN as configured within VirtualMerchant', 6, 0, NULL, '2012-11-22 18:19:13', NULL, NULL),
(330, 'User ID (Account ID)', 'MODULE_PAYMENT_HELCIM_USER_ID', '9999874544', 'Set this value to User ID as configured on VirtualMerchant', 6, 0, NULL, '2012-11-22 18:19:13', NULL, NULL),
(331, 'Gate Way MOde', 'MODULE_PAYMENT_HELCIM_GATEWAY_MODE', 'TEST', 'Transaction Mode', 6, 0, NULL, '2012-11-22 18:19:13', NULL, 'form_radios(''keys[MODULE_PAYMENT_HELCIM_GATEWAY_MODE]'', array(''TEST'', ''LIVE''), '),
(332, 'Enable CARDSAVE Module', 'MODULE_PAYMENT_CARDSAVE_STATUS', 'False', 'Do you want to accept payments via card save?', 6, 0, NULL, '2012-11-26 19:45:32', NULL, 'form_radios(''keys[MODULE_PAYMENT_CARDSAVE_STATUS]'', array(''True'', ''False''), '),
(333, 'Merchant ID', 'MODULE_PAYMENT_CARDSAVE_MERCHANT_ID', 'Merchant ID goes here', 'The merchant id assigned to you by card save or chosen when you applied', 6, 0, NULL, '2012-11-26 19:45:32', NULL, NULL),
(334, 'Password', 'MODULE_PAYMENT_CARDSAVE_PASSWORD', 'Pass goes here', 'The password choosen when you applied', 6, 0, NULL, '2012-11-26 19:45:32', NULL, NULL),
(335, 'Gate Way MOde', 'MODULE_PAYMENT_CARDSAVE_GATEWAY_MODE', 'TEST', 'Transaction Mode', 6, 0, NULL, '2012-11-26 19:45:32', NULL, 'form_radios(''keys[MODULE_PAYMENT_CARDSAVE_GATEWAY_MODE]'', array(''TEST'', ''LIVE''), '),
(336, 'Enable Helcim Module', 'MODULE_PAYMENT_PSIGATE_STATUS', 'False', 'Do you want to accept payments via Helcim? ', 6, 0, NULL, '2012-12-25 17:01:13', NULL, 'form_radios(''keys[MODULE_PAYMENT_PSIGATE_STATUS]'', array(''True'', ''False''), '),
(337, 'Store ID:)', 'MODULE_PAYMENT_PSIGATE_STORE_ID', 'store id goes here', 'PSiGate provides the StoreID within\r\nthe PSiGate Welcome Email.', 6, 0, NULL, '2012-12-25 17:01:13', NULL, NULL),
(338, 'Pass phrase', 'MODULE_PAYMENT_PSIGATE_PASS_PHRASE', 'password goes here', 'PSiGate provides the Passphrase\r\nwithin the PSiGate Welcome Email.', 6, 0, NULL, '2012-12-25 17:01:13', NULL, NULL),
(339, 'Gate Way MOde', 'MODULE_PAYMENT_PSIGATE_GATEWAY_MODE', 'TEST', 'Transaction Mode', 6, 0, NULL, '2012-12-25 17:01:13', NULL, 'form_radios(''keys[MODULE_PAYMENT_PSIGATE_GATEWAY_MODE]'', array(''TEST'', ''LIVE''), ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `sent_at` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`, `sent_at`) VALUES
(1, 'Mr zaman', '01717103734', 'info@gksoft.co.uk', 'this is a test message ', '16161616-1010-1010 0'),
(2, 'Mr zaman', '329234324', 'asdasd@gksoft.co.uk', 'tasjdjas;dasd', '2016-10-10 14:05:38'),
(3, 'happy sing', '23-48932-94', 'happ@ldjlsdjf.com', 'lasdjsa''dpasidjpo p oijdfpoiasjd ', '2016-10-10 14:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`CustId` int(10) NOT NULL,
  `CustGender` varchar(20) DEFAULT NULL,
  `CustFirstName` varchar(32) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `CustLastName` varchar(32) DEFAULT NULL,
  `CustDOB` varchar(20) DEFAULT NULL,
  `CustEmail` varchar(96) DEFAULT NULL,
  `CustUserName` varchar(512) DEFAULT NULL,
  `CustAdd1` varchar(250) DEFAULT NULL,
  `CustAdd2` varchar(250) DEFAULT NULL,
  `CustTown` varchar(250) DEFAULT NULL,
  `CustArea` varchar(300) DEFAULT NULL,
  `CustState` varchar(250) DEFAULT NULL,
  `County` varchar(250) DEFAULT NULL,
  `CustPostcode` varchar(250) DEFAULT NULL,
  `CustBuild` varchar(200) DEFAULT NULL,
  `CustFloor` varchar(200) DEFAULT NULL,
  `CustDoorbell` varchar(200) DEFAULT NULL,
  `CustComments` varchar(400) DEFAULT NULL,
  `CustTelephone` varchar(32) DEFAULT NULL,
  `CustMobile` varchar(50) DEFAULT NULL,
  `CustFax` varchar(32) DEFAULT NULL,
  `CustPassword` varchar(40) DEFAULT NULL,
  `CustCCode` varchar(20) DEFAULT NULL,
  `CustHowHear` varchar(100) DEFAULT NULL,
  `CustAddLabel` varchar(100) DEFAULT NULL,
  `CustStatus` enum('0','1','2','3') DEFAULT '1',
  `CustomerIp` varchar(30) DEFAULT '0.0.0.0',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baned` varchar(3) DEFAULT '000',
  `bancomments` varchar(1024) DEFAULT NULL,
  `guest` int(11) NOT NULL DEFAULT '0',
  `IsAffiliate` tinyint(1) DEFAULT '0',
  `affiliate_from` int(11) NOT NULL,
  `TotalAffEarning` double(7,2) DEFAULT '0.00',
  `verified` enum('0','1','2') DEFAULT NULL,
  `verifytxt` varchar(100) DEFAULT NULL,
  `PImage` varchar(200) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `last_paypal_orderid` int(11) NOT NULL,
  `document_number` varchar(200) DEFAULT NULL,
  `RestId` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustId`, `CustGender`, `CustFirstName`, `Title`, `CustLastName`, `CustDOB`, `CustEmail`, `CustUserName`, `CustAdd1`, `CustAdd2`, `CustTown`, `CustArea`, `CustState`, `County`, `CustPostcode`, `CustBuild`, `CustFloor`, `CustDoorbell`, `CustComments`, `CustTelephone`, `CustMobile`, `CustFax`, `CustPassword`, `CustCCode`, `CustHowHear`, `CustAddLabel`, `CustStatus`, `CustomerIp`, `add_date`, `baned`, `bancomments`, `guest`, `IsAffiliate`, `affiliate_from`, `TotalAffEarning`, `verified`, `verifytxt`, `PImage`, `lat`, `lon`, `last_paypal_orderid`, `document_number`, `RestId`) VALUES
(1, NULL, 'Parves', NULL, 'Rabbani', NULL, 'parveskamran@gmail.com', NULL, 'cardiff oxfordstreet', NULL, '4', '6', NULL, NULL, 'CF23 0A', NULL, NULL, NULL, NULL, NULL, '01712403050', NULL, 'ed4991a37a7147b4e61b6ace9a0ca428', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-01 10:13:54', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 29),
(2, NULL, 'Pavel ', NULL, 'Rabbani', NULL, 'pavelrabbani@live.co.uk', NULL, '21 sn', NULL, '4', '6', NULL, NULL, 'CF5 4RR', NULL, NULL, NULL, NULL, NULL, '01711336575', NULL, 'd2a7ba2395935930022781a6dc584465', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-01 10:47:19', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 29),
(3, NULL, 'muhammed', NULL, 'Kibria', NULL, 'codealpine@outlook.com', NULL, '71 Pethybridge Road', NULL, '7', '14', NULL, NULL, 'CF5 4DR', NULL, NULL, NULL, NULL, '074 501 16256', '07450116256', NULL, '6d9ae93e49685153265e1d57a84876dc', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-02 13:08:25', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(5, NULL, 'Rabbani', NULL, 'Soft', NULL, 'info@rabbanisoft.com', NULL, '2 sn', NULL, '4', '6', NULL, NULL, 'CF5 4PR', NULL, NULL, NULL, NULL, '017 113 36575', '01711336575', NULL, 'a115a58e6c40da1887f9c5072ba14a37', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-02 14:26:38', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(6, NULL, 'Rani ', NULL, 'Dhar', NULL, '16116119@staudents.southwales.ac.uk', NULL, '72 Nolton Street', NULL, '7', '14', NULL, NULL, 'CF313BP', NULL, NULL, NULL, NULL, NULL, '07400101882', NULL, 'b4047a2d5c533e3a0edd489fab88eb09', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-02 20:39:13', '000', NULL, 0, 0, 0, 0.00, NULL, NULL, NULL, NULL, NULL, 0, NULL, 30),
(7, NULL, 'Exotic ', NULL, 'Shaad', NULL, 'exoticshaad@gmail.com', NULL, '87 salop street', NULL, '4', '6', NULL, NULL, 'CF641HF', NULL, NULL, NULL, NULL, NULL, '07400101882', NULL, 'b8ad0d864bde6f51e9d3ee811d6aaa63', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-02 20:45:12', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(8, NULL, 'Belal', NULL, 'Hussain', NULL, 'zaman@aman.co.uk', NULL, '65 oxford street', NULL, '4', '6', NULL, NULL, 'CF5 4RD', NULL, NULL, NULL, NULL, '07546559869', NULL, NULL, '6d9ae93e49685153265e1d57a84876dc', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-12 16:09:42', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(9, NULL, 'Saumik', NULL, 'Dhar', NULL, 'saumikdhar@yahoo.co.uk', NULL, '87 salop street', NULL, '1', '2', NULL, NULL, 'CF64 1HF', NULL, NULL, NULL, NULL, '07459443321', NULL, NULL, '873a988e06e25ce94c6322799100761b', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-12 17:52:37', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(10, NULL, 'parves', NULL, 'kamran', NULL, 'kamran.94@live.com', NULL, 'cardiff', NULL, '4', NULL, NULL, NULL, 'CF5 ', NULL, NULL, NULL, NULL, '01712403050', NULL, NULL, 'ed4991a37a7147b4e61b6ace9a0ca428', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-13 05:44:38', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 30),
(11, NULL, 'Mr ', NULL, 'Aktaruzzaman', NULL, 'aktar.bd84@gmail.com', NULL, '75 prythibridge road', NULL, '4', NULL, NULL, NULL, 'CF5 4DR', NULL, NULL, NULL, NULL, '01717103734', NULL, NULL, 'fd923f38b58af8c5690b1fde00f8a0e5', NULL, NULL, 'Primary', '1', '0.0.0.0', '2016-11-14 13:28:56', '000', NULL, 0, 0, 0, 0.00, '1', NULL, NULL, NULL, NULL, 0, NULL, 29);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE IF NOT EXISTS `customer_address` (
`CustAddId` int(10) NOT NULL,
  `CustId` int(10) NOT NULL DEFAULT '0',
  `CustFirstName` varchar(100) NOT NULL,
  `CustLastName` varchar(100) NOT NULL,
  `CustAdd1` varchar(250) DEFAULT NULL,
  `CustAdd2` varchar(250) DEFAULT NULL,
  `CustPhone` varchar(15) DEFAULT NULL,
  `County` varchar(200) DEFAULT NULL,
  `CustTown` varchar(250) DEFAULT NULL,
  `CustArea` varchar(300) DEFAULT NULL,
  `CustBuild` varchar(200) DEFAULT NULL,
  `CustFloor` varchar(200) DEFAULT NULL,
  `CustDoorbell` varchar(200) DEFAULT NULL,
  `CustComments` varchar(300) DEFAULT NULL,
  `CustState` varchar(250) DEFAULT NULL,
  `CustCountry` varchar(250) DEFAULT NULL,
  `CustPostcode` varchar(250) DEFAULT NULL,
  `CustAddLabel` varchar(250) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`CustAddId`, `CustId`, `CustFirstName`, `CustLastName`, `CustAdd1`, `CustAdd2`, `CustPhone`, `County`, `CustTown`, `CustArea`, `CustBuild`, `CustFloor`, `CustDoorbell`, `CustComments`, `CustState`, `CustCountry`, `CustPostcode`, `CustAddLabel`) VALUES
(1, 10, 'parves', 'kamran', 'abc456 road', '', '77885692465', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CF6 CF6', 'office'),
(2, 10, 'parves', 'kamran', 'leeds', '', '445566991', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F89 F21', 'Home'),
(3, 10, 'parves', 'kamran', 'Sylhet', '', '7845985265554', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E56 E455', 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
`OrderId` int(10) NOT NULL,
  `Status` enum('0','1','2','3','4','5') DEFAULT NULL,
  `CustId` int(10) NOT NULL DEFAULT '0',
  `RestId` int(10) NOT NULL DEFAULT '0',
  `OrderPolicyId` int(11) NOT NULL,
  `CustFirstName` varchar(100) DEFAULT NULL,
  `CustLastName` varchar(100) DEFAULT NULL,
  `OrderAdd1` varchar(250) DEFAULT NULL,
  `CustBuild` varchar(200) DEFAULT NULL,
  `CustFloor` varchar(200) DEFAULT NULL,
  `CustDoorbell` varchar(200) DEFAULT NULL,
  `CustComments1` varchar(300) DEFAULT NULL,
  `OrderAdd2` varchar(250) DEFAULT NULL,
  `OrderAddTown` varchar(250) DEFAULT NULL,
  `OrderAddArea` varchar(300) DEFAULT NULL,
  `OrderAddState` varchar(250) DEFAULT NULL,
  `OrderAddCountry` varchar(250) DEFAULT NULL,
  `OrderAddPostcode` varchar(250) DEFAULT NULL,
  `CustComments` varchar(250) DEFAULT NULL,
  `CustTelephone` varchar(20) DEFAULT NULL,
  `PaymentMethod` varchar(250) DEFAULT NULL,
  `PayStatus` enum('0','1','2') DEFAULT NULL,
  `DeliveryStatus` int(10) NOT NULL DEFAULT '0',
  `ComFee` double NOT NULL DEFAULT '0',
  `ComFeeStatus` int(5) NOT NULL DEFAULT '0',
  `HandlingFee` double DEFAULT '0',
  `Vat` double NOT NULL DEFAULT '0',
  `OrderDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryTime` varchar(250) DEFAULT NULL,
  `CCFee` double NOT NULL DEFAULT '0',
  `DeliveryCost` double DEFAULT '0',
  `AuthorizationCode` varchar(250) DEFAULT NULL,
  `total_price` float NOT NULL DEFAULT '0',
  `BalanceDeduction` float(10,2) NOT NULL DEFAULT '0.00',
  `statementstatus` enum('0','1') DEFAULT NULL,
  `invoicestatus` int(11) NOT NULL DEFAULT '0',
  `aff_from_res` int(11) DEFAULT '0',
  `rest_aff_amount` double NOT NULL DEFAULT '0',
  `aff_cust_id` int(11) NOT NULL DEFAULT '0',
  `cust_aff_amount` double NOT NULL DEFAULT '0',
  `ord_ip` varchar(30) DEFAULT '0.0.0.0',
  `rated_by_customer` enum('0','1','2') DEFAULT NULL,
  `cc_owner` varchar(64) DEFAULT NULL,
  `cc_number` varchar(32) DEFAULT NULL,
  `cc_expires` varchar(5) DEFAULT NULL,
  `cc_cvv` blob,
  `charity_id` int(11) NOT NULL DEFAULT '0',
  `OrderTotalDiscount` double DEFAULT '0',
  `DeliveryDiscount` double DEFAULT '0',
  `Promocode` varchar(100) DEFAULT NULL,
  `PromocodeProvider` varchar(255) DEFAULT NULL,
  `PromocodePrice` double NOT NULL DEFAULT '0',
  `Summery` text,
  `OrderPoint` int(11) NOT NULL,
  `GrandTotal` double NOT NULL,
  `ComRate` double DEFAULT '0',
  `VatRate` double DEFAULT '0',
  `OrderCommission` double NOT NULL,
  `CreditAmount` double DEFAULT '0',
  `ActualBalance` double DEFAULT '0',
  `ComAmount` double DEFAULT '0',
  `last_message` varchar(512) DEFAULT NULL,
  `sms_sent` int(11) DEFAULT '0',
  `OrderLang` varchar(50) NOT NULL,
  `MNOID` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`OrderId`, `Status`, `CustId`, `RestId`, `OrderPolicyId`, `CustFirstName`, `CustLastName`, `OrderAdd1`, `CustBuild`, `CustFloor`, `CustDoorbell`, `CustComments1`, `OrderAdd2`, `OrderAddTown`, `OrderAddArea`, `OrderAddState`, `OrderAddCountry`, `OrderAddPostcode`, `CustComments`, `CustTelephone`, `PaymentMethod`, `PayStatus`, `DeliveryStatus`, `ComFee`, `ComFeeStatus`, `HandlingFee`, `Vat`, `OrderDate`, `DeliveryTime`, `CCFee`, `DeliveryCost`, `AuthorizationCode`, `total_price`, `BalanceDeduction`, `statementstatus`, `invoicestatus`, `aff_from_res`, `rest_aff_amount`, `aff_cust_id`, `cust_aff_amount`, `ord_ip`, `rated_by_customer`, `cc_owner`, `cc_number`, `cc_expires`, `cc_cvv`, `charity_id`, `OrderTotalDiscount`, `DeliveryDiscount`, `Promocode`, `PromocodeProvider`, `PromocodePrice`, `Summery`, `OrderPoint`, `GrandTotal`, `ComRate`, `VatRate`, `OrderCommission`, `CreditAmount`, `ActualBalance`, `ComAmount`, `last_message`, `sms_sent`, `OrderLang`, `MNOID`) VALUES
(1, '0', 1, 29, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', 'woooooooooow', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 11:22:43', '2016-11-01 11:22:27', 0, 0, NULL, 40.8, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 40.8, 0, 0, 0, 0, 0, 40.8, NULL, 0, 'en', 1),
(2, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 11:48:27', '2016-11-01 11:48:04', 0, 0, NULL, 13.15, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 13.15, 0, 0, 0, 0, 0, 13.15, NULL, 0, 'en', 2),
(3, '0', 1, 29, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 11:53:49', '2016-11-01 11:53:32', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 3),
(4, '0', 1, 29, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 12:25:01', '2016-11-01 12:24:47', 0, 0, NULL, 8.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 8.75, 0, 0, 0, 0, 0, 8.75, NULL, 0, 'en', 4),
(5, '0', 2, 29, 2, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', '01711336575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 13:08:12', '2016-11-01 13:08:06', 0, 0, NULL, 6.05, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.05, 0, 0, 0, 0, 0, 6.05, NULL, 0, 'en', 5),
(6, '0', 1, 29, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 13:09:30', '2016-11-01 13:09:25', 0, 0, NULL, 28, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 28, 0, 0, 0, 0, 0, 28, NULL, 0, 'en', 6),
(7, '0', 2, 29, 2, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', '01711336575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 13:09:38', '2016-11-01 13:09:14', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 7),
(8, '0', 1, 29, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 13:43:14', '2016-11-01 13:43:05', 0, 0, NULL, 5.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 5.65, 0, 0, 0, 0, 0, 5.65, NULL, 0, 'en', 8),
(9, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-01 15:34:48', '2016-11-01 15:34:41', 0, 0, NULL, 5.25, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 5.25, 0, 0, 0, 0, 0, 5.25, NULL, 0, 'en', 9),
(10, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'online', '1', 0, 0, 0, 0, 0, '2016-11-01 15:35:14', '2016-11-01 15:35:09', 0.5, 0, NULL, 5.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.15, 0, 0, 0, 0, 0, 5.65, NULL, 0, 'en', 10),
(11, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'online', '1', 0, 0, 0, 0, 0, '2016-11-01 15:42:35', '2016-11-01 15:42:30', 0.5, 0, NULL, 5.9, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.4, 0, 0, 0, 0, 0, 5.9, NULL, 0, 'en', 11),
(12, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'online', '1', 0, 0, 0, 0, 0, '2016-11-01 16:07:10', '2016-11-01 16:06:48', 0.5, 0, NULL, 8.6, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 9.1, 0, 0, 0, 0, 0, 8.6, NULL, 0, 'en', 12),
(13, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'online', '1', 0, 0, 0, 0, 0, '2016-11-01 16:16:40', '2016-11-01 16:16:34', 0.5, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 3.45, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 13),
(14, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'online', '1', 0, 0, 0, 0, 0, '2016-11-01 16:24:38', '2016-11-01 16:24:33', 0.5, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 3.45, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 14),
(15, '0', 2, 29, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 09:53:46', '2016-11-02 09:53:40', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 15),
(16, '0', 2, 30, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 12:19:51', '2016-11-02 12:19:44', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 18),
(17, '0', 2, 30, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 13:38:30', '2016-11-02 13:38:26', 0, 0, NULL, 8.6, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 8.6, 0, 0, 0, 0, 0, 8.6, NULL, 0, 'en', 19),
(18, '0', 3, 30, 1, 'muhammed', 'Kibria', '71 Pethybridge Road', NULL, NULL, NULL, NULL, NULL, '7', '14', '', '', 'CF5 4DR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 14:10:37', '2016-11-02 14:10:25', 0, 0, NULL, 35.7, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 35.7, 0, 0, 0, 0, 0, 35.7, NULL, 0, 'en', 20),
(19, '0', 3, 30, 1, 'muhammed', 'Kibria', '71 Pethybridge Road', NULL, NULL, NULL, NULL, NULL, '7', '14', '', '', 'CF5 4DR', 'please provide extrafood', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 15:08:24', '2016-11-02 15:07:55', 0, 0, NULL, 8.85, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 8.85, 0, 0, 0, 0, 0, 8.85, NULL, 0, 'en', 25),
(20, '0', 2, 30, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 15:23:02', '2016-11-02 15:20:48', 0, 0, NULL, 5.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 5.65, 0, 0, 0, 0, 0, 5.65, NULL, 0, 'en', 26),
(21, '0', 5, 30, 1, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 15:38:39', '2016-11-02 23:33:11', 0, 0, NULL, 184.85, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 184.85, 0, 0, 0, 0, 0, 184.85, NULL, 0, 'en', 27),
(22, '0', 7, 30, 1, 'Exotic ', 'Shaad', '87 salop street', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF641HF', 'Daddy don''t cook it its a test only by your one and only son', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 21:49:49', '2016-11-02 21:48:59', 0, 0, NULL, 149.5, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 149.5, 0, 0, 0, 0, 0, 149.5, NULL, 0, 'en', 28),
(23, '0', 2, 30, 1, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 06:59:47', '2016-11-03 06:59:44', 0, 0, NULL, 6.05, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 6.05, 0, 0, 0, 0, 0, 6.05, NULL, 0, 'en', 29),
(24, '0', 1, 30, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 07:59:21', '2016-11-03 07:59:09', 0, 0, NULL, 23.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 23.75, 0, 0, 0, 0, 0, 23.75, NULL, 0, 'en', 30),
(25, '0', 5, 30, 2, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', '01711336575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 09:29:54', '2016-11-03 17:09:02', 0, 0, NULL, 70.7, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 70.7, 0, 0, 0, 0, 0, 70.7, NULL, 0, 'en', 31),
(26, '0', 5, 30, 1, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', '017 113 36575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 10:29:22', '2016-11-03 10:29:18', 0, 0, NULL, 18.01, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 18.01, 0, 0, 0, 0, 0, 18.01, NULL, 0, 'en', 32),
(27, '0', 5, 30, 1, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', '017 113 36575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 10:46:13', '2016-11-03 10:29:42', 0, 0, NULL, 5.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 5.65, 0, 0, 0, 0, 0, 5.65, NULL, 0, 'en', 33),
(28, '0', 5, 30, 1, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', '017 113 36575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 10:46:31', '2016-11-03 10:46:25', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en', 34),
(29, '1', 9, 30, 1, 'Saumik', 'Dhar', '87 salop street', NULL, NULL, NULL, NULL, NULL, '1', '2', '', '', 'CF64 1HF', '', '07459443321', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-12 18:54:48', '17 November 2016 07:50', 0, 0, NULL, 12.9, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 12.9, 0, 0, 0, 0, 0, 12.9, NULL, 0, 'en', 41),
(30, '0', 2, 30, 2, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', 'this is just test from developer pls dont consider it as order ', '01711336575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-13 16:18:01', '2016-11-13 16:17:12', 0, 1.5, NULL, 10.8, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 12.3, 0, 0, 0, 0, 0, 10.8, NULL, 0, 'en', 43),
(31, '0', 10, 29, 1, 'parves', 'kamran', 'cardiff', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 ', '', '01712403050', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-14 14:21:10', '2016-11-14 14:20:58', 0, 0, NULL, 41.6, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 10.4, 0, '', '29', 0, NULL, 0, 41.6, 0, 0, 0, 0, 0, 31.2, NULL, 0, 'en', 45),
(32, '0', 10, 29, 1, 'parves', 'kamran', 'cardiff', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 ', '', '01712403050', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-14 14:37:09', '2016-11-14 14:37:03', 0, 0, NULL, 6.05, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.05, 0, 0, 0, 0, 0, 6.05, NULL, 0, 'en', 46),
(33, '0', 11, 29, 2, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', 'test', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-14 14:48:39', '2016-11-14 14:48:22', 0, 0, NULL, 9.8, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 2.45, 0, '', '29', 0, NULL, 0, 9.8, 0, 0, 0, 0, 0, 7.35, NULL, 0, 'en', 47),
(34, '0', 11, 29, 2, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'online', '1', 0, 0, 0, 0, 0, '2016-11-14 16:26:24', '2016-11-14 16:25:03', 0.5, 0, NULL, 8.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 9.25, 0, 0, 0, 0, 0, 8.75, NULL, 0, 'en', 48),
(35, '0', 11, 29, 2, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'online', '1', 0, 0, 0, 0, 0, '2016-11-14 16:30:45', '2016-11-14 16:30:37', 0.5, 0, NULL, 8.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 9.25, 0, 0, 0, 0, 0, 8.75, NULL, 0, 'en', 49),
(36, '0', 11, 29, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-15 07:19:10', '2016-11-15 07:19:02', 0, 0, NULL, 9.15, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 9.15, 0, 0, 0, 0, 0, 9.15, NULL, 0, 'en', 50),
(37, '0', 10, 29, 1, 'parves', 'kamran', 'cardiff', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 ', '', '01712403050', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-15 07:20:47', '2016-11-15 07:20:41', 0, 0, NULL, 16.6, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 4.15, 0, '', '29', 0, NULL, 0, 16.6, 0, 0, 0, 0, 0, 12.45, NULL, 0, 'en', 51),
(38, '0', 11, 29, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-16 08:51:36', '2016-11-16 08:51:27', 0, 0, NULL, 6.05, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.05, 0, 0, 0, 0, 0, 6.05, NULL, 0, 'en', 57),
(39, '0', 11, 29, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-16 08:53:19', '2016-11-16 08:51:27', 0, 0, NULL, 6.05, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '29', 0, NULL, 0, 6.05, 0, 0, 0, 0, 0, 6.05, NULL, 0, 'en', 58),
(40, '0', 11, 30, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-16 09:41:35', '2016-11-16 09:41:21', 0, 0, NULL, 5.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 5.65, 0, 0, 0, 0, 0, 5.65, NULL, 0, 'en', 40),
(41, '0', 11, 30, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-17 06:32:47', '17 November 2016 07:50', 0, 0, NULL, 8.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 8.75, 0, 0, 0, 0, 0, 8.75, NULL, 0, 'en', 41),
(42, '1', 11, 30, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-17 06:51:09', '17 November 201607:20', 0, 0, NULL, 13.55, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 13.55, 0, 0, 0, 0, 0, 13.55, NULL, 0, 'en', 42);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_busket`
--

CREATE TABLE IF NOT EXISTS `customer_order_busket` (
`OrderId` int(10) NOT NULL,
  `Status` enum('0','1','2','3','4','5') DEFAULT NULL,
  `CustId` int(10) NOT NULL DEFAULT '0',
  `RestId` int(10) NOT NULL DEFAULT '0',
  `OrderPolicyId` int(11) NOT NULL,
  `CustFirstName` varchar(100) DEFAULT NULL,
  `CustLastName` varchar(100) DEFAULT NULL,
  `OrderAdd1` varchar(250) DEFAULT NULL,
  `CustBuild` varchar(200) DEFAULT NULL,
  `CustFloor` varchar(200) DEFAULT NULL,
  `CustDoorbell` varchar(200) DEFAULT NULL,
  `CustComments1` varchar(300) DEFAULT NULL,
  `OrderAdd2` varchar(250) DEFAULT NULL,
  `OrderAddTown` varchar(250) DEFAULT NULL,
  `OrderAddArea` varchar(300) DEFAULT NULL,
  `OrderAddState` varchar(250) DEFAULT NULL,
  `OrderAddCountry` varchar(250) DEFAULT NULL,
  `OrderAddPostcode` varchar(250) DEFAULT NULL,
  `CustComments` varchar(250) DEFAULT NULL,
  `CustTelephone` varchar(200) DEFAULT NULL,
  `PaymentMethod` varchar(250) DEFAULT NULL,
  `PayStatus` enum('0','1','2') DEFAULT NULL,
  `DeliveryStatus` int(10) NOT NULL DEFAULT '0',
  `ComFee` double NOT NULL DEFAULT '0',
  `ComFeeStatus` int(5) NOT NULL DEFAULT '0',
  `HandlingFee` double DEFAULT '0',
  `Vat` double NOT NULL DEFAULT '0',
  `OrderDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryTime` varchar(250) DEFAULT NULL,
  `CCFee` double NOT NULL DEFAULT '0',
  `DeliveryCost` double DEFAULT '0',
  `AuthorizationCode` varchar(250) DEFAULT NULL,
  `total_price` float NOT NULL DEFAULT '0',
  `BalanceDeduction` float(10,2) NOT NULL DEFAULT '0.00',
  `statementstatus` enum('0','1') DEFAULT NULL,
  `invoicestatus` int(11) NOT NULL,
  `aff_from_res` int(11) DEFAULT '0',
  `rest_aff_amount` double NOT NULL DEFAULT '0',
  `aff_cust_id` int(11) NOT NULL DEFAULT '0',
  `cust_aff_amount` double NOT NULL DEFAULT '0',
  `ord_ip` varchar(30) DEFAULT '0.0.0.0',
  `rated_by_customer` enum('0','1','2') DEFAULT NULL,
  `cc_owner` varchar(64) DEFAULT NULL,
  `cc_number` varchar(32) DEFAULT NULL,
  `cc_expires` varchar(5) DEFAULT NULL,
  `cc_cvv` blob NOT NULL,
  `charity_id` int(11) NOT NULL DEFAULT '0',
  `OrderTotalDiscount` double DEFAULT '0',
  `DeliveryDiscount` double DEFAULT '0',
  `Promocode` varchar(100) DEFAULT NULL,
  `PromocodeProvider` varchar(255) DEFAULT NULL,
  `PromocodePrice` double NOT NULL DEFAULT '0',
  `Summery` text,
  `OrderPoint` int(11) DEFAULT '0',
  `GrandTotal` double DEFAULT '0',
  `ComRate` double DEFAULT '0',
  `VatRate` double DEFAULT '0',
  `OrderCommission` double DEFAULT '0',
  `CreditAmount` double DEFAULT '0',
  `ActualBalance` double DEFAULT '0',
  `ComAmount` double DEFAULT '0',
  `last_message` varchar(512) DEFAULT NULL,
  `sms_sent` int(11) DEFAULT '0',
  `OrderLang` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `customer_order_busket`
--

INSERT INTO `customer_order_busket` (`OrderId`, `Status`, `CustId`, `RestId`, `OrderPolicyId`, `CustFirstName`, `CustLastName`, `OrderAdd1`, `CustBuild`, `CustFloor`, `CustDoorbell`, `CustComments1`, `OrderAdd2`, `OrderAddTown`, `OrderAddArea`, `OrderAddState`, `OrderAddCountry`, `OrderAddPostcode`, `CustComments`, `CustTelephone`, `PaymentMethod`, `PayStatus`, `DeliveryStatus`, `ComFee`, `ComFeeStatus`, `HandlingFee`, `Vat`, `OrderDate`, `DeliveryTime`, `CCFee`, `DeliveryCost`, `AuthorizationCode`, `total_price`, `BalanceDeduction`, `statementstatus`, `invoicestatus`, `aff_from_res`, `rest_aff_amount`, `aff_cust_id`, `cust_aff_amount`, `ord_ip`, `rated_by_customer`, `cc_owner`, `cc_number`, `cc_expires`, `cc_cvv`, `charity_id`, `OrderTotalDiscount`, `DeliveryDiscount`, `Promocode`, `PromocodeProvider`, `PromocodePrice`, `Summery`, `OrderPoint`, `GrandTotal`, `ComRate`, `VatRate`, `OrderCommission`, `CreditAmount`, `ActualBalance`, `ComAmount`, `last_message`, `sms_sent`, `OrderLang`) VALUES
(37, '0', 1, 30, 1, 'Parves', 'Rabbani', 'cardiff oxfordstreet', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF23 0A', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 07:59:21', '2016-11-03 07:59:09', 0, 0, NULL, 23.75, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 23.75, 0, 0, 0, 0, 0, 23.75, NULL, 0, 'en'),
(51, '0', 3, 30, 1, 'muhammed', 'Kibria', '71 Pethybridge Road', NULL, NULL, NULL, NULL, NULL, '7', '14', '', '', 'CF5 4DR', '', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-08 21:02:38', '2016-11-08 22:02:38', 0, 0, NULL, 18.65, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 18.65, 0, 0, 0, 0, 0, 18.65, NULL, 0, 'en'),
(53, '0', 2, 30, 2, 'Pavel ', 'Rabbani', '21 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4RR', 'this is just test from developer pls dont consider it as order ', '01711336575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-13 16:18:01', '2016-11-13 16:17:12', 0, 1.5, NULL, 10.8, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 12.3, 0, 0, 0, 0, 0, 10.8, NULL, 0, 'en'),
(52, '0', 9, 30, 1, 'Saumik', 'Dhar', '87 salop street', NULL, NULL, NULL, NULL, NULL, '1', '2', '', '', 'CF64 1HF', '', '07459443321', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-12 18:54:48', '2016-11-12 18:54:36', 0, 0, NULL, 12.9, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 12.9, 0, 0, 0, 0, 0, 12.9, NULL, 0, 'en'),
(35, '0', 7, 30, 1, 'Exotic ', 'Shaad', '87 salop street', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF641HF', 'Daddy don''t cook it its a test only by your one and only son', NULL, 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-02 21:49:49', '2016-11-02 21:48:59', 0, 0, NULL, 149.5, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 149.5, 0, 0, 0, 0, 0, 149.5, NULL, 0, 'en'),
(42, '0', 5, 30, 1, 'Rabbani', 'Soft', '2 sn', NULL, NULL, NULL, NULL, NULL, '4', '6', '', '', 'CF5 4PR', '', '017 113 36575', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-03 10:46:31', '2016-11-03 10:46:25', 0, 0, NULL, 2.95, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 2.95, 0, 0, 0, 0, 0, 2.95, NULL, 0, 'en'),
(60, '0', 10, 29, 1, 'parves', 'kamran', 'cardiff', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 ', '', '01712403050', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-15 07:20:47', '2016-11-15 07:20:41', 0, 0, NULL, 16.6, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 4.15, 0, '', '29', 0, NULL, 0, 16.6, 0, 0, 0, 0, 0, 12.45, NULL, 0, 'en'),
(65, '0', 11, 30, 1, 'Mr ', 'Aktaruzzaman', '75 prythibridge road', NULL, NULL, NULL, NULL, NULL, '4', NULL, '', '', 'CF5 4DR', '', '01717103734', 'cod', NULL, 0, 0, 0, 0, 0, '2016-11-17 06:51:09', '2016-11-17 06:51:05', 0, 0, NULL, 13.55, 0.00, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '', '30', 0, NULL, 0, 13.55, 0, 0, 0, 0, 0, 13.55, NULL, 0, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `meta_keys` text NOT NULL,
  `meta_desc` text NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=NO',
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `slug`, `content`, `image`, `meta_keys`, `meta_desc`, `is_published`, `is_featured`, `is_deleted`, `modified_at`, `modified_by`, `created_at`, `created_by`) VALUES
(25, '', '', '', 'images (2).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:49', '1'),
(26, '', '', '', 'download (4).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:49', '1'),
(27, '', '', '', 'download (5).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:49', '1'),
(28, '', '', '', 'Bhuna mutton1 copy.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:50', '1'),
(29, '', '', '', 'images.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:50', '1'),
(31, '', '', '', 'download (6).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:51', '1'),
(32, '', '', '', 'download (1).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:51', '1'),
(33, '', '', '', 'download (2).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:51', '1'),
(34, '', '', '', 'download (3).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:51', '1'),
(35, '', '', '', 'images (1).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:22:52', '1'),
(36, '', '', '', 'download (7).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:23:53', '1'),
(38, '', '', '', 'tandorrikingprawn.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:26:33', '1'),
(39, '', '', '', 'download (8).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:26:37', '1'),
(40, '', '', '', 'images (2).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:26:47', '1'),
(42, '', '', '', 'cheese-balls-625_625x350_81436947081.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:28:36', '1'),
(43, '', '', '', 'download (2).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:32:39', '1'),
(46, '', '', '', 'download.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:39:25', '1'),
(47, '', '', '', 'download (1).jpg', '', '', 1, 0, 0, NULL, '', '2016-11-02 17:41:14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_category`
--

CREATE TABLE IF NOT EXISTS `gkpos_category` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=Food,2=Non Food',
  `print_option` tinyint(1) NOT NULL COMMENT '1=ST,2=MN,3=SD,4=SR',
  `order` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active,2=inactive,3=archive',
  `content` text NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `gkpos_category`
--

INSERT INTO `gkpos_category` (`id`, `title`, `type`, `print_option`, `order`, `status`, `content`, `modified`, `modified_by`, `created`, `created_by`, `image`) VALUES
(1, 'Vagetarian Starters', 1, 1, 1, 1, 'description on vageterian starter', '0000-00-00 00:00:00', '', '2016-12-21 06:51:07', '1', ''),
(2, 'Non Vegetarian Starters', 1, 1, 3, 1, '', '0000-00-00 00:00:00', '', '2016-12-09 09:49:07', '1', ''),
(3, 'Seafood Starters', 1, 1, 4, 1, '', '0000-00-00 00:00:00', '', '2016-12-09 09:49:07', '1', ''),
(4, 'Special Tandoori Grilled Starters', 1, 1, 5, 1, '', '0000-00-00 00:00:00', '', '2016-12-09 09:49:07', '1', ''),
(5, 'Exotic Tandoori Courses', 2, 1, 2, 1, '', '0000-00-00 00:00:00', '', '2016-12-21 06:40:34', '1', ''),
(6, 'South Asian specialty curries', 1, 1, 6, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:36:26', '1', ''),
(7, 'Chef’s own specialty Dishes', 1, 1, 7, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:36:47', '1', ''),
(8, 'Classic Indian mild dishes', 1, 1, 8, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:37:12', '1', ''),
(9, 'South Asia wok Biryani dishes', 1, 1, 9, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:37:20', '1', ''),
(10, 'Special Balti dishes', 1, 1, 10, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:37:33', '1', ''),
(11, 'Vegetarian Main Dishes', 1, 1, 11, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:37:49', '1', ''),
(12, 'Poppadum’s and raita salad', 1, 1, 12, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:38:02', '1', ''),
(13, 'Accompaniments', 1, 2, 13, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:38:17', '1', ''),
(14, 'Drinks', 2, 3, 14, 1, '', '2016-12-05 07:32:33', '1', '2016-12-08 14:38:45', '1', ''),
(15, 'Vegetarian Side Dishes', 1, 3, 15, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:38:45', '1', ''),
(16, 'Everyday Classic', 1, 2, 16, 1, '', '0000-00-00 00:00:00', '', '2016-12-08 14:38:54', '1', ''),
(17, 'test1', 1, 1, 18, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(18, 'test2', 1, 1, 19, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(19, 'test3', 1, 1, 20, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(20, 'test4', 1, 1, 21, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(21, 'test5', 1, 1, 22, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(22, 'test6', 1, 1, 23, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(23, 'test7', 1, 1, 24, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(24, 'test8', 1, 1, 25, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(25, 'test9', 1, 1, 26, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(26, 'test10', 1, 1, 27, 1, '', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(27, 'text23', 1, 1, 28, 1, 'asda', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(28, 'test25', 1, 1, 29, 1, 'description', '0000-00-00 00:00:00', '', '2016-12-06 11:03:40', '1', ''),
(29, 'test26', 1, 1, 30, 2, 'description', '0000-00-00 00:00:00', '', '2016-12-07 09:32:20', '1', ''),
(30, 'Test finalize', 2, 2, 17, 1, 'description on test finalize', '0000-00-00 00:00:00', '', '2016-12-08 14:38:54', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_customer`
--

CREATE TABLE IF NOT EXISTS `gkpos_customer` (
  `phone` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `floor_or_apt` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `house` varchar(10) NOT NULL,
  `street` text NOT NULL,
  `postcode` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active,2=inactive,3=archive',
  `order` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gkpos_customer`
--

INSERT INTO `gkpos_customer` (`phone`, `name`, `floor_or_apt`, `building`, `house`, `street`, `postcode`, `status`, `order`, `modified`, `modified_by`, `created`, `created_by`, `image`) VALUES
('+44785963258', 'tyyuu', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-20 10:55:05', '1', ''),
('01717103732', 'Don', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-29 14:10:42', '1', ''),
('01717103734', 'mr zaman', '3rd floor', 'Baba Monjil', '165/5', 'sonar para shibgonj', 'e1 5de', 1, 0, '0000-00-00 00:00:00', '', '2016-12-18 08:17:20', '1', ''),
('01717103735', 'Mr Aktar', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-18 08:19:32', '1', ''),
('01717103736', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-18 08:21:07', '1', ''),
('01717103738', 'mr zamantwo', '3rd floor', 'Baba Monjil', '165/5', 'sonar para shibgonj', 'e1 5de', 1, 0, '0000-00-00 00:00:00', '', '2016-12-18 15:36:37', '1', ''),
('123345345234', 'jamil', '32', '54df', '234', 'sonar para shibgonj', 'e1 5de', 1, 0, '0000-00-00 00:00:00', '', '2016-12-20 05:45:23', '1', ''),
('234234324324', 'zobbar', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-20 05:46:04', '1', ''),
('23423434324', 'Hamburi', '3rd floor', 'Monjil House', '165/5', 'sonar para shibgonj', 'CF5 4DR', 1, 0, '0000-00-00 00:00:00', '', '2016-12-26 10:14:34', '1', ''),
('234345435345', 'mr tester', '3rd floor', 'Baba Monjil', '165/5', 'sonar para shibgonj', 'CF5 4DR', 1, 0, '0000-00-00 00:00:00', '', '2016-12-26 09:42:00', '1', ''),
('345345345435', 'kanna', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '', '2016-12-20 06:08:11', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_deliveryplan`
--

CREATE TABLE IF NOT EXISTS `gkpos_deliveryplan` (
`id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `is_free` tinyint(1) NOT NULL COMMENT '1=yes,2=no',
  `delivery_charge` double NOT NULL,
  `min_order` double NOT NULL,
  `initial_code` varchar(11) DEFAULT NULL,
  `postcodes` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=active,2=inactive',
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gkpos_deliveryplan`
--

INSERT INTO `gkpos_deliveryplan` (`id`, `area`, `is_free`, `delivery_charge`, `min_order`, `initial_code`, `postcodes`, `status`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(1, 'Cardiff', 0, 2, 20, 'CF5', 'CF5 1AA,CF5 1AB,CF5 1AD,CF5 1AE,CF5 1AF,CF5 1AG,CF5 1AH,CF5 1AJ,CF5 1AL,CF5 1AN,CF5 1AP,CF5 1AQ,CF5 1AR,CF5 1AS,CF5 1AT,CF5 1AW,CF5 1AX,CF5 1BA,CF5 1BB,CF5 1BD,CF5 1BE,CF5 1BG,CF5 1BH,CF5 1BJ,CF5 1BL,CF5 1BN,CF5 1BP,CF5 1BQ,CF5 1BR,CF5 1BS,CF5 1BT,CF5 1BU,CF5 1BW,CF5 1BX,CF5 1BY,CF5 1BZ,CF5 1DG,CF5 1DH,CF5 1DJ,CF5 1DL,CF5 1DN,CF5 1DP,CF5 1DQ,CF5 1DR,CF5 1DS,CF5 1DT,CF5 1DU,CF5 1DW,CF5 1DX,CF5 1DY,CF5 1DZ,CF5 1EA,CF5 1EB,CF5 1EF,CF5 1EG,CF5 1EH,CF5 1EJ,CF5 1EL,CF5 1EN,CF5 1EP,CF5 1EQ,CF5 1ER,CF5 1ES,CF5 1ET,CF5 1EU,CF5 1EW,CF5 1EX,CF5 1EY,CF5 1EZ,CF5 1FA,CF5 1FB,CF5 1FH,CF5 1FJ,CF5 1FL,CF5 1FN,CF5 1FP,CF5 1FQ,CF5 1FR,CF5 1FS,CF5 1FT,CF5 1FU,CF5 1FW,CF5 1FX,CF5 1FY,CF5 1FZ,CF5 1GB,CF5 1GD,CF5 1GE,CF5 1GF,CF5 1GG,CF5 1GH,CF5 1GJ,CF5 1GL,CF5 1GN,CF5 1GP,CF5 1GQ,CF5 1GR,CF5 1GT,CF5 1GW,CF5 1GX,CF5 1GY,CF5 1GZ,CF5 1HA,CF5 1HB,CF5 1HD,CF5 1HE,CF5 1HF,CF5 1HG,CF5 1HH,CF5 1HJ,CF5 1HL,CF5 1HN,CF5 1HP,CF5 1HQ,CF5 1HR,CF5 1HS,CF5 1HT,CF5 1HU,CF5 1HW,CF5 1HX,CF5 1HY,CF5 1HZ,CF5 1JA,CF5 1JB,CF5 1JD,CF5 1JE,CF5 1JF,CF5 1JG,CF5 1JH,CF5 1JJ,CF5 1JL,CF5 1JN,CF5 1JP,CF5 1JQ,CF5 1JR,CF5 1JS,CF5 1JT,CF5 1JU,CF5 1JW,CF5 1JX,CF5 1JY,CF5 1JZ,CF5 1LA,CF5 1LF,CF5 1LH,CF5 1LJ,CF5 1LL,CF5 1LN,CF5 1LP,CF5 1LQ,CF5 1LR,CF5 1LS,CF5 1LT,CF5 1LU,CF5 1LW,CF5 1LX,CF5 1LY,CF5 1LZ,CF5 1NA,CF5 1NB,CF5 1ND,CF5 1NE,CF5 1NF,CF5 1NG,CF5 1NH,CF5 1NJ,CF5 1NL,CF5 1NR,CF5 1NS,CF5 1NT,CF5 1NU,CF5 1NW,CF5 1NX,CF5 1NY,CF5 1NZ,CF5 1PA,CF5 1PB,CF5 1PD,CF5 1PE,CF5 1PF,CF5 1PG,CF5 1PH,CF5 1PJ,CF5 1PL,CF5 1PN,CF5 1PP,CF5 1PQ,CF5 1PR,CF5 1PS,CF5 1PT,CF5 1PU,CF5 1PW,CF5 1PX,CF5 1PY,CF5 1PZ,CF5 1QA,CF5 1QB,CF5 1QD,CF5 1QE,CF5 1QF,CF5 1QG,CF5 1QH,CF5 1QJ,CF5 1QL,CF5 1QN,CF5 1QP,CF5 1QQ,CF5 1QR,CF5 1QS,CF5 1QT,CF5 1QU,CF5 1QW,CF5 1QX,CF5 1QY,CF5 1QZ,CF5 1RA,CF5 1RB,CF5 1RD,CF5 1RE,CF5 1RF,CF5 1RG,CF5 1RH,CF5 1RT,CF5 1RU,CF5 1RY,CF5 1RZ,CF5 1SA,CF5 1SB,CF5 1SD,CF5 1SE,CF5 1SG,CF5 1UF,CF5 1UL,CF5 1WU,CF5 1WX,CF5 1XA,CF5 1XB,CF5 1XT,CF5 1YE,CF5 1YR,CF5 1ZB,CF5 1ZE,CF5 1ZS,CF5 2AA,CF5 2AB,CF5 2AD,CF5 2AE,CF5 2AF,CF5 2AG,CF5 2AH,CF5 2AJ,CF5 2AL,CF5 2AN,CF5 2AP,CF5 2AQ,CF5 2AR,CF5 2AS,CF5 2AW,CF5 2AX,CF5 2AY,CF5 2AZ,CF5 2BA,CF5 2BB,CF5 2BD,CF5 2BE,CF5 2BG,CF5 2BH,CF5 2BJ,CF5 2BL,CF5 2BN,CF5 2BP,CF5 2BQ,CF5 2BR,CF5 2BS,CF5 2BT,CF5 2BU,CF5 2BW,CF5 2BX,CF5 2BY,CF5 2BZ,CF5 2DA,CF5 2DE,CF5 2DL,CF5 2DN,CF5 2DP,CF5 2DQ,CF5 2DR,CF5 2DS,CF5 2DT,CF5 2DU,CF5 2DW,CF5 2DX,CF5 2DY,CF5 2DZ,CF5 2EA,CF5 2EB,CF5 2ED,CF5 2EE,CF5 2EF,CF5 2EG,CF5 2EH,CF5 2EJ,CF5 2EL,CF5 2EN,CF5 2EP,CF5 2EQ,CF5 2ER,CF5 2ES,CF5 2ET,CF5 2EU,CF5 2EW,CF5 2EY,CF5 2EZ,CF5 2FQ,CF5 2HA,CF5 2HB,CF5 2HD,CF5 2HE,CF5 2HF,CF5 2HG,CF5 2HH,CF5 2HJ,CF5 2HL,CF5 2HN,CF5 2HP,CF5 2HQ,CF5 2HR,CF5 2HS,CF5 2HT,CF5 2HU,CF5 2HW,CF5 2HX,CF5 2JB,CF5 2JD,CF5 2JE,CF5 2JF,CF5 2JG,CF5 2JH,CF5 2JJ,CF5 2JL,CF5 2JN,CF5 2JP,CF5 2JQ,CF5 2JR,CF5 2JS,CF5 2JT,CF5 2JU,CF5 2JW,CF5 2LA,CF5 2LB,CF5 2LD,CF5 2LE,CF5 2LF,CF5 2LG,CF5 2LH,CF5 2LJ,CF5 2LL,CF5 2LN,CF5 2LP,CF5 2LQ,CF5 2LR,CF5 2LS,CF5 2LT,CF5 2LU,CF5 2NA,CF5 2NB,CF5 2ND,CF5 2NG,CF5 2NH,CF5 2NJ,CF5 2NL,CF5 2NN,CF5 2NP,CF5 2NQ,CF5 2NR,CF5 2NS,CF5 2NZ,CF5 2PA,CF5 2PD,CF5 2PG,CF5 2PH,CF5 2PN,CF5 2PT,CF5 2PU,CF5 2PX,CF5 2PZ,CF5 2QA,CF5 2QB,CF5 2QD,CF5 2QE,CF5 2QJ,CF5 2SG,CF5 2SJ,CF5 2UT,CF5 2WZ,CF5 2XA,CF5 2XB,CF5 2XD,CF5 2XJ,CF5 2XP,CF5 2YB,CF5 2YD,CF5 2YE,CF5 2YF,CF5 2YH,CF5 2YJ,CF5 2YN,CF5 2YQ,CF5 2YX,CF5 2ZR,CF5 3AB,CF5 3AD,CF5 3AE,CF5 3AF,CF5 3AG,CF5 3AH,CF5 3AJ,CF5 3AL,CF5 3AN,CF5 3AP,CF5 3AQ,CF5 3AR,CF5 3AS,CF5 3AT,CF5 3AU,CF5 3AW,CF5 3AX,CF5 3AY,CF5 3AZ,CF5 3BA,CF5 3BB,CF5 3BD,CF5 3BE,CF5 3BF,CF5 3BG,CF5 3BH,CF5 3BJ,CF5 3BL,CF5 3BN,CF5 3BP,CF5 3BQ,CF5 3BR,CF5 3BS,CF5 3BT,CF5 3BU,CF5 3BW,CF5 3BX,CF5 3BY,CF5 3BZ,CF5 3DA,CF5 3DB,CF5 3DD,CF5 3DE,CF5 3DF,CF5 3DG,CF5 3DH,CF5 3DJ,CF5 3DL,CF5 3DN,CF5 3DP,CF5 3DT,CF5 3DU,CF5 3DW,CF5 3DX,CF5 3DY,CF5 3DZ,CF5 3EA,CF5 3EB,CF5 3ED,CF5 3EE,CF5 3EF,CF5 3EG,CF5 3EH,CF5 3EJ,CF5 3EL,CF5 3EN,CF5 3EP,CF5 3EQ,CF5 3ER,CF5 3ES,CF5 3EU,CF5 3EW,CF5 3EX,CF5 3EY,CF5 3EZ,CF5 3HA,CF5 3HB,CF5 3HD,CF5 3HE,CF5 3HF,CF5 3HG,CF5 3HH,CF5 3HJ,CF5 3HL,CF5 3HN,CF5 3HP,CF5 3HQ,CF5 3HR,CF5 3HS,CF5 3HT,CF5 3HU,CF5 3HW,CF5 3HX,CF5 3HY,CF5 3HZ,CF5 3JA,CF5 3JB,CF5 3JD,CF5 3JE,CF5 3JN,CF5 3JP,CF5 3JQ,CF5 3JR,CF5 3JS,CF5 3JT,CF5 3JU,CF5 3JW,CF5 3JX,CF5 3JY,CF5 3JZ,CF5 3LA,CF5 3LB,CF5 3LD,CF5 3LE,CF5 3LF,CF5 3LG,CF5 3LH,CF5 3LJ,CF5 3LS,CF5 3LT,CF5 3NA,CF5 3NB,CF5 3ND,CF5 3NG,CF5 3NL,CF5 3NN,CF5 3NP,CF5 3NS,CF5 3NT,CF5 3NU,CF5 3NW,CF5 3NY,CF5 3PD,CF5 3PE,CF5 3PF,CF5 3PG,CF5 3PJ,CF5 3PL,CF5 3PN,CF5 3PP,CF5 3PQ,CF5 3PR,CF5 3PS,CF5 3PT,CF5 3PU,CF5 3PW,CF5 3PX,CF5 3PY,CF5 3PZ,CF5 3QA,CF5 3QB,CF5 3QD,CF5 3QE,CF5 3QF,CF5 3QG,CF5 3QH,CF5 3QJ,CF5 3QL,CF5 3QN,CF5 3QP,CF5 3RA,CF5 3RU,CF5 3RW,CF5 3SH,CF5 3SJ,CF5 3SL,CF5 3SP,CF5 3SQ,CF5 3SR,CF5 3SS,CF5 3ST,CF5 3SU,CF5 3SW,CF5 3SX,CF5 3SY,CF5 3SZ,CF5 3TA,CF5 3TB,CF5 3TD,CF5 3TE,CF5 3TF,CF5 3TG,CF5 3TH,CF5 3TJ,CF5 3TL,CF5 3TN,CF5 3TP,CF5 3TQ,CF5 3TR,CF5 3TS,CF5 3TT,CF5 3TU,CF5 3TW,CF5 3UA,CF5 3UB,CF5 3UD,CF5 3UE,CF5 3UF,CF5 3UG,CF5 3WZ,CF5 3XN,CF5 3YE,CF5 3YQ,CF5 3YR,CF5 3YY,CF5 4AA,CF5 4AB,CF5 4AD,CF5 4AE,CF5 4AF,CF5 4AG,CF5 4AH,CF5 4AJ,CF5 4AL,CF5 4AN,CF5 4AP,CF5 4AQ,CF5 4AR,CF5 4BA,CF5 4BB,CF5 4BD,CF5 4BE,CF5 4BG,CF5 4BH,CF5 4BJ,CF5 4BL,CF5 4BN,CF5 4BP,CF5 4BQ,CF5 4BR,CF5 4BS,CF5 4BT,CF5 4BU,CF5 4BW,CF5 4BX,CF5 4DD,CF5 4DE,CF5 4DF,CF5 4DG,CF5 4DH,CF5 4DJ,CF5 4DL,CF5 4DN,CF5 4DP,CF5 4DQ,CF5 4DR,CF5 4DS,CF5 4DT,CF5 4DU,CF5 4DW,CF5 4DX,CF5 4DY,CF5 4DZ,CF5 4EA,CF5 4EB,CF5 4EF,CF5 4EU,CF5 4EW,CF5 4EX,CF5 4EY,CF5 4EZ,CF5 4FA,CF5 4FB,CF5 4FD,CF5 4FE,CF5 4FF,CF5 4FG,CF5 4FH,CF5 4FJ,CF5 4FL,CF5 4FN,CF5 4FP,CF5 4FQ,CF5 4FR,CF5 4FS,CF5 4FT,CF5 4FU,CF5 4FW,CF5 4FX,CF5 4FY,CF5 4FZ,CF5 4GA,CF5 4GJ,CF5 4GL,CF5 4GN,CF5 4GP,CF5 4GQ,CF5 4GR,CF5 4GS,CF5 4GT,CF5 4GU,CF5 4GW,CF5 4GX,CF5 4GY,CF5 4GZ,CF5 4HA,CF5 4HB,CF5 4HD,CF5 4HE,CF5 4HF,CF5 4HG,CF5 4HH,CF5 4HJ,CF5 4HL,CF5 4HN,CF5 4HU,CF5 4HW,CF5 4HX,CF5 4HY,CF5 4HZ,CF5 4JA,CF5 4JB,CF5 4JD,CF5 4JE,CF5 4JF,CF5 4JG,CF5 4JH,CF5 4JJ,CF5 4JL,CF5 4JP,CF5 4JQ,CF5 4JR,CF5 4JS,CF5 4JT,CF5 4JU,CF5 4LE,CF5 4LF,CF5 4LG,CF5 4LH,CF5 4LJ,CF5 4LL,CF5 4LN,CF5 4LP,CF5 4LQ,CF5 4LR,CF5 4LS,CF5 4LT,CF5 4LU,CF5 4LW,CF5 4LX,CF5 4LY,CF5 4NF,CF5 4NH,CF5 4NL,CF5 4NN,CF5 4NP,CF5 4NQ,CF5 4NR,CF5 4NS,CF5 4PB,CF5 4PD,CF5 4PE,CF5 4PQ,CF5 4PR,CF5 4PW,CF5 4PY,CF5 4PZ,CF5 4QF,CF5 4QG,CF5 4RA,CF5 4RF,CF5 4XB,CF5 4XD,CF5 4XL,CF5 4YT,CF5 5AA,CF5 5AB,CF5 5AD,CF5 5AE,CF5 5AF,CF5 5AG,CF5 5AH,CF5 5AJ,CF5 5AL,CF5 5AN,CF5 5AP,CF5 5AQ,CF5 5AR,CF5 5AS,CF5 5AT,CF5 5AU,CF5 5AW,CF5 5AX,CF5 5AY,CF5 5AZ,CF5 5BA,CF5 5BB,CF5 5BD,CF5 5BE,CF5 5BG,CF5 5BH,CF5 5BJ,CF5 5BL,CF5 5BN,CF5 5BP,CF5 5BQ,CF5 5BR,CF5 5BS,CF5 5BT,CF5 5BU,CF5 5BW,CF5 5BX,CF5 5BY,CF5 5BZ,CF5 5DA,CF5 5DB,CF5 5DD,CF5 5DE,CF5 5DF,CF5 5DG,CF5 5DH,CF5 5DJ,CF5 5DL,CF5 5DN,CF5 5DP,CF5 5DQ,CF5 5DR,CF5 5DS,CF5 5DT,CF5 5DU,CF5 5DW,CF5 5DX,CF5 5DY,CF5 5DZ,CF5 5EA,CF5 5EB,CF5 5ED,CF5 5EE,CF5 5EF,CF5 5EG,CF5 5EH,CF5 5EJ,CF5 5EL,CF5 5EN,CF5 5EP,CF5 5EQ,CF5 5ER,CF5 5ES,CF5 5ET,CF5 5EU,CF5 5EW,CF5 5EX,CF5 5EY,CF5 5EZ,CF5 5HA,CF5 5HB,CF5 5HD,CF5 5HE,CF5 5HF,CF5 5HG,CF5 5HH,CF5 5HJ,CF5 5HL,CF5 5HN,CF5 5HP,CF5 5HQ,CF5 5HR,CF5 5HS,CF5 5HT,CF5 5HU,CF5 5HW,CF5 5HX,CF5 5HY,CF5 5HZ,CF5 5JA,CF5 5JB,CF5 5JD,CF5 5JE,CF5 5JF,CF5 5JG,CF5 5JH,CF5 5JJ,CF5 5JL,CF5 5JN,CF5 5JP,CF5 5JQ,CF5 5JR,CF5 5JS,CF5 5JT,CF5 5JU,CF5 5JW,CF5 5JX,CF5 5JY,CF5 5LA,CF5 5LB,CF5 5LD,CF5 5LE,CF5 5LF,CF5 5LG,CF5 5LH,CF5 5LJ,CF5 5LL,CF5 5LN,CF5 5LP,CF5 5LQ,CF5 5LR,CF5 5LS,CF5 5LT,CF5 5LU,CF5 5LW,CF5 5LX,CF5 5LY,CF5 5LZ,CF5 5NA,CF5 5NB,CF5 5ND,CF5 5NE,CF5 5NF,CF5 5NG,CF5 5NH,CF5 5NJ,CF5 5NL,CF5 5NN,CF5 5NR,CF5 5NS,CF5 5NT,CF5 5NU,CF5 5NW,CF5 5NX,CF5 5NY,CF5 5NZ,CF5 5PA,CF5 5PB,CF5 5PD,CF5 5PE,CF5 5PF,CF5 5PG,CF5 5PH,CF5 5PJ,CF5 5PL,CF5 5PN,CF5 5PP,CF5 5PQ,CF5 5PR,CF5 5PS,CF5 5PT,CF5 5PU,CF5 5PZ,CF5 5QA,CF5 5QB,CF5 5QD,CF5 5QE,CF5 5QF,CF5 5QG,CF5 5QH,CF5 5QJ,CF5 5QL,CF5 5QN,CF5 5QP,CF5 5QQ,CF5 5QR,CF5 5QS,CF5 5QT,CF5 5QU,CF5 5QW,CF5 5QX,CF5 5QZ,CF5 5RA,CF5 5RB,CF5 5RD,CF5 5SE,CF5 5TA,CF5 5TB,CF5 5TD,CF5 5TE,CF5 5WF,CF5 5WS,CF5 5XA,CF5 5XE,CF5 5XP,CF5 5YD,CF5 5YZ,CF5 6AA,CF5 6AB,CF5 6AD,CF5 6AE,CF5 6AF,CF5 6AG,CF5 6AH,CF5 6AJ,CF5 6AL,CF5 6AN,CF5 6AQ,CF5 6AS,CF5 6AT,CF5 6AU,CF5 6BB,CF5 6BD,CF5 6BE,CF5 6BX,CF5 6BZ,CF5 6DA,CF5 6DF,CF5 6DJ,CF5 6WJ,CF5 6WN,CF5 6WT,CF5 6WW,CF5 6XE,CF5 6XS,CF5 6XT,CF5 6YP,CF5 6YU,CF5 9AB,CF5 9AE,CF5 9AJ,CF5 9AL,CF5 9AY,CF5 9BB,CF5 9BE,CF5 9BH,CF5 9BQ,CF5 9BR,CF5 9BT,CF5 9DA,CF5 9DD,CF5 9DN,CF5 9DQ,CF5 9DS,CF5 9DT,CF5 9DU,CF5 9DW,CF5 9DX,CF5 9DY,CF5 9DZ,CF5 9EB,CF5 9ED,CF5 9EE,CF5 9EF,CF5 9EG,CF5 9EH,CF5 9EJ,CF5 9EL,CF5 9EN,CF5 9EP,CF5 9EQ,CF5 9ER,CF5 9ES,CF5 9ET ', 1, '0000-00-00 00:00:00', 0, '2016-12-26 08:27:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_menu`
--

CREATE TABLE IF NOT EXISTS `gkpos_menu` (
`id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `base_price` double NOT NULL,
  `in_price` float NOT NULL,
  `out_price` double NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=Active,2=Active,3=Deleted',
  `order` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `gkpos_menu`
--

INSERT INTO `gkpos_menu` (`id`, `category`, `title`, `content`, `base_price`, `in_price`, `out_price`, `status`, `order`, `modified`, `modified_by`, `created`, `created_by`, `image`) VALUES
(1, 1, 'VEGETABLE SAMOSAS (G)', 'Homemade pastry stuffed with pota- toes, green peas and fresh coriander deep fried', 12, 11, 12, 1, 1, '0000-00-00 00:00:00', '', '2016-12-07 11:11:30', '1', ''),
(2, 1, 'SPONGY ONION BHAJI2', 'Popular favourite fritters made with onion with fresh coriander, fennel seeds, six mixed spices deep fried', 2.7, 0, 0, 1, 2, '0000-00-00 00:00:00', '', '2016-12-05 11:51:04', '1', ''),
(3, 1, 'VEGETABLE CUTLET', 'Mixed root vegetable tampered with cumin and turmeric and crumbed with perfection ', 2.7, 0, 0, 1, 3, '0000-00-00 00:00:00', '', '2016-12-08 14:41:11', '1', ''),
(4, 1, 'PANEER ZAFRANI (D)', ' Indian cottage cheese flavored with saffron and yogurt, marinated and grilled to perfection in tandoori', 2.95, 0, 0, 1, 4, '0000-00-00 00:00:00', '', '2016-12-05 06:40:25', '1', ''),
(5, 1, 'MUSHROOM PAKORAS', 'Whole mushrooms with five mixed spices including black pepper, gram flour deep fried ', 3.1, 0, 0, 1, 5, '0000-00-00 00:00:00', '', '2016-12-05 06:41:06', '1', ''),
(6, 1, 'ALOO CHANA CHAT', 'Lightly spiced hot and sour taste served with chapatti puree', 2.7, 0, 0, 1, 6, '0000-00-00 00:00:00', '', '2016-12-05 06:42:01', '1', ''),
(7, 1, 'GARLIC MUSHROOM', 'Cooked with fresh garlic paste and coriander ', 3.1, 0, 0, 1, 7, '0000-00-00 00:00:00', '', '2016-12-05 06:42:37', '1', ''),
(8, 2, 'CHICKEN SAMOS', 'This is test content ', 2.95, 0, 0, 1, 8, '0000-00-00 00:00:00', '', '2016-12-05 11:03:41', '1', ''),
(9, 2, 'CHICKEN CHATT', 'Lightly spiced chicken tikka of hot and sour taste served with chapatti puree ', 2.95, 0, 0, 1, 9, '0000-00-00 00:00:00', '', '2016-12-05 11:03:46', '1', ''),
(10, 2, 'CHICKEN TIKKA WRAP (G)', 'Marinated chicken tikka wrapped in naan bread and green salad', 3.95, 0, 0, 1, 10, '0000-00-00 00:00:00', '', '2016-12-05 06:45:02', '1', ''),
(11, 2, 'MEAT SAMOSA (G)', 'Mince meat cooked with ground spice and parceled in thin crispy pastry', 2.95, 0, 0, 1, 11, '0000-00-00 00:00:00', '', '2016-12-05 06:45:36', '1', ''),
(12, 3, 'PRAWN PUREE (G)', 'Lightly spiced with fresh coriander and tomato served with chapatti puree bread', 3.5, 0, 0, 1, 12, '0000-00-00 00:00:00', '', '2016-12-05 06:46:34', '1', ''),
(13, 3, 'KING PRAWN PUREE (G)', 'Chefs special spices with fresh coriander and tomatoes served with chapatti puree ', 5.1, 0, 0, 1, 13, '0000-00-00 00:00:00', '', '2016-12-05 06:47:03', '1', ''),
(14, 3, 'FISHCAKE', 'Deep fried Welsh fresh mackerel with mashed potatoes, fresh herbs and fragrant spices combined into the cake', 3.5, 0, 0, 1, 14, '0000-00-00 00:00:00', '', '2016-12-05 06:47:35', '1', ''),
(15, 3, 'FISH TIKKA', 'Bangladeshi clean water tilapia fillet Homestyle spiced cooked in the clay oven', 3.9, 0, 0, 1, 15, '0000-00-00 00:00:00', '', '2016-12-05 06:48:13', '1', ''),
(16, 3, 'GARLIC KING PRAWN', 'King prawn cooked with fresh garlic paste lightly spiced', 5.1, 0, 0, 1, 16, '0000-00-00 00:00:00', '', '2016-12-05 06:48:59', '1', ''),
(17, 4, 'CRISPY TIGER PRAWNS', ' Deep fried salt and pepper marinated prawns and spices', 4.1, 0, 0, 1, 17, '0000-00-00 00:00:00', '', '2016-12-05 06:50:21', '1', ''),
(18, 4, 'GILAFI SHEIK KEBAB', ' Minced lamb with the whole spice including garlic, ginger paste, crushed with bell peppers skewered in hot tandoori ', 3.25, 0, 0, 1, 18, '0000-00-00 00:00:00', '', '2016-12-05 06:50:50', '1', ''),
(19, 4, 'CHICKEN TRIO (D)', 'Trio of chicken comprising three different including grilled tikka, chicken sheik kebab and chicken samosa cooked in the clay oven ', 3.25, 0, 0, 1, 19, '0000-00-00 00:00:00', '', '2016-12-05 06:51:34', '1', ''),
(20, 4, 'GRILLED TIKKA (D)', 'The chef’s specialty of skewered chicken or lamb consisting of juicy spices cooked on a slow flame in the tandoor', 3.25, 0, 0, 1, 20, '0000-00-00 00:00:00', '', '2016-12-05 06:52:04', '1', ''),
(21, 4, 'TANDOORI CHICKEN (D) ¼', 'On the bone marinated with garlic and ginger, deega mirchi with yogurt and tandoori spices cooked in the clay oven ', 3.25, 0, 0, 1, 21, '0000-00-00 00:00:00', '', '2016-12-05 06:52:35', '1', ''),
(22, 4, 'Adding to Cart EXOTIC SNACK BOX (D)', 'Pieces of tandoori chicken, lamb tikka, sheik kebab and onion bhaji', 5.95, 0, 0, 1, 22, '0000-00-00 00:00:00', '', '2016-12-05 06:53:08', '1', ''),
(23, 5, 'CHICKEN GRILLED TIKKA (D)', ' Mouthwatering Skewered chicken spiced lightly to southern Asian style with fresh lemon juices ', 7.5, 0, 0, 1, 23, '0000-00-00 00:00:00', '', '2016-12-05 06:53:58', '1', ''),
(24, 5, 'GARLIC CHICKEN, GRILLED TIKKA (D)', ' Mouthwatering Skewered chicken spiced lightly to southern Asian style with fresh lemon juices ', 7.95, 0, 0, 1, 24, '0000-00-00 00:00:00', '', '2016-12-05 07:00:16', '1', ''),
(25, 5, 'GRILLED LAMB TIKKA (D)', 'Welsh fresh lamb cooked to Delhi style medium spiced with deggi mirchi, squeeze of fresh lemon zest and yogurt', 7.95, 0, 0, 1, 25, '0000-00-00 00:00:00', '', '2016-12-05 06:55:18', '1', ''),
(26, 5, 'TANDOORI CHICKEN (D) HALF', 'Chef’s specialty on the bone cooked in the popular Bangladeshi street food style ', 6, 0, 0, 1, 26, '0000-00-00 00:00:00', '', '2016-12-05 06:55:52', '1', ''),
(27, 5, 'TANDOORI CHICKEN (D) FULL', 'Chef’s specialty on the bone cooked in the popular Bangladeshi street food style', 11, 0, 0, 1, 27, '0000-00-00 00:00:00', '', '2016-12-05 06:56:25', '1', ''),
(28, 5, 'TANDOORI KING PRAWNS (D)', 'King prawns marinated with special tandoori spices and herbs, including thyme and yogurt ', 10.9, 0, 0, 1, 28, '0000-00-00 00:00:00', '', '2016-12-05 06:57:01', '1', ''),
(29, 5, 'EXOTIC SHASHLICK (D)', 'Juicy pieces of skewered chicken and lamb marinated in spices, blended with mixed peppers and chunky onions and tomatoes ', 9.95, 0, 0, 1, 29, '0000-00-00 00:00:00', '', '2016-12-05 06:57:54', '1', ''),
(30, 5, 'NAWAB GRILLED PLATTER (D)', 'Best of king prawns, chicken, lamb and sheik kebab cooked in the tandoor ', 10.9, 0, 0, 1, 30, '0000-00-00 00:00:00', '', '2016-12-05 06:58:39', '1', ''),
(31, 5, 'CHICKEN SHASHLICK (D)', 'Off the bone succulent pieces of chicken tossed with chunky mixed peppers, fresh tomatoes, onions and special ground spices ', 9.5, 0, 0, 1, 31, '0000-00-00 00:00:00', '', '2016-12-05 06:59:12', '1', ''),
(32, 5, 'PANEER SHASHLICK (D)', 'Chunk pieces of Indian cottage cheese with onions, mixed peppers, tomatoes with tandoori spices and cooked at slow flame ', 8.5, 0, 0, 1, 32, '0000-00-00 00:00:00', '', '2016-12-05 06:59:36', '1', ''),
(33, 6, 'SINGAPORE FISH JHOL', 'Seabass fish- cooked with eggplant, okra, tamarind and spice finish with coconut milk ', 9.85, 0, 0, 1, 33, '0000-00-00 00:00:00', '', '2016-12-05 07:02:10', '1', ''),
(34, 6, 'BENGAL NAGAJHOL', 'Hottest dish on the menu, the Bengali Naga is known as one of the hottest chili in the world, cooked with shallots and garlic paste with-spices choice of chicken, lamb, prawns and fish ', 9.85, 0, 0, 1, 34, '0000-00-00 00:00:00', '', '2016-12-05 07:02:34', '1', ''),
(35, 6, 'DONESIA MEE GORENG (G)', 'Fried noodles a common dish in Indonesia made with thin noodles wok fried with garlic, onions specially prepared spice paste choice of chicken or prawns ', 9.85, 0, 0, 1, 35, '0000-00-00 00:00:00', '', '2016-12-05 07:02:58', '1', ''),
(36, 6, 'NEPAL GORKHA LAMB', 'The curry involves slow cooking, the lamb, adding chunky potatoes and roughly chopped onions, green chili pastes flavor and fiery heat', 9.1, 0, 0, 1, 36, '0000-00-00 00:00:00', '', '2016-12-05 07:03:37', '1', ''),
(37, 30, 'Test menu 111', 'description on test menu111', 10.5, 9.5, 8.5, 1, 37, '0000-00-00 00:00:00', '', '2016-12-07 11:11:46', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_order`
--

CREATE TABLE IF NOT EXISTS `gkpos_order` (
`id` int(10) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `table_number` varchar(10) DEFAULT NULL,
  `guest_quantity` varchar(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=initiate,2=ordered,3=completed,4=archieved',
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `floor_or_apt` varchar(50) DEFAULT NULL,
  `building` varchar(50) DEFAULT NULL,
  `house` varchar(50) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `paid_status` tinyint(1) DEFAULT NULL COMMENT '1=paid,2=not_paid',
  `payment_method` varchar(250) DEFAULT NULL,
  `is_delivered` tinyint(1) DEFAULT NULL COMMENT '1=yes,2=no',
  `delivery_time` varchar(250) DEFAULT NULL,
  `delivery_charge` double DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `promocode_price` double DEFAULT NULL,
  `promocode` varchar(100) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `invoice_status` tinyint(1) DEFAULT NULL COMMENT '1=created,2=not_created',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gkpos_order`
--

INSERT INTO `gkpos_order` (`id`, `order_type`, `table_id`, `table_number`, `guest_quantity`, `status`, `phone`, `name`, `floor_or_apt`, `building`, `house`, `street`, `postcode`, `paid_status`, `payment_method`, `is_delivered`, `delivery_time`, `delivery_charge`, `service_charge`, `vat`, `promocode_price`, `promocode`, `discount`, `order_total`, `grand_total`, `invoice_status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'table', 1, '1', '5', 3, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 5, 4.32, NULL, NULL, 6.79, 86.4, 88.93, NULL, '2016-12-29 13:41:42', 1, '0000-00-00 00:00:00', 0),
(2, 'delivery', NULL, NULL, NULL, 2, '01717103734', 'mr zaman', '3rd floor', 'Baba Monjil', '165/5', 'sonar para shibgonj', 'E1 5DE', NULL, NULL, NULL, '2016-12-29 19:50:20', 0, 0, 3.255, NULL, NULL, 6.51, 65.1, 61.845, NULL, '2016-12-29 13:53:31', 1, '0000-00-00 00:00:00', 0),
(3, 'table', 2, '2', '2', 2, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 4, 3.315, NULL, NULL, 5.3025, 66.3, 68.3125, NULL, '2016-12-29 14:01:23', 1, '0000-00-00 00:00:00', 0),
(4, 'table', 3, '3', '3', 1, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-29 14:03:26', 1, '0000-00-00 00:00:00', 0),
(5, 'collection', NULL, NULL, NULL, 1, '01717103734', 'developer', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-29 14:05:06', 1, '0000-00-00 00:00:00', 0),
(6, 'waiting', NULL, NULL, NULL, 1, '01717103732', 'Don', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-29 14:10:42', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_order_detail`
--

CREATE TABLE IF NOT EXISTS `gkpos_order_detail` (
`id` int(11) NOT NULL,
  `line` int(2) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `category_title` text,
  `category_print_option` tinyint(1) DEFAULT NULL,
  `category_type` tinyint(1) DEFAULT NULL,
  `menu` int(11) DEFAULT NULL,
  `menu_title` text,
  `selection` int(11) DEFAULT NULL,
  `selection_title` text,
  `quantity` int(5) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `first_taken` datetime DEFAULT NULL,
  `last_taken` datetime DEFAULT NULL,
  `plus` varchar(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gkpos_order_detail`
--

INSERT INTO `gkpos_order_detail` (`id`, `line`, `order_id`, `category`, `category_title`, `category_print_option`, `category_type`, `menu`, `menu_title`, `selection`, `selection_title`, `quantity`, `price`, `first_taken`, `last_taken`, `plus`) VALUES
(1, 1, 1, 1, 'Vagetarian Starters', 1, 1, 2, 'SPONGY ONION BHAJI2', NULL, NULL, 5, 2.7, '2016-12-29 14:43:02', NULL, NULL),
(2, 2, 1, 5, 'Exotic Tandoori Courses', 1, 2, 27, 'TANDOORI CHICKEN (D) FULL', NULL, NULL, 5, 11, '2016-12-29 14:43:02', NULL, 'yes'),
(3, 1, 1, 5, 'Exotic Tandoori Courses', 1, 2, 27, 'TANDOORI CHICKEN (D) FULL', NULL, NULL, 1, 11, NULL, '2016-12-29 14:44:50', NULL),
(4, 2, 1, 2, 'Non Vegetarian Starters', 1, 1, 9, 'CHICKEN CHATT', NULL, NULL, 1, 2.95, NULL, '2016-12-29 14:44:50', NULL),
(5, 3, 1, 2, 'Non Vegetarian Starters', 1, 1, 10, 'CHICKEN TIKKA WRAP (G)', NULL, NULL, 1, 3.95, NULL, '2016-12-29 14:44:50', 'yes'),
(6, 1, 3, 1, 'Vagetarian Starters', 1, 1, 7, 'GARLIC MUSHROOM', NULL, NULL, 1, 3.1, '2016-12-29 15:03:03', NULL, NULL),
(7, 2, 3, 2, 'Non Vegetarian Starters', 1, 1, 9, 'CHICKEN CHATT', NULL, NULL, 1, 2.95, '2016-12-29 15:03:03', NULL, NULL),
(8, 3, 3, 5, 'Exotic Tandoori Courses', 1, 2, 27, 'TANDOORI CHICKEN (D) FULL', NULL, NULL, 1, 11, '2016-12-29 15:03:03', NULL, NULL),
(9, 4, 3, 5, 'Exotic Tandoori Courses', 1, 2, 31, 'CHICKEN SHASHLICK (D)', NULL, NULL, 1, 9.5, '2016-12-29 15:03:03', NULL, 'yes'),
(10, 1, 2, 6, 'South Asian specialty curries', 1, 1, 34, 'BENGAL NAGAJHOL', NULL, NULL, 1, 9.85, '2016-12-29 15:04:19', NULL, NULL),
(11, 2, 2, 6, 'South Asian specialty curries', 1, 1, 35, 'DONESIA MEE GORENG (G)', NULL, NULL, 1, 9.85, '2016-12-29 15:04:19', NULL, NULL),
(12, 3, 2, 6, 'South Asian specialty curries', 1, 1, 36, 'NEPAL GORKHA LAMB', NULL, NULL, 1, 9.1, '2016-12-29 15:04:19', NULL, NULL),
(13, 4, 2, 5, 'Exotic Tandoori Courses', 1, 2, 24, 'GARLIC CHICKEN, GRILLED TIKKA (D)', NULL, NULL, 1, 7.95, '2016-12-29 15:04:19', NULL, NULL),
(14, 5, 2, 5, 'Exotic Tandoori Courses', 1, 2, 25, 'GRILLED LAMB TIKKA (D)', NULL, NULL, 1, 7.95, '2016-12-29 15:04:19', NULL, NULL),
(15, 6, 2, 5, 'Exotic Tandoori Courses', 1, 2, 28, 'TANDOORI KING PRAWNS (D)', NULL, NULL, 1, 10.9, '2016-12-29 15:04:19', NULL, NULL),
(16, 7, 2, 5, 'Exotic Tandoori Courses', 1, 2, 31, 'CHICKEN SHASHLICK (D)', NULL, NULL, 1, 9.5, '2016-12-29 15:04:19', NULL, 'yes'),
(17, 1, 3, 5, 'Exotic Tandoori Courses', 1, 2, 24, 'GARLIC CHICKEN, GRILLED TIKKA (D)', NULL, NULL, 5, 7.95, NULL, '2016-12-29 16:28:57', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_selection`
--

CREATE TABLE IF NOT EXISTS `gkpos_selection` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `base_price` double NOT NULL,
  `in_price` double NOT NULL,
  `out_price` double NOT NULL,
  `category` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=Active,2=Inactive,3=Deleted',
  `order` int(11) NOT NULL,
  `content` text NOT NULL,
  `slug` text NOT NULL,
  `image` text NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gkpos_selection`
--

INSERT INTO `gkpos_selection` (`id`, `title`, `base_price`, `in_price`, `out_price`, `category`, `menu`, `status`, `order`, `content`, `slug`, `image`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(1, 'Hotlavel1', 101, 34, 12, 1, 1, 1, 1, 'description on hot lavel one', 'hot', '', '0000-00-00 00:00:00', '', '2016-12-12 09:29:25', '1'),
(2, 'Cold', 0, 11, 10, 1, 1, 1, 2, 'description on hot selection', 'cold', '', '0000-00-00 00:00:00', '', '2016-12-05 14:19:32', '1'),
(3, 'Cold2', 0, 11, 10, 1, 1, 1, 3, 'description on hot selection', 'cold2', '', '0000-00-00 00:00:00', '', '2016-12-05 14:26:18', '1'),
(4, 'hot ', 10, 10, 10, 30, 37, 3, 4, 'Hot description', '', '', '0000-00-00 00:00:00', '', '2016-12-06 11:02:48', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_table`
--

CREATE TABLE IF NOT EXISTS `gkpos_table` (
`id` int(11) NOT NULL,
  `table_number` varchar(11) NOT NULL,
  `guest_quantity` int(11) NOT NULL,
  `is_vacant` tinyint(1) NOT NULL COMMENT '1=yes,2=no',
  `status` int(1) NOT NULL COMMENT '1=active,2=inactive',
  `order` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gkpos_table`
--

INSERT INTO `gkpos_table` (`id`, `table_number`, `guest_quantity`, `is_vacant`, `status`, `order`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(1, '1', 5, 2, 1, 0, '0000-00-00 00:00:00', 0, '2016-12-29 13:41:42', 1),
(2, '2', 2, 2, 1, 0, '0000-00-00 00:00:00', 0, '2016-12-29 14:01:23', 1),
(3, '3', 3, 2, 1, 0, '0000-00-00 00:00:00', 0, '2016-12-29 14:03:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_user`
--

CREATE TABLE IF NOT EXISTS `gkpos_user` (
`id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1=Male,2=Female',
  `image` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=in active,1=active,2=suspend,3=unverfied',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Deleted,1=Undeleted',
  `type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1=super admin,2=admin,3=user',
  `phone` varchar(16) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country` text NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gkpos_user`
--

INSERT INTO `gkpos_user` (`id`, `first_name`, `last_name`, `gender`, `image`, `email`, `username`, `password`, `status`, `deleted`, `type`, `phone`, `mobile`, `address`, `city`, `state`, `postcode`, `country`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(1, 'Mr ', 'Zaman', 1, '', 'aktar.bd84@gmail.com', 'justin.freeman', '25f9e794323b453885f5181f1b624d0b', 1, 0, 1, '01717103734', '01717103734', '75,prythibridge road ', 'Cardiff', 'Wales ', 'CF5 4DR ', 'The United Kingdom', '0000-00-00 00:00:00', '', '2016-11-23 09:58:51', 1),
(2, 'Mrs', 'zaman', 2, '', 'aktarcse152@gmail.com', 'Mrs zaman', 'fd923f38b58af8c5690b1fde00f8a0e5', 1, 0, 2, '01717103734', '01717103734', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-11-23 07:13:58', 1),
(3, 'Just', 'Free', 1, '', 'justin.freeman152@gmail.com', 'justin.freeman1522', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '01717103734', '01717103734', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:25', 1),
(4, 'Brain ', 'Elvis', 2, '', 'brain.elvis152@gmail.com', 'brain.elvis152', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:29', 1),
(5, 'mr ', 'tester', 1, '', 'aktar.bd845@gmail.com', 'aktar.bd845', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '01717103734', '01717103734', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:32', 1),
(6, 'mrs', 'tester ', 2, '', 'brain.elvis1522@gmail.com', 'brain.elvis1523', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:36', 1),
(7, 'Mr ', 'Bil', 1, '', 'bill@gmail.com', 'bill', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:39', 1),
(8, 'mrs ', 'Bill', 2, '', 'mrsbill@gmail.com', 'mrs bill ', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:44', 1),
(9, 'mr', 'Don', 1, '', 'don@gmail.com', 'don', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:55', 1),
(10, 'mrs', 'don', 2, '', 'mrsdon@gmail.com', 'mrs don', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 3, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '2016-12-04 12:47:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gkpos_voucher`
--

CREATE TABLE IF NOT EXISTS `gkpos_voucher` (
`id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `function` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=active,2=delete',
  `modified` datetime NOT NULL,
  `modified_by` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gkpos_voucher`
--

INSERT INTO `gkpos_voucher` (`id`, `title`, `code`, `amount`, `function`, `status`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(3, 'Chirsmas offer ', 'CH2016', 10, 'fixed', 1, '0000-00-00 00:00:00', 0, '2016-12-26 06:19:44', 1),
(5, 'Victory Day Offer', 'VH2016', 20, 'percent', 1, '0000-00-00 00:00:00', 0, '2016-12-26 06:23:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_attribute`
--

CREATE TABLE IF NOT EXISTS `order_attribute` (
`OrderAttrId` int(11) NOT NULL,
  `OrderDetailId` int(11) NOT NULL,
  `OrderCat` int(11) DEFAULT NULL,
  `OrderBase` int(11) DEFAULT NULL,
  `OrderSelection` int(11) DEFAULT NULL,
  `OrderAttrName` varchar(250) DEFAULT NULL,
  `AttrQty` int(11) NOT NULL,
  `OrderAttrUnitPrice` double NOT NULL,
  `special` enum('0','1','2') DEFAULT NULL,
  `CartAttrGenID` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_attribute_basket`
--

CREATE TABLE IF NOT EXISTS `order_attribute_basket` (
`OrderAttrId` int(11) NOT NULL,
  `OrderDetailId` int(11) NOT NULL,
  `OrderCat` int(11) DEFAULT NULL,
  `OrderBase` int(11) DEFAULT NULL,
  `OrderSelection` int(11) DEFAULT NULL,
  `OrderAttrName` varchar(250) DEFAULT NULL,
  `AttrQty` int(11) NOT NULL,
  `OrderAttrUnitPrice` double NOT NULL,
  `special` enum('0','1','2') DEFAULT NULL,
  `CartAttrGenID` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`OrderItermId` int(10) NOT NULL,
  `OrderId` int(10) NOT NULL DEFAULT '0',
  `ResId` int(11) NOT NULL,
  `CatId` int(11) DEFAULT NULL,
  `CatName` varchar(200) DEFAULT NULL,
  `BaseId` int(11) DEFAULT NULL,
  `BaseName` varchar(250) DEFAULT NULL,
  `BaseQty` int(11) NOT NULL,
  `BaseUnitPrice` double NOT NULL,
  `SelectionId` int(11) DEFAULT NULL,
  `SelectionName` varchar(250) DEFAULT NULL,
  `SelectionQty` int(11) NOT NULL,
  `SelectionUnitPrice` double DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `total_qty` int(11) NOT NULL,
  `Special` int(11) DEFAULT '0',
  `BaseMainPrice` double DEFAULT '0',
  `SelectionMainPrice` double DEFAULT '0',
  `item_comments` varchar(500) DEFAULT NULL,
  `CartGenID` varchar(200) DEFAULT NULL,
  `CartSelGenID` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`OrderItermId`, `OrderId`, `ResId`, `CatId`, `CatName`, `BaseId`, `BaseName`, `BaseQty`, `BaseUnitPrice`, `SelectionId`, `SelectionName`, `SelectionQty`, `SelectionUnitPrice`, `item_name`, `total_qty`, `Special`, `BaseMainPrice`, `SelectionMainPrice`, `item_comments`, `CartGenID`, `CartSelGenID`) VALUES
(1, 1, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 2, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(2, 1, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 2, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(3, 1, 29, 2317, 'Exotic Tandoori Courses', 3811, 'CHICKEN GRILLED TIKKA (D)', 1, 7.5, NULL, '', 0, 0, '', 1, 0, 7.5, 0, '', '2317|3811|7.5*7.5', ''),
(4, 1, 29, 2317, 'Exotic Tandoori Courses', 3815, 'TANDOORI CHICKEN (D) (FULL)', 1, 11, NULL, '', 0, 0, '', 2, 0, 11, 0, '', '2317|3815|11*11', ''),
(5, 2, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(6, 2, 29, 2315, 'STARTERS', 3803, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3803|2.7*2.7', ''),
(7, 2, 29, 2323, 'South Asia wok Biryani dishes', 3853, 'MUSHROOMS', 1, 7.5, NULL, '', 0, 0, '', 1, 0, 7.5, 0, '', '2323|3853|7.5*7.5', ''),
(8, 3, 29, 2315, 'STARTERS', 3801, 'PANEER ZAFRANI (D) ', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3801|2.95*2.95', ''),
(9, 4, 29, 2315, 'STARTERS', 3803, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3803|2.7*2.7', ''),
(10, 4, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(11, 4, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(12, 5, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(13, 5, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(14, 6, 29, 2323, 'South Asia wok Biryani dishes', 3854, 'HOUSE SPECIAL BIRYANI ', 1, 10.5, NULL, '', 0, 0, '', 1, 0, 10.5, 0, '', '2323|3854|10.5*10.5', ''),
(15, 6, 29, 2325, 'Accompaniments', 3862, 'KEEMA RICE', 1, 3, NULL, '', 0, 0, '', 1, 0, 3, 0, '', '2325|3862|3*3', ''),
(16, 6, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(17, 6, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 4, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(18, 7, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(19, 8, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(20, 8, 29, 2315, 'STARTERS', 3800, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3800|2.7*2.7', ''),
(21, 9, 29, 2325, 'Accompaniments', 3857, 'SPICY CHIPS', 1, 2.3, NULL, '', 0, 0, '', 1, 0, 2.3, 0, '', '2325|3857|2.3*2.3', ''),
(22, 9, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(23, 10, 29, 2315, 'STARTERS', 3803, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3803|2.7*2.7', ''),
(24, 10, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(25, 11, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 2, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(26, 12, 29, 2315, 'STARTERS', 3803, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3803|2.7*2.7', ''),
(27, 12, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 2, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(28, 13, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(29, 14, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(30, 15, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(31, 16, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(32, 17, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 2, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(33, 17, 30, 2329, 'Vegetarian Starters ', 3876, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3876|2.7*2.7', ''),
(34, 18, 30, 2329, 'Vegetarian Starters ', 3872, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, 'extra hot', '2329|3872|2.7*2.7', ''),
(35, 18, 30, 2336, ' Classic Indian mild dishes ', 4158, 'KORMA DISHES (D)', 0, 0, NULL, 'PRAWNS', 1, 8.5, '', 1, 0, 0, 8.5, '', '1/1/2336|4158|861|8.5*8.5', ''),
(36, 18, 30, 2336, ' Classic Indian mild dishes ', 4158, 'KORMA DISHES (D)', 0, 0, NULL, 'CHICKEN TIKKA (D)', 1, 8.5, '', 1, 0, 0, 8.5, '', '1/2336|4158|859|8.5*8.5', ''),
(37, 18, 30, 2336, ' Classic Indian mild dishes ', 4158, 'KORMA DISHES (D)', 0, 0, NULL, 'LAMB', 1, 7.5, '', 1, 0, 0, 7.5, '', '2336|4158|858|7.5*7.5', ''),
(38, 18, 30, 2336, ' Classic Indian mild dishes ', 4159, 'BHUNA DISHES', 0, 0, NULL, 'PRAWNS', 1, 8.5, '', 1, 0, 0, 8.5, '', '2336|4159|867|8.5*8.5', ''),
(39, 19, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 2, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(40, 19, 30, 2329, 'Vegetarian Starters ', 3874, 'PANEER ZAFRANI (D)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3874|2.95*2.95', ''),
(41, 20, 30, 2329, 'Vegetarian Starters ', 3873, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3873|2.7*2.7', ''),
(42, 20, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(43, 21, 30, 2334, ' South Asian specialty curries ', 3907, 'KERALA CHICKEN CURRY (D)', 1, 9.5, NULL, '', 0, 0, '', 15, 0, 9.5, 0, '', '2334|3907|9.5*9.5', ''),
(44, 21, 30, 2329, 'Vegetarian Starters ', 3873, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 12, 0, 2.7, 0, '', '2329|3873|2.7*2.7', ''),
(45, 21, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(46, 21, 30, 2343, 'Vegetarian Side Dishes', 3976, 'BABY ALOO JEERA (D)', 1, 3.5, NULL, '', 0, 0, '', 2, 0, 3.5, 0, '', '2343|3976|3.5*3.5', ''),
(47, 22, 30, 2334, ' South Asian specialty curries ', 3910, 'MANGO CURRY (D)', 1, 10.1, NULL, '', 0, 0, '', 10, 0, 10.1, 0, '', '2334|3910|10.1*10.1', ''),
(48, 22, 30, 2334, ' South Asian specialty curries ', 3907, 'KERALA CHICKEN CURRY (D)', 1, 9.5, NULL, '', 0, 0, '', 2, 0, 9.5, 0, 'spicy', '2334|3907|9.5*9.5', ''),
(49, 22, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 10, 0, 2.95, 0, 'crunchy', '2329|3871|2.95*2.95', ''),
(50, 23, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(51, 23, 30, 2329, 'Vegetarian Starters ', 3875, ' MUSHROOM PAKORAS', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3875|3.1*3.1', ''),
(52, 24, 30, 2329, 'Vegetarian Starters ', 3877, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3877|3.1*3.1', ''),
(53, 24, 30, 2329, 'Vegetarian Starters ', 3873, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3873|2.7*2.7', ''),
(54, 24, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(55, 24, 30, 2336, ' Classic Indian mild dishes ', 4160, 'DUPIAZA DISHES', 0, 0, NULL, 'CHICKEN', 1, 7.5, '', 2, 0, 0, 7.5, '', '2336|4160|851|7.5*7.5', ''),
(56, 25, 30, 2342, ' Drinks ', 3869, 'CANS 330ML', 0, 0, NULL, 'Coke', 1, 0.8, '', 1, 0, 0, 0.8, '', '2342|3869|902|0.8*0.8', ''),
(57, 25, 30, 2342, ' Drinks ', 3870, 'BOTTLE’S 1.5LTR ', 0, 0, NULL, 'Diet coke', 1, 2.2, '', 1, 0, 0, 2.2, '', '2342|3870|908|2.2*2.2', ''),
(58, 25, 30, 2329, 'Vegetarian Starters ', 3873, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3873|2.7*2.7', ''),
(59, 25, 30, 2339, 'Vegetarian Main Dishes', 3949, 'SAAG PANEER (D)  ', 1, 6.5, NULL, '', 0, 0, '', 3, 0, 6.5, 0, '', '2339|3949|6.5*6.5', ''),
(60, 25, 30, 2333, ' Exotic Tandoori Courses ', 3896, 'TANDOORI CHICKEN (D)  HALF', 1, 6, NULL, '', 0, 0, '', 3, 0, 6, 0, '', '2333|3896|6*6', ''),
(61, 25, 30, 2341, ' Accompaniments ', 3979, 'GARLIC NAAN (G)', 1, 2.5, NULL, '', 0, 0, '', 10, 0, 2.5, 0, '', '2341|3979|2.5*2.5', ''),
(62, 25, 30, 2341, ' Accompaniments ', 3991, ' LACHHA PARATHA (G)', 1, 2.5, NULL, '', 0, 0, '', 1, 0, 2.5, 0, '', '2341|3991|2.5*2.5', ''),
(63, 26, 30, 2339, 'Vegetarian Main Dishes', 3951, 'BABY ALOO JEERA (D)', 1, 6.5, NULL, '', 0, 0, '', 1, 0, 6.5, 0, '', '2339|3951|6.5*6.5', ''),
(64, 26, 30, 2335, 'Chef’s own specialty Dishes ', 3916, 'MURGH JALFREZI (D)', 1, 8.56, NULL, '', 0, 0, '', 1, 0, 8.56, 0, '', '2335|3916|8.56*8.56', ''),
(65, 26, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(66, 27, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(67, 27, 30, 2329, 'Vegetarian Starters ', 3872, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3872|2.7*2.7', ''),
(68, 28, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(69, 29, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(70, 29, 30, 2333, ' Exotic Tandoori Courses ', 3899, 'EXOTIC SHASHLICK (D)', 1, 9.95, NULL, '', 0, 0, '', 1, 0, 9.95, 0, '', '2333|3899|9.95*9.95', ''),
(71, 30, 30, 2329, 'Vegetarian Starters ', 3872, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 4, 0, 2.7, 0, '', '2329|3872|2.7*2.7', ''),
(72, 31, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(73, 31, 29, 2315, 'STARTERS', 3801, 'PANEER ZAFRANI (D) ', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3801|2.95*2.95', ''),
(74, 31, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(75, 31, 29, 2324, 'Vegetarian Dishes', 3855, 'MUSHROOM KERALA CURRY (D)', 1, 6.5, NULL, '', 0, 0, '', 2, 0, 6.5, 0, '', '2324|3855|6.5*6.5', ''),
(76, 31, 29, 2325, 'Accompaniments', 3860, 'PILAU RICE', 1, 2.5, NULL, '', 0, 0, '', 12, 0, 2.5, 0, '', '2325|3860|2.5*2.5', ''),
(77, 32, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(78, 32, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(79, 33, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 3, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(80, 33, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(81, 34, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(82, 34, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(83, 34, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(84, 35, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(85, 35, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(86, 35, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(87, 36, 29, 2315, 'STARTERS', 3802, 'MUSHROOM PAKORAS ', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3802|3.1*3.1', ''),
(88, 36, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(89, 36, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(90, 37, 29, 2325, 'Accompaniments', 3861, 'COCONUT RICE', 1, 3, NULL, '', 0, 0, '', 2, 0, 3, 0, '', '2325|3861|3*3', ''),
(91, 37, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(92, 37, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(93, 37, 29, 2325, 'Accompaniments', 3864, 'EGG RICE', 1, 3, NULL, '', 0, 0, '', 2, 0, 3, 0, '', '2325|3864|3*3', ''),
(94, 37, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(95, 38, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(96, 38, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(97, 39, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(98, 39, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(99, 40, 30, 2329, 'Vegetarian Starters ', 3876, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3876|2.7*2.7', ''),
(100, 40, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(101, 41, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(102, 41, 30, 2329, 'Vegetarian Starters ', 3875, ' MUSHROOM PAKORAS', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3875|3.1*3.1', ''),
(103, 41, 30, 2329, 'Vegetarian Starters ', 3876, 'ALOO CHANA CHAT', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3876|2.7*2.7', ''),
(104, 42, 30, 2329, 'Vegetarian Starters ', 3877, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3877|3.1*3.1', ''),
(105, 42, 30, 2337, ' South Asia wok Biryani dishes ', 3926, 'MIXED VEGETABLES BIRYANI', 1, 7.5, NULL, '', 0, 0, '', 1, 0, 7.5, 0, '', '2337|3926|7.5*7.5', ''),
(106, 42, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_busket`
--

CREATE TABLE IF NOT EXISTS `order_detail_busket` (
`OrderItermId` int(10) NOT NULL,
  `OrderId` int(10) NOT NULL DEFAULT '0',
  `ResId` int(11) NOT NULL,
  `CatId` int(11) DEFAULT NULL,
  `CatName` varchar(200) DEFAULT NULL,
  `BaseId` int(11) DEFAULT NULL,
  `BaseName` varchar(250) DEFAULT NULL,
  `BaseQty` int(11) NOT NULL,
  `BaseUnitPrice` double NOT NULL,
  `SelectionId` int(11) DEFAULT NULL,
  `SelectionName` varchar(250) DEFAULT NULL,
  `SelectionQty` int(11) NOT NULL,
  `SelectionUnitPrice` double DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `total_qty` int(11) NOT NULL,
  `Special` int(11) DEFAULT '0',
  `BaseMainPrice` double DEFAULT '0',
  `SelectionMainPrice` double DEFAULT '0',
  `item_comments` varchar(500) DEFAULT NULL,
  `CartGenID` varchar(200) DEFAULT NULL,
  `CartSelGenID` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `order_detail_busket`
--

INSERT INTO `order_detail_busket` (`OrderItermId`, `OrderId`, `ResId`, `CatId`, `CatName`, `BaseId`, `BaseName`, `BaseQty`, `BaseUnitPrice`, `SelectionId`, `SelectionName`, `SelectionQty`, `SelectionUnitPrice`, `item_name`, `total_qty`, `Special`, `BaseMainPrice`, `SelectionMainPrice`, `item_comments`, `CartGenID`, `CartSelGenID`) VALUES
(130, 35, 30, 2334, ' South Asian specialty curries ', 3910, 'MANGO CURRY (D)', 1, 10.1, NULL, '', 0, 0, '', 10, 0, 10.1, 0, '', '2334|3910|10.1*10.1', ''),
(129, 35, 30, 2334, ' South Asian specialty curries ', 3907, 'KERALA CHICKEN CURRY (D)', 1, 9.5, NULL, '', 0, 0, '', 2, 0, 9.5, 0, 'spicy', '2334|3907|9.5*9.5', ''),
(128, 35, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 10, 0, 2.95, 0, 'crunchy', '2329|3871|2.95*2.95', ''),
(135, 37, 30, 2329, 'Vegetarian Starters ', 3877, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3877|3.1*3.1', ''),
(195, 52, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(193, 51, 30, 2339, 'Vegetarian Main Dishes', 3955, 'BHINDI BHAJI', 1, 6.5, NULL, '', 0, 0, '', 1, 0, 6.5, 0, '', '2339|3955|6.5*6.5', ''),
(194, 52, 30, 2333, ' Exotic Tandoori Courses ', 3899, 'EXOTIC SHASHLICK (D)', 1, 9.95, NULL, '', 0, 0, '', 1, 0, 9.95, 0, '', '2333|3899|9.95*9.95', ''),
(192, 51, 30, 2339, 'Vegetarian Main Dishes', 3951, 'BABY ALOO JEERA (D)', 1, 6.5, NULL, '', 0, 0, '', 1, 0, 6.5, 0, '', '2339|3951|6.5*6.5', ''),
(191, 51, 30, 2329, 'Vegetarian Starters ', 3872, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3872|2.7*2.7', ''),
(134, 37, 30, 2329, 'Vegetarian Starters ', 3873, 'VEGETABLE CUTLET', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2329|3873|2.7*2.7', ''),
(133, 37, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(196, 53, 30, 2329, 'Vegetarian Starters ', 3872, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 4, 0, 2.7, 0, '', '2329|3872|2.7*2.7', ''),
(136, 37, 30, 2336, ' Classic Indian mild dishes ', 4160, 'DUPIAZA DISHES', 0, 0, NULL, 'CHICKEN', 1, 7.5, '', 2, 0, 0, 7.5, '', '2336|4160|851|7.5*7.5', ''),
(190, 51, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(151, 42, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', ''),
(230, 65, 30, 2329, 'Vegetarian Starters ', 3877, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2329|3877|3.1*3.1', ''),
(231, 65, 30, 2337, ' South Asia wok Biryani dishes ', 3926, 'MIXED VEGETABLES BIRYANI', 1, 7.5, NULL, '', 0, 0, '', 1, 0, 7.5, 0, '', '2337|3926|7.5*7.5', ''),
(217, 60, 29, 2325, 'Accompaniments', 3861, 'COCONUT RICE', 1, 3, NULL, '', 0, 0, '', 2, 0, 3, 0, '', '2325|3861|3*3', ''),
(215, 60, 29, 2315, 'STARTERS', 3797, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2315|3797|2.95*2.95', ''),
(216, 60, 29, 2315, 'STARTERS', 3804, 'GARLIC MUSHROOM', 1, 3.1, NULL, '', 0, 0, '', 1, 0, 3.1, 0, '', '2315|3804|3.1*3.1', ''),
(218, 60, 29, 2325, 'Accompaniments', 3864, 'EGG RICE', 1, 3, NULL, '', 0, 0, '', 2, 0, 3, 0, '', '2325|3864|3*3', ''),
(219, 60, 29, 2315, 'STARTERS', 3799, 'SPONGY ONION BHAJI', 1, 2.7, NULL, '', 0, 0, '', 1, 0, 2.7, 0, '', '2315|3799|2.7*2.7', ''),
(229, 65, 30, 2329, 'Vegetarian Starters ', 3871, 'VEGETABLE SAMOSAS (G)', 1, 2.95, NULL, '', 0, 0, '', 1, 0, 2.95, 0, '', '2329|3871|2.95*2.95', '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `meta_keys` text NOT NULL,
  `meta_desc` text NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=NO',
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `slug`, `content`, `image`, `meta_keys`, `meta_desc`, `is_published`, `is_featured`, `is_deleted`, `modified_at`, `modified_by`, `created_at`, `created_by`) VALUES
(1, 'Help', 'help', '<p>help page content goes here</p>', '', 'Online order, Indian Takeaway, South Indian Cuisine,Bridgend', '<p>Online Order at Exotic Shaad. Exotic Shaad at 72 Nolton Street. Exotic Shaad 10% Discount on Online Order</p>', 1, 1, 0, '2016-11-14 13:05:58', '1', '2016-11-14 08:28:49', '1'),
(2, 'Terms And Conditions', 'terms-and-conditions', '<p><!-- [if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-GB</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:DontVertAlignCellWithSp/>\r\n   <w:DontBreakConstrainedForcedTables/>\r\n   <w:DontVertAlignInTxbx/>\r\n   <w:Word11KerningPairs/>\r\n   <w:CachedColBalance/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="--"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--></p>\r\n<p><!-- [if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!-- [if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--><!-- [if gte mso 9]><xml>\r\n <o:shapedefaults v:ext="edit" spidmax="1026"/>\r\n</xml><![endif]--><!-- [if gte mso 9]><xml>\r\n <o:shapelayout v:ext="edit">\r\n  <o:idmap v:ext="edit" data="1"/>\r\n </o:shapelayout></xml><![endif]--></p>\r\n<p class="MsoNormal"><strong><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi; color: black; background: #FEFEF7;">Acceptance of Conditions:</span></strong><span class="apple-converted-space"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black; background: #FEFEF7;">&nbsp;</span></span><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black; background: #FEFEF7;">Ordering with us constitutes your acceptance of these terms and conditions which take effect at the time you first access the site or phone us. If you do not accept these terms and conditions you must not place an order via the internet or over the phone. You can only access our full menu and order from us from this website and therefore all orders are subject to these conditions.<span class="apple-converted-space">&nbsp;</span></span><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(2)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Cancellation:</span></strong><span class="apple-converted-space">&nbsp;</span>Once your order has been placed, we set about cooking straight away. That means should you wish to cancel your order, please call within 5 minutes of placing the original order to receive a full refund. Please call us (rather than email) when requesting a cancellation. As per the Distance Selling Regulation (Regulation 13) your order is perishable and a cooling off period for cancellation unfortunately does not apply.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(3)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Allergies: </span></strong>We cannot guarantee that any of our foods are free from nuts or nut derivatives. We cannot guarantee that our food will be free from any other ingredients that may causes allergies or allergic reactions. We cook all dishes from scratch therefore a large number of ingredients are present in our kitchen.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(4)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Delivery Times:</span></strong><span class="apple-converted-space">&nbsp;</span>We aim to deliver your order to the address provided in 45-60 minutes (as with all restaurants during busy times, it can take a while longer). For the fastest delivery times please try to order before 6:30, after 8:30, or place an advanced order. In some circumstances we will be able to notify you prior to ordering if we predict that we will be unable to deliver within the normal times, however on occasions it can be difficult to predict. If circumstances out of our direct control cause the delivery to be delayed we will do our very best to keep you updated.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(5)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Minimum Order &amp; Free Delivery: </span></strong>We have an &pound;10 minimum order. Free delivery depends on your postcode and is generally between &pound;12-17. Call us for a quote. Any delivery charge will ALWAYS be agreed with you before we dispatch your order and will be between 50p-&pound;3 (whether you order online or over the phone).<span class="apple-converted-space">&nbsp;</span></span><br /> <span style="background: #FEFEF7;">(6)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Address details: </span></strong>You agree to provide a valid POSTCODE, full address and contact telephone number with your order. If you provide incorrect details we will be unable to deliver within any previously stipulated timescales provided by us. You agree not to withhold payment in circumstances where you were unable to provide a correct address or contact details.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(7)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Order Confirmation:</span></strong><span class="apple-converted-space">&nbsp;</span>We reserve the right to cancel your order if we are unable to establish contact with you by phone or email after you have placed an order. This is to protect ourselves against fraudulent and hoax orders. In some circumstance (for example exceptionally large orders) we may insist on a deposit to be paid in advance before confirming your order. If you order online or over the phone, the total price will be confirmed to you before the order is completed.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(8)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Catchment Area &amp; Delivery Times:</span></strong><span class="apple-converted-space">&nbsp;</span>If you are from outside our stated catchment area then in most cases we will be unable to deliver to you within the normal 45 minutes. If in doubt please call us to place your order and we will be able to give you an estimated delivery time.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(9)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Website Photos/Pictures:</span></strong> Food photographs on this site do not represent how your dishes will be delivering to you. In some cases there will be differences between the photos displayed and the ingredients in the dishes delivered to you. Where ingredients are not available or are out of stock our chefs will decide on suitable replacements to be used (for example red pepper substituted for green pepper). If you are unsure of the ingredients/content/packaging of any dish then please call and discuss this with our staff before ordering. All photographs are serving suggestion or simply represent generic raw ingredients.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(10)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Food Description &amp; Ingredience:</span></strong><span class="apple-converted-space">&nbsp;</span>All dish descriptions on the website represent and describe the item in question. Where ingredients are not available or are out of stock our chefs will decide on suitable replacements to be used (for example red pepper substituted for green pepper). "Home-made" means created and cooked entirely from scratch by us. "Fresh" means not frozen or tinned. "(v)" Indicates a dish without meat or fish. If food colouring is used, we use it in line with "Food Additives (England) Regulations 2009".<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(11)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Portion Sizes:</span></strong><span class="apple-converted-space">&nbsp;</span>We generally use standard 500ml takeaway containers for all dishes. We reserve the right to use other packaging; however portion sizes will be equivalent. Please note some dishes may settle during delivery.<span class="apple-converted-space">&nbsp;</span></span><br /> <span style="background: #FEFEF7;">(11)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Contract:</span></strong><span class="apple-converted-space"><strong>&nbsp;</strong></span>You are entering into a contract with xxxxxxxxxxxxxxx for delivery of your order, not with Brand &amp; Deliver Ltd.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(12)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Liability</span></strong></span></span><strong><span lang="EN-US" style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi; color: black; background: #FEFEF7; mso-ansi-language: EN-US;">:</span></strong><span class="apple-converted-space"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black; background: #FEFEF7;">&nbsp;</span></span><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black; background: #FEFEF7;">We will not be liable for any claims, losses, including but not limited to direct, indirect, special, economic and consequential loss or damage (including but not limited to loss of profits, loss of revenue or loss of goodwill), whether in contract, negligence or other tortuous action arising out of or in connection with the use of this site and material provided to you by email or other communication methods.<span class="apple-converted-space">&nbsp;</span></span><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(13)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Complaints / Requests:</span></strong><span class="apple-converted-space">&nbsp;</span>xxxxxxxxxxxxxxx&nbsp;&nbsp;&nbsp; will endeavour to handle all complaints for you ASAP. Please address any complaints or requests to the contact details contained on this website.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(14)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Viruses:</span></strong><span class="apple-converted-space">&nbsp;</span>We do not warrant that this site is free of viruses or bugs or that this site is compatible with all computer systems and browsers.<span class="apple-converted-space">&nbsp;</span></span><br /> </span></p>\r\n<p class="MsoNormal"><span style="font-size: 10.5pt; line-height: 115%; font-family: ''Century Gothic'',''sans-serif''; color: black;"><span style="background: #FEFEF7;">(15)<span class="apple-converted-space">&nbsp;</span><strong><span style="font-family: ''Century Gothic'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">Cookies:</span></strong><span class="apple-converted-space">&nbsp;</span>This site uses session cookies for the purpose of tracking your progress through the checkout process and holding your shopping cart contents. By using this site you consent to this cookie being placed on your computer and acknowledge that the site would otherwise not function accordingly.</span></span></p>', '', '', '', 1, 1, 0, '2016-11-14 10:58:29', '1', '2016-11-14 09:55:33', '1'),
(3, 'Privacy Policy', 'privacy-policy', '<p>Commin soon ....</p>', '', '', '', 1, 0, 0, NULL, '', '2016-11-14 10:12:39', '1'),
(4, 'Home', 'home', '<p>home content</p>', '', 'Online order, Indian Takeaway, South Indian Cuisine,Bridgend', '<p>Online Order at Exotic Shaad. Exotic Shaad at 72 Nolton Street. Exotic Shaad 10% Discount on Online Order</p>', 1, 0, 0, '2016-11-14 13:02:59', '1', '2016-11-14 10:16:07', '1'),
(5, 'orderonline', 'orderonline', '<p>orderonline</p>', '', 'Online order, Indian Takeaway, South Indian Cuisine,Bridgend', '<p>Online Order at Exotic Shaad. Exotic Shaad at 72 Nolton Street. Exotic Shaad 10% Discount on Online Order</p>', 0, 0, 0, '2016-11-14 13:06:27', '1', '2016-11-14 10:16:30', '1'),
(6, 'Gallery', 'gallery', '<p>gallery content</p>', '', 'Online order, Indian Takeaway, South Indian Cuisine,Bridgend', '<p>Online Order at Exotic Shaad. Exotic Shaad at 72 Nolton Street. Exotic Shaad 10% Discount on Online Order</p>', 1, 0, 0, '2016-11-14 13:05:32', '1', '2016-11-14 10:17:31', '1'),
(7, 'Contact', 'contact', '<p>contact content goes here</p>', '', 'Online order, Indian Takeaway, South Indian Cuisine,Bridgend', '<p>Online Order at Exotic Shaad. Exotic Shaad at 72 Nolton Street. Exotic Shaad 10% Discount on Online Order</p>', 1, 0, 0, '2016-11-14 13:04:58', '1', '2016-11-14 10:18:23', '1'),
(8, 'Special Foods And  Drinks', 'special-foods-and-drinks', '<p><strong></strong>100 best dishes 2015&nbsp;picks out sophisticated signature dishes, indulgent desserts and sweet treats, finger-licking street food and restorative plates of&nbsp;breakfast food. Our list also&nbsp;celebrates 2016 food trends &ndash; from bao buns to butter chicken. Tuck in to our top 100 below.&nbsp; <strong></strong></p>', 'image2.png', '', '', 1, 1, 0, '2016-11-14 12:39:46', '1', '2016-11-14 10:19:14', '1'),
(9, 'Professional Chefs', 'professional-chefs', '<p style="margin: 0.5em 0px; line-height: inherit; color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal; text-align: justify;">A chef is a highly trained and skilled professional cook who is proficient in all aspects of food preparation of a particular cusine. The word "chef" is derived (and shortened) from the term&nbsp;<em>chef de&nbsp;</em> the director or head of a kitchen. Chefs can receive both formal training from an institution, as well as through apprenticeship with an experienced chef.</p>\r\n<p style="margin: 0.5em 0px; line-height: inherit; color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal; text-align: justify;">&nbsp;</p>', 'image1.png', '', '', 1, 1, 0, '2016-11-14 12:28:25', '1', '2016-11-14 10:19:50', '1'),
(10, 'Perfect Recipes', 'perfect-recipes', '<h2>A&nbsp;<strong style="color: #252525; font-family: sans-serif; font-size: 14px;">recipe</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal;">&nbsp;is a set of instructions that describes how to prepare or make something, especially a culinary&nbsp;</span><a style="text-decoration: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px; font-weight: normal;" title="Dish (food)" href="https://en.wikipedia.org/wiki/Dish_(food)">dish</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal;">. It is also used in medicine or in information technology (user acceptance). A doctor will usually begin a&nbsp;</span><a style="text-decoration: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px; font-weight: normal;" title="Medical prescription" href="https://en.wikipedia.org/wiki/Medical_prescription">prescription</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal;">&nbsp;with&nbsp;</span><em style="color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal;">recipe</em><span style="color: #252525; font-family: sans-serif; font-size: 14px; font-weight: normal;">, usually abbreviated to Rx or an equivalent symbol.</span></h2>', 'image3.png', '', '', 1, 1, 0, '2016-11-14 12:46:18', '1', '2016-11-14 10:20:10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `meta_keys` text NOT NULL,
  `meta_desc` text NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=NO',
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(5) NOT NULL,
  `is_hook` tinyint(1) NOT NULL DEFAULT '0',
  `hook` varchar(100) NOT NULL,
  `hook_url` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `slug`, `content`, `image`, `meta_keys`, `meta_desc`, `is_published`, `is_featured`, `is_deleted`, `modified_at`, `modified_by`, `created_at`, `created_by`, `is_hook`, `hook`, `hook_url`) VALUES
(1, 'Welcome to exotic Shaad ', 'welcome-to-exotic-shaad-', '<p>place your order online&nbsp;</p>', 'image2.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-14 08:07:45', '1', 1, 'order online', 'orderonline'),
(2, 'welcome to exotic Shaad', 'welcome-to-exotic-shaad', '<p>place order online</p>', 'image4.jpg', '', '', 1, 0, 0, NULL, '', '2016-11-14 08:13:49', '1', 1, 'order online', 'orderonline');

-- --------------------------------------------------------

--
-- Table structure for table `verification_method`
--

CREATE TABLE IF NOT EXISTS `verification_method` (
  `id` int(200) NOT NULL,
  `verification_by` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verification_method`
--

INSERT INTO `verification_method` (`id`, `verification_by`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`,`ip_address`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`key`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
 ADD PRIMARY KEY (`configuration_id`), ADD UNIQUE KEY `unq_config_key_zen` (`configuration_key`), ADD KEY `idx_key_value_zen` (`configuration_key`,`configuration_value`(10)), ADD KEY `idx_cfg_grp_id_zen` (`configuration_group_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`CustId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
 ADD PRIMARY KEY (`CustAddId`), ADD KEY `CustId` (`CustId`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
 ADD PRIMARY KEY (`OrderId`), ADD KEY `RestId` (`RestId`), ADD KEY `CustId` (`CustId`);

--
-- Indexes for table `customer_order_busket`
--
ALTER TABLE `customer_order_busket`
 ADD PRIMARY KEY (`OrderId`), ADD KEY `RestId` (`RestId`), ADD KEY `CustId` (`CustId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_category`
--
ALTER TABLE `gkpos_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_customer`
--
ALTER TABLE `gkpos_customer`
 ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `gkpos_deliveryplan`
--
ALTER TABLE `gkpos_deliveryplan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_menu`
--
ALTER TABLE `gkpos_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_order`
--
ALTER TABLE `gkpos_order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_order_detail`
--
ALTER TABLE `gkpos_order_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_selection`
--
ALTER TABLE `gkpos_selection`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_table`
--
ALTER TABLE `gkpos_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_user`
--
ALTER TABLE `gkpos_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gkpos_voucher`
--
ALTER TABLE `gkpos_voucher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_attribute`
--
ALTER TABLE `order_attribute`
 ADD PRIMARY KEY (`OrderAttrId`);

--
-- Indexes for table `order_attribute_basket`
--
ALTER TABLE `order_attribute_basket`
 ADD PRIMARY KEY (`OrderAttrId`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`OrderItermId`), ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `order_detail_busket`
--
ALTER TABLE `order_detail_busket`
 ADD PRIMARY KEY (`OrderItermId`), ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
MODIFY `configuration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=340;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `CustId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
MODIFY `CustAddId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
MODIFY `OrderId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `customer_order_busket`
--
ALTER TABLE `customer_order_busket`
MODIFY `OrderId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `gkpos_category`
--
ALTER TABLE `gkpos_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `gkpos_deliveryplan`
--
ALTER TABLE `gkpos_deliveryplan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gkpos_menu`
--
ALTER TABLE `gkpos_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `gkpos_order`
--
ALTER TABLE `gkpos_order`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gkpos_order_detail`
--
ALTER TABLE `gkpos_order_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `gkpos_selection`
--
ALTER TABLE `gkpos_selection`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gkpos_table`
--
ALTER TABLE `gkpos_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gkpos_user`
--
ALTER TABLE `gkpos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gkpos_voucher`
--
ALTER TABLE `gkpos_voucher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_attribute`
--
ALTER TABLE `order_attribute`
MODIFY `OrderAttrId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_attribute_basket`
--
ALTER TABLE `order_attribute_basket`
MODIFY `OrderAttrId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `OrderItermId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `order_detail_busket`
--
ALTER TABLE `order_detail_busket`
MODIFY `OrderItermId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
