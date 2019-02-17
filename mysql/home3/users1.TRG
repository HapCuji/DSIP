TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `delet_order_BEFORE_user` BEFORE DELETE ON `users1`\nFOR EACH ROW BEGIN\n	DELETE FROM `order` \n		WHERE `order_user_id`=OLD.`user_id`;\n	\n	UPDATE `tp` \n		SET `tp_responsible_id`=NULL\n			,`tp_responsible_name`=NULL  \n		WHERE `tp_responsible_id` = old.`user_id`;\n		\n	UPDATE `order` \n		SET `order_responsibe_id`=NULL\n			,`order_responsible_name`=NULL  \n		WHERE `order_responsibe_id` = old.`user_id`;\nEND'
sql_modes=0
definers='root@localhost'
client_cs_names='utf8'
connection_cl_names='utf8_general_ci'
db_cl_names='utf8_general_ci'
