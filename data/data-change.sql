ALTER TABLE `m_product` ADD `qty` INT(11) NOT NULL DEFAULT '3' AFTER `price`;
ALTER TABLE `m_product` CHANGE `price` `price` INT(11) NULL DEFAULT '0';