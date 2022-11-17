

CREATE TABLE login (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    username varchar(255),
    password text,
    PRIMARY KEY (id)
);

INSERT INTO login (username, password) VALUES ('admin', '$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm');

CREATE TABLE genre (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE actor (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE director (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE movie (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255),
    country varchar(255),
    year int,
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


INSERT INTO actor (name) VALUES ('Brad Pitt');
INSERT INTO actor (name) VALUES ('Robin Wright');
INSERT INTO actor (name) VALUES ('Jonah Hill');
INSERT INTO actor (name) VALUES ('Tom Hanks');
INSERT INTO actor (name) VALUES ('Gary Sinise');
INSERT INTO actor (name) VALUES ('Michael J. Fox');
INSERT INTO actor (name) VALUES ('Christopher Lloyd');
INSERT INTO actor (name) VALUES ('Lea Thompson');
INSERT INTO actor (name) VALUES ('Leonardo DiCaprio');
INSERT INTO actor (name) VALUES ('Jonah Hill');
INSERT INTO actor (name) VALUES ('Margot Robbie');


INSERT INTO director (name) VALUES ('Robert Zemeckis');
INSERT INTO director (name) VALUES ('Bennet Miller');
INSERT INTO director (name) VALUES ('Martin Scorsese');


INSERT INTO movie (name, country, year, director_id) VALUES ('Forrest Gump','USA',1994,1);
INSERT INTO movie (name, country, year, director_id) VALUES ('Moneyball','USA',2011,2);
INSERT INTO movie (name, country, year, director_id) VALUES ('Back to the Future','USA',1985,1);


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


INSERT INTO actormovie (movie_id, actor_id) VALUES (1, 4);
INSERT INTO actormovie (movie_id, actor_id) VALUES (1, 5);

INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 1);
INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 2);
INSERT INTO actormovie (movie_id, actor_id) VALUES (2, 3);


INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 6);
INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 7);
INSERT INTO actormovie (movie_id, actor_id) VALUES (3, 8);