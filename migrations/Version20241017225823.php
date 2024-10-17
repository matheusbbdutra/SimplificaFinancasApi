<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017225823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cartao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE carteira_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categorias_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE conta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE subcategorias_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_transacao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transacao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cartao (id INT NOT NULL, usuario_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, limite DOUBLE PRECISION NOT NULL, data_validade DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A8D50C1EDB38439E ON cartao (usuario_id)');
        $this->addSql('CREATE TABLE carteira (id INT NOT NULL, usuario_id INT DEFAULT NULL, descricao VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_307D6881DB38439E ON carteira (usuario_id)');
        $this->addSql('CREATE TABLE categorias (id INT NOT NULL, tipo_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E9F836CA9276E6C ON categorias (tipo_id)');
        $this->addSql('CREATE INDEX IDX_5E9F836CDB38439E ON categorias (usuario_id)');
        $this->addSql('CREATE TABLE conta (id INT NOT NULL, carteira_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_485A16C35265899 ON conta (carteira_id)');
        $this->addSql('CREATE TABLE subcategorias (id INT NOT NULL, categoria_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_10E64CF3397707A ON subcategorias (categoria_id)');
        $this->addSql('CREATE INDEX IDX_10E64CFDB38439E ON subcategorias (usuario_id)');
        $this->addSql('CREATE TABLE tipo_transacao (id INT NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transacao (id INT NOT NULL, conta_id INT DEFAULT NULL, tipo_transacao_id INT DEFAULT NULL, cartao_id INT DEFAULT NULL, valor DOUBLE PRECISION NOT NULL, dt_lancamento TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, dt_vencimento TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, recorrencia VARCHAR(255) DEFAULT NULL, parcela INT DEFAULT NULL, parcelas INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6C9E60CE628EE05C ON transacao (conta_id)');
        $this->addSql('CREATE INDEX IDX_6C9E60CE3C69F5F2 ON transacao (tipo_transacao_id)');
        $this->addSql('CREATE INDEX IDX_6C9E60CE2AF522B5 ON transacao (cartao_id)');
        $this->addSql('CREATE TABLE usuario (id INT NOT NULL, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cartao ADD CONSTRAINT FK_A8D50C1EDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carteira ADD CONSTRAINT FK_307D6881DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE categorias ADD CONSTRAINT FK_5E9F836CA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_transacao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE categorias ADD CONSTRAINT FK_5E9F836CDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE conta ADD CONSTRAINT FK_485A16C35265899 FOREIGN KEY (carteira_id) REFERENCES carteira (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subcategorias ADD CONSTRAINT FK_10E64CF3397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subcategorias ADD CONSTRAINT FK_10E64CFDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE628EE05C FOREIGN KEY (conta_id) REFERENCES conta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE3C69F5F2 FOREIGN KEY (tipo_transacao_id) REFERENCES tipo_transacao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE2AF522B5 FOREIGN KEY (cartao_id) REFERENCES cartao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cartao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE carteira_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categorias_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE conta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE subcategorias_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_transacao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transacao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuario_id_seq CASCADE');
        $this->addSql('ALTER TABLE cartao DROP CONSTRAINT FK_A8D50C1EDB38439E');
        $this->addSql('ALTER TABLE carteira DROP CONSTRAINT FK_307D6881DB38439E');
        $this->addSql('ALTER TABLE categorias DROP CONSTRAINT FK_5E9F836CA9276E6C');
        $this->addSql('ALTER TABLE categorias DROP CONSTRAINT FK_5E9F836CDB38439E');
        $this->addSql('ALTER TABLE conta DROP CONSTRAINT FK_485A16C35265899');
        $this->addSql('ALTER TABLE subcategorias DROP CONSTRAINT FK_10E64CF3397707A');
        $this->addSql('ALTER TABLE subcategorias DROP CONSTRAINT FK_10E64CFDB38439E');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE628EE05C');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE3C69F5F2');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE2AF522B5');
        $this->addSql('DROP TABLE cartao');
        $this->addSql('DROP TABLE carteira');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE conta');
        $this->addSql('DROP TABLE subcategorias');
        $this->addSql('DROP TABLE tipo_transacao');
        $this->addSql('DROP TABLE transacao');
        $this->addSql('DROP TABLE usuario');
    }
}
