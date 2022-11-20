SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS login;
DROP TABLE IF EXISTS reset;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS actor;
DROP TABLE IF EXISTS director;
DROP TABLE IF EXISTS movie;
DROP TABLE IF EXISTS genremovie;
DROP TABLE IF EXISTS actormovie;




CREATE TABLE login (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    password TEXT,
    PRIMARY KEY (id)
);

INSERT INTO login (username, password) VALUES ('admin', '$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm');

CREATE TABLE reset (
    email VARCHAR(255),
    code VARCHAR(5),
    expdate DATETIME
);


CREATE TABLE genre (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE actor (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE director (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE movie (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    trailer VARCHAR(255),
    country VARCHAR(255),
    year INT,
    director_id BIGINT UNSIGNED,
    PRIMARY KEY (id),
    FOREIGN KEY(director_id) REFERENCES director(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE genremovie (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    movie_id BIGINT UNSIGNED NOT NULL,
    genre_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(movie_id) REFERENCES movie(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(genre_id) REFERENCES genre(id) ON DELETE CASCADE ON UPDATE CASCADE	
);


CREATE TABLE actormovie (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    movie_id BIGINT UNSIGNED NOT NULL,
    actor_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(movie_id) REFERENCES movie(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(actor_id) REFERENCES actor(id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO genre (name) VALUES ('Acção');
INSERT INTO genre (name) VALUES ('Animação');
INSERT INTO genre (name) VALUES ('Aventura');
INSERT INTO genre (name) VALUES ('Biografia');
INSERT INTO genre (name) VALUES ('Clássico');
INSERT INTO genre (name) VALUES ('Comédia');
INSERT INTO genre (name) VALUES ('Crime/Policial');
INSERT INTO genre (name) VALUES ('Desporto');
INSERT INTO genre (name) VALUES ('Documentário');
INSERT INTO genre (name) VALUES ('Drama');
INSERT INTO genre (name) VALUES ('Família');
INSERT INTO genre (name) VALUES ('Fantasia');
INSERT INTO genre (name) VALUES ('Ficção C.');
INSERT INTO genre (name) VALUES ('Film Noir');
INSERT INTO genre (name) VALUES ('Guerra');
INSERT INTO genre (name) VALUES ('História');
INSERT INTO genre (name) VALUES ('Musical');
INSERT INTO genre (name) VALUES ('Religião');
INSERT INTO genre (name) VALUES ('Romance');
INSERT INTO genre (name) VALUES ('Séries/TV');
INSERT INTO genre (name) VALUES ('Terror');
INSERT INTO genre (name) VALUES ('Thriller');
INSERT INTO genre (name) VALUES ('Viagens');
INSERT INTO genre (name) VALUES ('Western');
INSERT INTO genre (name) VALUES ('Erótico');


INSERT INTO actor (name) VALUES ('Tom Hanks');
INSERT INTO actor (name) VALUES ('Gary Sinise');
INSERT INTO actor (name) VALUES ('Brad Pitt');
INSERT INTO actor (name) VALUES ('Robin Wright');
INSERT INTO actor (name) VALUES ('Jonah Hill');
INSERT INTO actor (name) VALUES ('Michael J. Fox');
INSERT INTO actor (name) VALUES ('Christopher Lloyd');
INSERT INTO actor (name) VALUES ('Lea Thompson');
INSERT INTO actor (name) VALUES ('Robert De Niro');
INSERT INTO actor (name) VALUES ('Jodie Foster');
INSERT INTO actor (name) VALUES ('Cybill Shepherd');
INSERT INTO actor (name) VALUES ('Ray Liotta');
INSERT INTO actor (name) VALUES ('Joe Pesci');
INSERT INTO actor (name) VALUES ('Joey King');
INSERT INTO actor (name) VALUES ('Aaron Taylor-Johnson');
INSERT INTO actor (name) VALUES ('Uma Thurman');
INSERT INTO actor (name) VALUES ('David Carradine');
INSERT INTO actor (name) VALUES ('Daryl Hannah');
INSERT INTO actor (name) VALUES ('Roy Scheider');
INSERT INTO actor (name) VALUES ('Robert Shaw');
INSERT INTO actor (name) VALUES ('Richard Dreyfuss');
INSERT INTO actor (name) VALUES ('Sam Neil');
INSERT INTO actor (name) VALUES ('Laura Dern');
INSERT INTO actor (name) VALUES ('Jeff Goldblum');


INSERT INTO director (name) VALUES ('Robert Zemeckis');
INSERT INTO director (name) VALUES ('Bennet Miller');
INSERT INTO director (name) VALUES ('Martin Scorsese');
INSERT INTO director (name) VALUES ('David Leitch');
INSERT INTO director (name) VALUES ('Quentin Tarantino');
INSERT INTO director (name) VALUES ('Steven Spielberg');


INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Forrest Gump','bLvqoHBptjg','USA',1994,1);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Moneyball','4QPVo0UIzc','USA',2011,2);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Back to the Future','qvsgGtivCgs','USA',1985,1);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Taxi Driver','UUxD4-dEzn0','USA',1976,3);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Goodfellas','2ilzidi_J8Q','USA',1990,3);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Bullet Train','0IOsk2Vlc4o','USA',2022,4);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Kill Bill: Vol. 1','7kSuas6mRpk','USA',2003,5);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Jaws','U1fu_sA7XhE','USA',1975,6);
INSERT INTO movie (name, trailer, country, year, director_id) VALUES ('Jurassic Park','QWBKEmWWL38','USA',1993,6);


INSERT INTO genremovie (movie_id, genre_id) VALUES (1, 6);
INSERT INTO genremovie (movie_id, genre_id) VALUES (1, 10);
INSERT INTO genremovie (movie_id, genre_id) VALUES (1, 18);

INSERT INTO genremovie (movie_id, genre_id) VALUES (2, 4);
INSERT INTO genremovie (movie_id, genre_id) VALUES (2, 8);
INSERT INTO genremovie (movie_id, genre_id) VALUES (2, 10);

INSERT INTO genremovie (movie_id, genre_id) VALUES (3, 3);
INSERT INTO genremovie (movie_id, genre_id) VALUES (3, 5);
INSERT INTO genremovie (movie_id, genre_id) VALUES (3, 6);
INSERT INTO genremovie (movie_id, genre_id) VALUES (3, 13);

INSERT INTO genremovie (movie_id, genre_id) VALUES (4, 7);
INSERT INTO genremovie (movie_id, genre_id) VALUES (4, 10);

INSERT INTO genremovie (movie_id, genre_id) VALUES (5, 4);
INSERT INTO genremovie (movie_id, genre_id) VALUES (5, 7);
INSERT INTO genremovie (movie_id, genre_id) VALUES (5, 10);

INSERT INTO genremovie (movie_id, genre_id) VALUES (6, 1);
INSERT INTO genremovie (movie_id, genre_id) VALUES (6, 6);
INSERT INTO genremovie (movie_id, genre_id) VALUES (6, 22);

INSERT INTO genremovie (movie_id, genre_id) VALUES (7, 1);
INSERT INTO genremovie (movie_id, genre_id) VALUES (7, 7);
INSERT INTO genremovie (movie_id, genre_id) VALUES (7, 10);

INSERT INTO genremovie (movie_id, genre_id) VALUES (8, 1);
INSERT INTO genremovie (movie_id, genre_id) VALUES (8, 22);

INSERT INTO genremovie (movie_id, genre_id) VALUES (9, 1);
INSERT INTO genremovie (movie_id, genre_id) VALUES (9, 2);
INSERT INTO genremovie (movie_id, genre_id) VALUES (9, 13);






INSERT INTO actormovie (movie_id, actor_id) VALUES (1, 1);
INSERT INTO actormovie (movie_id, actor_id) VALUES (1, 2);
INSERT INTO actormovie (movie_id, actor_id) VALUES (1, 4);

INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 3);
INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 4);
INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 5);

INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 6);
INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 7);
INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 8);

INSERT INTO actormovie (movie_id, actor_id) VALUES (4, 9);
INSERT INTO actormovie (movie_id, actor_id) VALUES (4, 10);
INSERT INTO actormovie (movie_id, actor_id) VALUES (4, 11);

INSERT INTO actormovie (movie_id, actor_id) VALUES (5, 9);
INSERT INTO actormovie (movie_id, actor_id) VALUES (5, 12);
INSERT INTO actormovie (movie_id, actor_id) VALUES (5, 13);

INSERT INTO actormovie (movie_id, actor_id) VALUES (6, 3);
INSERT INTO actormovie (movie_id, actor_id) VALUES (6, 14);
INSERT INTO actormovie (movie_id, actor_id) VALUES (6, 15);

INSERT INTO actormovie (movie_id, actor_id) VALUES (7, 16);
INSERT INTO actormovie (movie_id, actor_id) VALUES (7, 17);
INSERT INTO actormovie (movie_id, actor_id) VALUES (7, 18);

INSERT INTO actormovie (movie_id, actor_id) VALUES (8, 19);
INSERT INTO actormovie (movie_id, actor_id) VALUES (8, 20);
INSERT INTO actormovie (movie_id, actor_id) VALUES (8, 21);

INSERT INTO actormovie (movie_id, actor_id) VALUES (9, 22);
INSERT INTO actormovie (movie_id, actor_id) VALUES (9, 23);
INSERT INTO actormovie (movie_id, actor_id) VALUES (9, 24);






SET FOREIGN_KEY_CHECKS=1;