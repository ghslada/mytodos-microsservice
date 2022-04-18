show databases;
create database testing;
use mydb;
show tables;
show columns from produto;
show columns from pedido;
drop database hMail;
ALTER USER 'convidado'@'localhost' IDENTIFIED WITH mysql_native_password BY '12345';
select * from produto;
select * from usuario;
select * from tipo_produto;
select * from pedido_status;
insert into pedido_status(descricao) values('Processando pedido');
select * from pedido;
select * from produto_pedido;
insert into pedido_status(descricao) values('Carrinho');
select * from tipo_produto;
delete from produto where id>6;
delete from tipo_produto where id;
update produto set url_img="../assets/img/7.jpg" where id=7;
delete from produto where id<36;

select * from produto_pedido join pedido on pedido.id=produto_pedido.pedido_id where pedido.usuario_cpf='1231913122908' and produto_pedido.produto_id=22;
insert into produto(descricao, preco, qtd_estoque, url_img, tipo_produto_id) values("Apple - iPhone 12 128GB Preto Tela de 6,1”, Câmera Dupla de 12MP", 5199.99, 49, "../assets/img", 1 );
insert into tipo_produto(descricao) values('Celular');

drop database mydb;

create database apidevelopment;
use apidevelopment;
drop database apidevelopment;
show databases;
show tables from apidevelopment;
show columns from users;
select * from users;

delete from users where id>0;


use mytodos;
show tables;
select * from user;
select * from assignment;
select * from assignment_types;
update user set photo_url='' where id>2;
ALTER TABLE user MODIFY photo_url VARCHAR(500) NOT NULL;


drop tables assignment_log;
DROP TABLE assignment;
DROP TABLE USER;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mytodos`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(70) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `photo_url` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` TINYINT NOT NULL DEFAULT 0,
  `city_id` INT NOT NULL,
  `completename` VARCHAR(115) GENERATED ALWAYS AS (CONCAT(name, ' ',lastname)) VIRTUAL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `phone_UNIQUE` (`phone` ASC) VISIBLE,
  INDEX `fk_user_city1_idx` (`city_id` ASC) VISIBLE,
  UNIQUE INDEX `city_id_UNIQUE` (`city_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_city1`
    FOREIGN KEY (`city_id`)
    REFERENCES `mytodos`.`city` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mytodos`.`assignment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(125) NOT NULL,
  `description` VARCHAR(10000) NOT NULL,
  `attachments` VARCHAR(5000) NULL,
  `creation_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `close_date` DATETIME NULL,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `future_date` DATETIME NULL,
  `future_task` TINYINT NOT NULL DEFAULT 0,
  `owner_id` INT NOT NULL,
  `assignment_status_id` INT NOT NULL,
  `assignment_types_id` INT NOT NULL,
  `assigned_to_id` INT NOT NULL,
  PRIMARY KEY (`id`, `owner_id`, `assignment_status_id`, `assignment_types_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_assignment_user1_idx` (`owner_id` ASC) VISIBLE,
  INDEX `fk_assignment_assignment_status1_idx` (`assignment_status_id` ASC) VISIBLE,
  INDEX `fk_assignment_assignment_types1_idx` (`assignment_types_id` ASC) VISIBLE,
  INDEX `fk_assignment_user2_idx` (`assigned_to_id` ASC) VISIBLE,
  CONSTRAINT `fk_assignment_user1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `mytodos`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assignment_assignment_status1`
    FOREIGN KEY (`assignment_status_id`)
    REFERENCES `mytodos`.`assignment_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assignment_assignment_types1`
    FOREIGN KEY (`assignment_types_id`)
    REFERENCES `mytodos`.`assignment_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assignment_user2`
    FOREIGN KEY (`assigned_to_id`)
    REFERENCES `mytodos`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`assignment_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mytodos`.`assignment_log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(125) NOT NULL,
  `description` VARCHAR(10000) NOT NULL,
  `attachments` VARCHAR(5000) NULL,
  `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_date` DATETIME NULL,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assignment_id` INT NOT NULL,
  `future_date` DATETIME NULL,
  `future_task` TINYINT NOT NULL DEFAULT 0,
  `owner_id` INT NOT NULL,
  `assignment_status_id` INT NOT NULL,
  `assginment_types_id` INT NOT NULL,
  `assigned_to_id` INT NOT NULL,
  PRIMARY KEY (`id`, `assignment_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_assignment_log_assignment1_idx` (`assignment_id` ASC) VISIBLE,
  CONSTRAINT `fk_assignment_log_assignment1`
    FOREIGN KEY (`assignment_id`)
    REFERENCES `mytodos`.`assignment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



INSERT INTO user (name, lastname, email, phone, address, city_id)
        VALUES ('$name', '$lastname', '$email', '$phone', '$address', 3);
        
select * from  user;













