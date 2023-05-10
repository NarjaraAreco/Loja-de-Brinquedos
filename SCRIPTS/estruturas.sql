DROP TABLE IF EXISTS `brinquedo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brinquedo` (
  `id_brinquedo` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `preco` float NOT NULL,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_brinquedo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `brinquedo` WRITE;
/*!40000 ALTER TABLE `brinquedo` DISABLE KEYS */;
INSERT INTO `brinquedo` VALUES (1,'Barbie Rapunzel',60.5,'barbie'),(2,'Barbie Mosqueteira',65.5,'barbie'),(3,'Barbie Castelo de Diamante',62.2,'barbie'),(4,'Urso de Pelúcia',20.44,'urso'),(5,'Coelho de Pelúcia',21.5,'urso'),(6,'Polvo de Pelúcia',30.5,'urso'),(7,'Funko Batman',60.6,'funko'),(8,'Funko Moana',50.6,'funko'),(9,'Funko Sherek',66.6,'funko'),(10,'Carrinho Hot Wheels',22.6,'carro'),(11,'Carrinho Controle Remoto Monsters',22.6,'carro'),(12,'Tabuleiro de xadrez',18.6,'tab'),(13,'Tabuleiro de dama',12.6,'tab'),(14,'Tabuleiro de ludo',15.6,'tab'),(15,'Carro de bombeiros',23.8,'carro');
/*!40000 ALTER TABLE `brinquedo` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Narjara',2147483647,'867e9cd9ead7068ba93c470df4fff5d1a867c4f4','narjaracatherine@gmail.com','Paraiba','Nova Corumbá',7,'ADMINISTRADOR','67 8193-306');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `valorTotal` double DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `pedido_brinquedo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_brinquedo` (
  `fk_id_pedido` int(11) NOT NULL,
  `fk_id_brinquedo` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`fk_id_pedido`,`fk_id_brinquedo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;