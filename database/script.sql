-- Database: MOVIE_STAR

DROP DATABASE IF EXISTS "MOVIE_STAR";

CREATE DATABASE "MOVIE_STAR"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'pt_BR.UTF-8'
    LC_CTYPE = 'pt_BR.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
	
CREATE TABLE USERS(
	id SERIAL PRIMARY KEY,
	name VARCHAR(45),
	last_name VARCHAR(45),
	email VARCHAR(100),
	password VARCHAR(200),
	image VARCHAR(200),
	bio TEXT,
	token VARCHAR(200)
);

CREATE TABLE MOVIE(
	id SERIAL PRIMARY KEY,
	title VARCHAR(100),
	description TEXT,
	image VARCHAR(200),
	trailer VARCHAR(100),
	category VARCHAR(45),
	duration INT,
	USER_id INT,
	
	CONSTRAINT fk_USER FOREIGN KEY (USER_id) REFERENCES USERS(id)
);

CREATE TABLE REVIEW(
	id SERIAL PRIMARY KEY,
	rating INT,
	review TEXT,
	USER_id INT,
	MOVIE_id INT,
	
	CONSTRAINT fk_USER FOREIGN KEY (USER_id) REFERENCES USERS(id),
	CONSTRAINT fk_MOVIE FOREIGN KEY (MOVIE_id) REFERENCES MOVIE(id) ON DELETE CASCADE
);