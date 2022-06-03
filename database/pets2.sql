

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `animals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int NOT NULL,
  `breed_id` int NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `animals_owner_id_index` (`owner_id`),
  KEY `animals_breed_id_index` (`breed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'Fluffy',1,1,'geen','2022-05-13','2022-05-24 11:21:47','2022-05-24 11:21:47'),(2,'Bob',1,2,'heeft heel veel bang in het donker','2022-05-04','2022-05-24 11:59:52','2022-05-24 12:01:33');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breeds`
--

DROP TABLE IF EXISTS `breeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `breeds` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breeds`
--

LOCK TABLES `breeds` WRITE;
/*!40000 ALTER TABLE `breeds` DISABLE KEYS */;
INSERT INTO `breeds` VALUES (1,'Labradoodle','2022-05-24 11:21:13','2022-05-24 11:21:13'),(2,'Duitste herder','2022-05-24 11:21:20','2022-05-24 11:21:20'),(3,'Collie','2022-05-24 11:21:26','2022-05-24 11:21:26');
/*!40000 ALTER TABLE `breeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,4,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,4,'remarks','text','Remarks',1,1,1,1,1,1,'{}',2),(24,4,'created_at','text','Created At',1,1,1,0,0,0,'{}',3),(25,4,'updated_at','text','Updated At',1,0,1,0,0,0,'{}',4),(26,4,'animal_id','text','Animal Id',1,1,1,1,1,1,'{}',5),(27,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(28,5,'name','text','Name',1,1,1,1,1,1,'{}',2),(29,5,'owner_id','text','Owner Id',1,1,1,1,1,1,'{}',3),(30,5,'breed_id','text','Breed Id',1,1,1,1,1,1,'{}',4),(31,5,'remarks','text','Remarks',1,1,1,1,1,1,'{}',5),(32,5,'age','date','Age',1,1,1,1,1,1,'{}',6),(33,5,'created_at','text','Created At',1,0,0,0,0,0,'{}',7),(34,5,'updated_at','text','Updated At',1,0,0,0,0,0,'{}',8),(35,6,'id','text','Id',1,0,0,0,0,0,'{}',1),(36,6,'name','text','Name',1,1,1,1,1,1,'{}',2),(37,6,'created_at','text','Created At',1,0,0,0,0,0,'{}',3),(38,6,'updated_at','text','Updated At',1,0,0,0,0,0,'{}',4),(39,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(40,7,'name','text','Name',1,1,1,1,1,1,'{}',2),(41,7,'email','text','Email',1,1,1,1,1,1,'{}',3),(42,7,'phone','text','Phone',1,1,1,1,1,1,'{}',4),(43,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(44,8,'name','text','Name',1,1,1,1,1,1,'{}',2),(45,8,'price','text','Price',1,1,1,1,1,1,'{}',3),(46,8,'created_at','text','Created At',1,0,0,0,0,0,'{}',4),(47,8,'updated_at','text','Updated At',1,0,0,0,0,0,'{}',5),(48,4,'log_belongstomany_medication_relationship','relationship','medications',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Medication\",\"table\":\"medications\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"log_medication\",\"pivot\":\"1\",\"taggable\":\"0\"}',7),(49,4,'log_belongsto_animal_relationship','relationship','breeds',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Animal\",\"table\":\"animals\",\"type\":\"belongsTo\",\"column\":\"animal_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"animals\",\"pivot\":\"0\",\"taggable\":\"0\"}',8),(50,5,'animal_belongsto_owner_relationship','relationship','owners',1,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Owner\",\"table\":\"owners\",\"type\":\"belongsTo\",\"column\":\"owner_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"animals\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),(51,5,'animal_belongsto_animal_relationship','relationship','animals',1,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Breed\",\"table\":\"breeds\",\"type\":\"belongsTo\",\"column\":\"breed_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"animals\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(52,4,'weight','text','Weight',0,1,1,1,1,1,'{}',6);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(4,'logs','logs','Log','Logs','voyager-paw','App\\Models\\Log',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2022-05-24 09:06:30','2022-05-24 10:04:32'),(5,'animals','animals','Animal','Animals','voyager-paw','App\\Models\\Animal',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2022-05-24 09:07:04','2022-05-24 09:21:01'),(6,'breeds','breeds','Breed','Breeds','voyager-paw','App\\Models\\Breed',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2022-05-24 09:07:21','2022-05-24 09:19:44'),(7,'owners','owners','Owner','Owners','voyager-paw','App\\Models\\Owner',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2022-05-24 09:07:38','2022-05-24 09:07:38'),(8,'medications','medications','Medication','Medications','voyager-paw','App\\Models\\Medication',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2022-05-24 09:07:57','2022-05-24 09:22:35');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_medication`
--

DROP TABLE IF EXISTS `log_medication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `log_medication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `log_id` int DEFAULT NULL,
  `medication_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_medication`
--

LOCK TABLES `log_medication` WRITE;
/*!40000 ALTER TABLE `log_medication` DISABLE KEYS */;
INSERT INTO `log_medication` VALUES (1,3,2),(2,3,3),(3,4,1),(4,4,2),(5,5,1);
/*!40000 ALTER TABLE `log_medication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `animal_id` int NOT NULL,
  `weight` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_animal_id_index` (`animal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (3,'Last van oren','2022-05-24 11:25:04','2022-05-24 11:25:04',1,NULL),(4,'Heel veel jeuk ook tussen de pootjes','2022-05-24 12:00:54','2022-05-24 12:00:54',2,NULL),(5,'jeuk nog niet over, nieuwe kuur','2022-05-24 12:01:14','2022-05-24 12:01:14',2,NULL);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medications`
--

DROP TABLE IF EXISTS `medications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `medications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medications`
--

LOCK TABLES `medications` WRITE;
/*!40000 ALTER TABLE `medications` DISABLE KEYS */;
INSERT INTO `medications` VALUES (1,'Jeukdog',12.00,'2022-05-24 11:22:47','2022-05-24 11:22:47'),(2,'Dafalgan',30.00,'2022-05-24 11:22:55','2022-05-24 11:22:55'),(3,'oortjescare',33.00,'2022-05-24 11:23:05','2022-05-24 11:23:05');
/*!40000 ALTER TABLE `medications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2022-05-24 09:02:14','2022-05-24 09:02:14',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,10,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,11,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,12,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2022-05-24 09:02:14','2022-05-24 09:02:14','voyager.settings.index',NULL),(11,1,'Logs','','_self','voyager-paw',NULL,NULL,15,'2022-05-24 09:06:30','2022-05-24 09:06:30','voyager.logs.index',NULL),(12,1,'Animals','','_self','voyager-paw',NULL,NULL,16,'2022-05-24 09:07:04','2022-05-24 09:07:04','voyager.animals.index',NULL),(13,1,'Breeds','','_self','voyager-paw',NULL,NULL,17,'2022-05-24 09:07:22','2022-05-24 09:07:22','voyager.breeds.index',NULL),(14,1,'Owners','','_self','voyager-paw',NULL,NULL,18,'2022-05-24 09:07:38','2022-05-24 09:07:38','voyager.owners.index',NULL),(15,1,'Medications','','_self','voyager-paw',NULL,NULL,19,'2022-05-24 09:07:57','2022-05-24 09:07:57','voyager.medications.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2022-05-24 09:02:14','2022-05-24 09:02:14');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1),(25,'2022_05_24_110114_create_owners_table',2),(26,'2022_05_24_110115_create_medications_table',2),(27,'2022_05_24_110116_create_animals_table',2),(28,'2022_05_24_110117_create_breeds_table',2),(29,'2022_05_24_110118_create_logs_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `owners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (1,'Massimo','massimo@mas.be','0230983','2022-05-24 09:18:49','2022-05-24 09:18:49');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=51;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(2,'browse_bread',NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(3,'browse_database',NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(4,'browse_media',NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(5,'browse_compass',NULL,'2022-05-24 09:02:14','2022-05-24 09:02:14'),(6,'browse_menus','menus','2022-05-24 09:02:14','2022-05-24 09:02:14'),(7,'read_menus','menus','2022-05-24 09:02:14','2022-05-24 09:02:14'),(8,'edit_menus','menus','2022-05-24 09:02:14','2022-05-24 09:02:14'),(9,'add_menus','menus','2022-05-24 09:02:14','2022-05-24 09:02:14'),(10,'delete_menus','menus','2022-05-24 09:02:14','2022-05-24 09:02:14'),(11,'browse_roles','roles','2022-05-24 09:02:14','2022-05-24 09:02:14'),(12,'read_roles','roles','2022-05-24 09:02:14','2022-05-24 09:02:14'),(13,'edit_roles','roles','2022-05-24 09:02:14','2022-05-24 09:02:14'),(14,'add_roles','roles','2022-05-24 09:02:14','2022-05-24 09:02:14'),(15,'delete_roles','roles','2022-05-24 09:02:14','2022-05-24 09:02:14'),(16,'browse_users','users','2022-05-24 09:02:14','2022-05-24 09:02:14'),(17,'read_users','users','2022-05-24 09:02:14','2022-05-24 09:02:14'),(18,'edit_users','users','2022-05-24 09:02:14','2022-05-24 09:02:14'),(19,'add_users','users','2022-05-24 09:02:14','2022-05-24 09:02:14'),(20,'delete_users','users','2022-05-24 09:02:14','2022-05-24 09:02:14'),(21,'browse_settings','settings','2022-05-24 09:02:14','2022-05-24 09:02:14'),(22,'read_settings','settings','2022-05-24 09:02:14','2022-05-24 09:02:14'),(23,'edit_settings','settings','2022-05-24 09:02:14','2022-05-24 09:02:14'),(24,'add_settings','settings','2022-05-24 09:02:14','2022-05-24 09:02:14'),(25,'delete_settings','settings','2022-05-24 09:02:14','2022-05-24 09:02:14'),(26,'browse_logs','logs','2022-05-24 09:06:30','2022-05-24 09:06:30'),(27,'read_logs','logs','2022-05-24 09:06:30','2022-05-24 09:06:30'),(28,'edit_logs','logs','2022-05-24 09:06:30','2022-05-24 09:06:30'),(29,'add_logs','logs','2022-05-24 09:06:30','2022-05-24 09:06:30'),(30,'delete_logs','logs','2022-05-24 09:06:30','2022-05-24 09:06:30'),(31,'browse_animals','animals','2022-05-24 09:07:04','2022-05-24 09:07:04'),(32,'read_animals','animals','2022-05-24 09:07:04','2022-05-24 09:07:04'),(33,'edit_animals','animals','2022-05-24 09:07:04','2022-05-24 09:07:04'),(34,'add_animals','animals','2022-05-24 09:07:04','2022-05-24 09:07:04'),(35,'delete_animals','animals','2022-05-24 09:07:04','2022-05-24 09:07:04'),(36,'browse_breeds','breeds','2022-05-24 09:07:22','2022-05-24 09:07:22'),(37,'read_breeds','breeds','2022-05-24 09:07:22','2022-05-24 09:07:22'),(38,'edit_breeds','breeds','2022-05-24 09:07:22','2022-05-24 09:07:22'),(39,'add_breeds','breeds','2022-05-24 09:07:22','2022-05-24 09:07:22'),(40,'delete_breeds','breeds','2022-05-24 09:07:22','2022-05-24 09:07:22'),(41,'browse_owners','owners','2022-05-24 09:07:38','2022-05-24 09:07:38'),(42,'read_owners','owners','2022-05-24 09:07:38','2022-05-24 09:07:38'),(43,'edit_owners','owners','2022-05-24 09:07:38','2022-05-24 09:07:38'),(44,'add_owners','owners','2022-05-24 09:07:38','2022-05-24 09:07:38'),(45,'delete_owners','owners','2022-05-24 09:07:38','2022-05-24 09:07:38'),(46,'browse_medications','medications','2022-05-24 09:07:57','2022-05-24 09:07:57'),(47,'read_medications','medications','2022-05-24 09:07:57','2022-05-24 09:07:57'),(48,'edit_medications','medications','2022-05-24 09:07:57','2022-05-24 09:07:57'),(49,'add_medications','medications','2022-05-24 09:07:57','2022-05-24 09:07:57'),(50,'delete_medications','medications','2022-05-24 09:07:57','2022-05-24 09:07:57');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2022-05-24 09:02:14','2022-05-24 09:02:14'),(2,'user','Normal User','2022-05-24 09:02:14','2022-05-24 09:02:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'massimo','info@massimo.be','users/default.png',NULL,'$2y$10$AZUHIGc5cgJLCei1lbvLXe9S/rCzX8AWdldsCMg1UuDdr38A5hDrK',NULL,NULL,'2022-05-24 09:02:39','2022-05-24 09:02:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pets'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-24 15:36:52
