<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220418075531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE book_live_with_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_martial_statuses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_problems_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_work_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_affirmations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_articles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_client_profiles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_comments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_consultations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_order_items_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_orders_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_psychologist_profiles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_robot_steps_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_robots_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_test_results_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_tests_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doc_users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE book_live_with_types (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_215E6CA85E237E06 ON book_live_with_types (name)');
        $this->addSql('CREATE TABLE book_martial_statuses (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD29D01C5E237E06 ON book_martial_statuses (name)');
        $this->addSql('CREATE TABLE book_problems (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9799741C5E237E06 ON book_problems (name)');
        $this->addSql('CREATE TABLE book_roles (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8FC3BBE5E237E06 ON book_roles (name)');
        $this->addSql('CREATE TABLE book_work_types (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EE66B8AC5E237E06 ON book_work_types (name)');
        $this->addSql('CREATE TABLE doc_affirmations (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12AD084A5E237E06 ON doc_affirmations (name)');
        $this->addSql('CREATE TABLE doc_articles (id INT NOT NULL, psychologist_profile_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, content TEXT NOT NULL, preview_img VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DE692C33989D9B62 ON doc_articles (slug)');
        $this->addSql('CREATE INDEX IDX_DE692C3389D45141 ON doc_articles (psychologist_profile_id)');
        $this->addSql('CREATE TABLE doc_client_profiles (id INT NOT NULL, user_id INT DEFAULT NULL, live_with_type_id SMALLINT DEFAULT NULL, martial_status_id SMALLINT DEFAULT NULL, work_type_id SMALLINT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, patronymic VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, gender gender DEFAULT NULL, has_children BOOLEAN DEFAULT false NOT NULL, weight SMALLINT DEFAULT NULL, height SMALLINT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5D91274FA76ED395 ON doc_client_profiles (user_id)');
        $this->addSql('CREATE INDEX IDX_5D91274F7E7E34FA ON doc_client_profiles (live_with_type_id)');
        $this->addSql('CREATE INDEX IDX_5D91274FC73A732C ON doc_client_profiles (martial_status_id)');
        $this->addSql('CREATE INDEX IDX_5D91274F108734B1 ON doc_client_profiles (work_type_id)');
        $this->addSql('CREATE TABLE doc_comments (id BIGINT NOT NULL, client_profile_id INT DEFAULT NULL, consultation_id INT DEFAULT NULL, comment VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3E2A8B715CAE2FF9 ON doc_comments (client_profile_id)');
        $this->addSql('CREATE INDEX IDX_3E2A8B7162FF6CDF ON doc_comments (consultation_id)');
        $this->addSql('CREATE TABLE doc_consultations (id INT NOT NULL, psychologist_profile_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, duration SMALLINT DEFAULT NULL, img VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_772CF2E189D45141 ON doc_consultations (psychologist_profile_id)');
        $this->addSql('CREATE TABLE doc_order_items (id BIGINT NOT NULL, order_id BIGINT DEFAULT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_310947098D9F6D38 ON doc_order_items (order_id)');
        $this->addSql('CREATE TABLE doc_orders (id BIGINT NOT NULL, client_profile_id INT DEFAULT NULL, unique_number CHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, sum NUMERIC(10, 2) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6748E0428B2E7FF4 ON doc_orders (unique_number)');
        $this->addSql('CREATE INDEX IDX_6748E0425CAE2FF9 ON doc_orders (client_profile_id)');
        $this->addSql('CREATE TABLE doc_psychologist_profiles (id INT NOT NULL, user_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, patronymic VARCHAR(255) DEFAULT NULL, education VARCHAR(255) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDDEC6EA76ED395 ON doc_psychologist_profiles (user_id)');
        $this->addSql('CREATE TABLE cross_psychologist_profiles_work_problems (psychologist_profile_id INT NOT NULL, problem_id SMALLINT NOT NULL, PRIMARY KEY(psychologist_profile_id, problem_id))');
        $this->addSql('CREATE INDEX IDX_76F47B3C89D45141 ON cross_psychologist_profiles_work_problems (psychologist_profile_id)');
        $this->addSql('CREATE INDEX IDX_76F47B3CA0DCED86 ON cross_psychologist_profiles_work_problems (problem_id)');
        $this->addSql('CREATE TABLE cross_psychologist_profiles_dont_work_problems (psychologist_profile_id INT NOT NULL, problem_id SMALLINT NOT NULL, PRIMARY KEY(psychologist_profile_id, problem_id))');
        $this->addSql('CREATE INDEX IDX_3538456789D45141 ON cross_psychologist_profiles_dont_work_problems (psychologist_profile_id)');
        $this->addSql('CREATE INDEX IDX_35384567A0DCED86 ON cross_psychologist_profiles_dont_work_problems (problem_id)');
        $this->addSql('CREATE TABLE doc_robot_steps (id BIGINT NOT NULL, robot_id SMALLINT DEFAULT NULL, client_profile_id INT DEFAULT NULL, step VARCHAR(10) NOT NULL, data JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D20D77DAD5AA10AC ON doc_robot_steps (robot_id)');
        $this->addSql('CREATE INDEX IDX_D20D77DA5CAE2FF9 ON doc_robot_steps (client_profile_id)');
        $this->addSql('CREATE TABLE doc_robots (id SMALLINT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, preview_img VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ED6DFB8989D9B62 ON doc_robots (slug)');
        $this->addSql('CREATE TABLE doc_test_results (id BIGINT NOT NULL, test_id SMALLINT DEFAULT NULL, client_profile_id INT DEFAULT NULL, data JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F10CB22E1E5D0459 ON doc_test_results (test_id)');
        $this->addSql('CREATE INDEX IDX_F10CB22E5CAE2FF9 ON doc_test_results (client_profile_id)');
        $this->addSql('CREATE TABLE doc_tests (id SMALLINT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, preview_img VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D899108989D9B62 ON doc_tests (slug)');
        $this->addSql('CREATE TABLE doc_users (id INT NOT NULL, role_id SMALLINT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email_confirmation VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B6AC8BFE7927C74 ON doc_users (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B6AC8BFD60322AC ON doc_users (role_id)');
        $this->addSql('ALTER TABLE doc_articles ADD CONSTRAINT FK_DE692C3389D45141 FOREIGN KEY (psychologist_profile_id) REFERENCES doc_psychologist_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_client_profiles ADD CONSTRAINT FK_5D91274FA76ED395 FOREIGN KEY (user_id) REFERENCES doc_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_client_profiles ADD CONSTRAINT FK_5D91274F7E7E34FA FOREIGN KEY (live_with_type_id) REFERENCES book_live_with_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_client_profiles ADD CONSTRAINT FK_5D91274FC73A732C FOREIGN KEY (martial_status_id) REFERENCES book_martial_statuses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_client_profiles ADD CONSTRAINT FK_5D91274F108734B1 FOREIGN KEY (work_type_id) REFERENCES book_work_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_comments ADD CONSTRAINT FK_3E2A8B715CAE2FF9 FOREIGN KEY (client_profile_id) REFERENCES doc_client_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_comments ADD CONSTRAINT FK_3E2A8B7162FF6CDF FOREIGN KEY (consultation_id) REFERENCES doc_consultations (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_consultations ADD CONSTRAINT FK_772CF2E189D45141 FOREIGN KEY (psychologist_profile_id) REFERENCES doc_psychologist_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_order_items ADD CONSTRAINT FK_310947098D9F6D38 FOREIGN KEY (order_id) REFERENCES doc_orders (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_orders ADD CONSTRAINT FK_6748E0425CAE2FF9 FOREIGN KEY (client_profile_id) REFERENCES doc_client_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_psychologist_profiles ADD CONSTRAINT FK_EDDDEC6EA76ED395 FOREIGN KEY (user_id) REFERENCES doc_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_work_problems ADD CONSTRAINT FK_76F47B3C89D45141 FOREIGN KEY (psychologist_profile_id) REFERENCES doc_psychologist_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_work_problems ADD CONSTRAINT FK_76F47B3CA0DCED86 FOREIGN KEY (problem_id) REFERENCES book_problems (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_dont_work_problems ADD CONSTRAINT FK_3538456789D45141 FOREIGN KEY (psychologist_profile_id) REFERENCES doc_psychologist_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_dont_work_problems ADD CONSTRAINT FK_35384567A0DCED86 FOREIGN KEY (problem_id) REFERENCES book_problems (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_robot_steps ADD CONSTRAINT FK_D20D77DAD5AA10AC FOREIGN KEY (robot_id) REFERENCES doc_robots (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_robot_steps ADD CONSTRAINT FK_D20D77DA5CAE2FF9 FOREIGN KEY (client_profile_id) REFERENCES doc_client_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_test_results ADD CONSTRAINT FK_F10CB22E1E5D0459 FOREIGN KEY (test_id) REFERENCES doc_tests (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_test_results ADD CONSTRAINT FK_F10CB22E5CAE2FF9 FOREIGN KEY (client_profile_id) REFERENCES doc_client_profiles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doc_users ADD CONSTRAINT FK_7B6AC8BFD60322AC FOREIGN KEY (role_id) REFERENCES book_roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE doc_client_profiles DROP CONSTRAINT FK_5D91274F7E7E34FA');
        $this->addSql('ALTER TABLE doc_client_profiles DROP CONSTRAINT FK_5D91274FC73A732C');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_work_problems DROP CONSTRAINT FK_76F47B3CA0DCED86');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_dont_work_problems DROP CONSTRAINT FK_35384567A0DCED86');
        $this->addSql('ALTER TABLE doc_users DROP CONSTRAINT FK_7B6AC8BFD60322AC');
        $this->addSql('ALTER TABLE doc_client_profiles DROP CONSTRAINT FK_5D91274F108734B1');
        $this->addSql('ALTER TABLE doc_comments DROP CONSTRAINT FK_3E2A8B715CAE2FF9');
        $this->addSql('ALTER TABLE doc_orders DROP CONSTRAINT FK_6748E0425CAE2FF9');
        $this->addSql('ALTER TABLE doc_robot_steps DROP CONSTRAINT FK_D20D77DA5CAE2FF9');
        $this->addSql('ALTER TABLE doc_test_results DROP CONSTRAINT FK_F10CB22E5CAE2FF9');
        $this->addSql('ALTER TABLE doc_comments DROP CONSTRAINT FK_3E2A8B7162FF6CDF');
        $this->addSql('ALTER TABLE doc_order_items DROP CONSTRAINT FK_310947098D9F6D38');
        $this->addSql('ALTER TABLE doc_articles DROP CONSTRAINT FK_DE692C3389D45141');
        $this->addSql('ALTER TABLE doc_consultations DROP CONSTRAINT FK_772CF2E189D45141');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_work_problems DROP CONSTRAINT FK_76F47B3C89D45141');
        $this->addSql('ALTER TABLE cross_psychologist_profiles_dont_work_problems DROP CONSTRAINT FK_3538456789D45141');
        $this->addSql('ALTER TABLE doc_robot_steps DROP CONSTRAINT FK_D20D77DAD5AA10AC');
        $this->addSql('ALTER TABLE doc_test_results DROP CONSTRAINT FK_F10CB22E1E5D0459');
        $this->addSql('ALTER TABLE doc_client_profiles DROP CONSTRAINT FK_5D91274FA76ED395');
        $this->addSql('ALTER TABLE doc_psychologist_profiles DROP CONSTRAINT FK_EDDDEC6EA76ED395');
        $this->addSql('DROP SEQUENCE book_live_with_types_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_martial_statuses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_problems_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_work_types_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_affirmations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_articles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_client_profiles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_comments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_consultations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_order_items_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_orders_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_psychologist_profiles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_robot_steps_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_robots_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_test_results_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_tests_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doc_users_id_seq CASCADE');
        $this->addSql('DROP TABLE book_live_with_types');
        $this->addSql('DROP TABLE book_martial_statuses');
        $this->addSql('DROP TABLE book_problems');
        $this->addSql('DROP TABLE book_roles');
        $this->addSql('DROP TABLE book_work_types');
        $this->addSql('DROP TABLE doc_affirmations');
        $this->addSql('DROP TABLE doc_articles');
        $this->addSql('DROP TABLE doc_client_profiles');
        $this->addSql('DROP TABLE doc_comments');
        $this->addSql('DROP TABLE doc_consultations');
        $this->addSql('DROP TABLE doc_order_items');
        $this->addSql('DROP TABLE doc_orders');
        $this->addSql('DROP TABLE doc_psychologist_profiles');
        $this->addSql('DROP TABLE cross_psychologist_profiles_work_problems');
        $this->addSql('DROP TABLE cross_psychologist_profiles_dont_work_problems');
        $this->addSql('DROP TABLE doc_robot_steps');
        $this->addSql('DROP TABLE doc_robots');
        $this->addSql('DROP TABLE doc_test_results');
        $this->addSql('DROP TABLE doc_tests');
        $this->addSql('DROP TABLE doc_users');
    }
}
