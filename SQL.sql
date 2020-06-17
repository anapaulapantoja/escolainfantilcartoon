-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01-Jun-2020 às 00:40
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id10697665_escola`
--

-- -----------------------------------------------------
-- Table `niveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `niveis` (
  `id_nivel` INT NOT NULL AUTO_INCREMENT,
  `nome_nivel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_nivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NULL,
  `niveis_id_nivel` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_Usuários_niveis_idx` (`niveis_id_nivel` ASC) VISIBLE,
  CONSTRAINT `fk_Usuários_niveis`
    FOREIGN KEY (`niveis_id_nivel`)
    REFERENCES `mydb`.`niveis` (`id_nivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `recuperação`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `recuperação` (
  `id_recuperação` INT NOT NULL AUTO_INCREMENT,
  `confirmação` VARCHAR(255) NOT NULL,
  `usuarios_email` VARCHAR(100) NOT NULL,
  INDEX `fk_recuperação_Usuários1_idx` (`usuarios_email` ASC) VISIBLE,
  PRIMARY KEY (`id_recuperação`),
  CONSTRAINT `fk_recuperação_Usuários1`
    FOREIGN KEY (`usuarios_email`)
    REFERENCES `mydb`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` INT NOT NULL AUTO_INCREMENT,
  `nome_turma` VARCHAR(20) NULL,
  PRIMARY KEY (`id_turma`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `nome_aluno` VARCHAR(80) NULL,
  `usuarios_id_usuario` INT NOT NULL,
  `turma_id_turma` INT NOT NULL,
  PRIMARY KEY (`id_aluno`),
  INDEX `fk_alunos_usuarios1_idx` (`usuarios_id_usuario` ASC) VISIBLE,
  INDEX `fk_alunos_turma1_idx` (`turma_id_turma` ASC) VISIBLE,
  CONSTRAINT `fk_alunos_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `mydb`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alunos_turma1`
    FOREIGN KEY (`turma_id_turma`)
    REFERENCES `mydb`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` INT NOT NULL AUTO_INCREMENT,
  `nome_disciplina` VARCHAR(20) NULL,
  PRIMARY KEY (`id_disciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` INT NOT NULL AUTO_INCREMENT,
  `texto` TEXT(300) NULL,
  `data_atividade` DATE NULL,
  `turma_id_turma` INT NOT NULL,
  `disciplina_id_disciplina` INT NOT NULL,
  PRIMARY KEY (`id_atividade`),
  INDEX `fk_atividade_turma1_idx` (`turma_id_turma` ASC) VISIBLE,
  INDEX `fk_atividade_disciplina1_idx` (`disciplina_id_disciplina` ASC) VISIBLE,
  CONSTRAINT `fk_atividade_turma1`
    FOREIGN KEY (`turma_id_turma`)
    REFERENCES `mydb`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividade_disciplina1`
    FOREIGN KEY (`disciplina_id_disciplina`)
    REFERENCES `mydb`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

