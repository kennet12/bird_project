
CREATE TABLE `m_product_gallery` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) DEFAULT NULL,
  `stt` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `m_product_gallery`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `m_product_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
