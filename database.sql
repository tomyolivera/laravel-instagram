CREATE TABLE IF NOT EXISTS users(
    id INT(11) AUTO_INCREMENT NOT NULL,
    username VARCHAR(35) NOT NULL,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255),
    status INT(1) NOT NULL DEFAULT 0,
    dark_mode BOOLEAN,
    google_id VARCHAR(255),
    github_id VARCHAR(255),
    facebook_id VARCHAR(255),
    photo VARCHAR(500) NOT NULL DEFAULT 'nophoto.png',
    created_at DATETIME,
    updated_at DATETIME,
    remember_token VARCHAR(255),

    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT uq_username UNIQUE(username)
)ENGINE=INNODB;

INSERT INTO users VALUES(null, 'pedrito123', "Pedro", null, "pedrito@gmail.com", "12345", DEFAULT, DEFAULT, DEFAULT, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'jose', "Jose", null, "jose@gmail.com", "12345", DEFAULT, DEFAULT, DEFAULT, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'manuel', "manuel", null, "manuel@gmail.com", "12345", DEFAULT, DEFAULT, DEFAULT, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'antonio', "antonio", null, "antonio@gmail.com", "12345", DEFAULT, DEFAULT, DEFAULT, CURTIME(), CURTIME(), null);

CREATE TABLE IF NOT EXISTS publications(
    id INT(11) AUTO_INCREMENT NOT NULL,
    user_id INT(11) NOT NULL,
    description VARCHAR(130),
    photo VARCHAR(125) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_publications PRIMARY KEY(id),
    CONSTRAINT fk_publications_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=MyISAM;

INSERT INTO publications VALUES(null, 1, "EEEEAAAAA", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 1, "Vacas", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 1, "Wanchopeee", "", CURTIME(), CURTIME());

INSERT INTO publications VALUES(null, 2, "En la playa", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 2, "En las montañas", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 2, "Con tevez", "", CURTIME(), CURTIME());

INSERT INTO publications VALUES(null, 3, "Ke personaees", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 3, "", "", CURTIME(), CURTIME());
INSERT INTO publications VALUES(null, 3, "123", "", CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS comments(
    id INT(11) AUTO_INCREMENT NOT NULL,
    user_id INT(11) NOT NULL,
    publication_id INT(11) NOT NULL,
    description VARCHAR(130),
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_comments_publications FOREIGN KEY(publication_id) REFERENCES publications(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=MyISAM;

INSERT INTO comments VALUES(null, 1, 3, "Alta foto", CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 1, 2, "Seee", CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 3, "Buena fotito eaa", CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 3, 1, "Bien perrro", CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS likes(
    id INT(11) AUTO_INCREMENT NOT NULL,
    user_id INT(11) NOT NULL,
    publication_id INT(11) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_likes_publications FOREIGN KEY(publication_id) REFERENCES publications(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=MyISAM;

INSERT INTO likes VALUES(null, 1, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 1, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 3, 1, CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS category_tasks(
    id INT(11) AUTO_INCREMENT NOT NULL,
    user_id INT(11) NOT NULL,
    name VARCHAR(60) NOT NULL,
    color VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_tasks PRIMARY KEY(id),
    CONSTRAINT fk_user_category_tasks FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS tasks(
    id INT(11) AUTO_INCREMENT NOT NULL,
    user_id INT(11) NOT NULL,
    category_id INT(11) NOT NULL,
    description VARCHAR(35),
    for_ DATE NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,

    CONSTRAINT pk_tasks PRIMARY KEY(id),
    CONSTRAINT fk_user_tasks FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_category_tasks FOREIGN KEY(category_id) REFERENCES category_tasks(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=INNODB;