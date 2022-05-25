DROP TABLE IF EXISTS chercheurs,informations,conferences,evenements,journaux,publications;

CREATE TABLE chercheurs (
    id SERIAL,
    prenom VARCHAR(32) NOT NULL,
    nom VARCHAR(32) NOT NULL,
    jour INT NOT NULL,
    mois INT NOT NULL,
    annee INT NOT NULL,
    pays VARCHAR(32) NOT NULL,
    ville VARCHAR(64) NOT NULL,
    adresse VARCHAR(256) NOT NULL,
    tel VARCHAR(16) NOT NULL,
    email VARCHAR(64),
    travail VARCHAR(32) NOT NULL,
    grade VARCHAR(32) NOT NULL,
    affiliation VARCHAR(32) NOT NULL,
    biographie TEXT NOT NULL,
    thematique VARCHAR(32) NOT NULL,
    cv VARCHAR(256) NOT NULL,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT into chercheurs VALUES(DEFAULT,'Raven','Galura',20,08,2000,'France','Clichy','4 rue du professeur René Lericher','0760065990','raven.galura@outlook.com','Developpeur web','Débutant','Université','Je suis un des créateur du site','informatique','content/cv/cv_raven_galura.pdf','raveng','$2y$10$chCIETqCyiBfsV1mrO7H4e2/ri9o6rAy0qDKQhaERR5iAZATUrjAe');

CREATE TABLE informations(
    id SERIAL,
    titre VARCHAR(256) NOT NULL,
    contenu TEXT,
    image VARCHAR(256) NOT NULL
);

INSERT into informations VALUES(DEFAULT,'Galaxie',"Une galaxie est un assemblage d'étoiles, de gaz, de poussières, de vide et peut-être essentiellement de matière noire, contenant parfois un trou noir supermassif en son centre.",'content/img/galaxie.jpg');
INSERT into informations VALUES(DEFAULT,'Intelligence artificielle',"L'intelligence artificielle (IA) est « l'ensemble des théories et des techniques mises en œuvre en vue de réaliser des machines capables de simuler l'intelligence humaine ».",'content/img/intelligence_artificielle.jpg');
INSERT into informations VALUES(DEFAULT,'Lune',"La Lune, dite aussi Terre I, est l'unique satellite naturel permanent de la planète Terre. Il s'agit du cinquième plus grand satellite naturel du Système solaire, et du plus grand des satellites planétaires par rapport à la taille de la planète autour de laquelle il orbite. Elle est le deuxième satellite le plus dense du Système solaire après Io, un satellite de Jupiter.",'content/img/lune.jpg');
INSERT into informations VALUES(DEFAULT,'Mars',"Mars (prononcé en français : /maʁs/) est la quatrième planète du Système solaire par ordre croissant de la distance au Soleil et la deuxième par ordre croissant de la taille et de la masse. Son éloignement au Soleil est compris entre 1,381 et 1,666 UA (206,6 à 249,2 millions de kilomètres), avec une période orbitale de 669,58 jours martiens (686,71 jours ou 1,88 année terrestre).",'content/img/mars.jpg');
INSERT into informations VALUES(DEFAULT,'Nasa',"La National Aeronautics and Space Administration (en français : « Administration nationale de l'aéronautique et de l'espace »), plus connue sous son acronyme NASA, est l'agence fédérale responsable de la majeure partie du programme spatial civil des États-Unis. La recherche aéronautique relève également du domaine de la NASA. Depuis sa création le 29 juillet 1958, la NASA joue mondialement un rôle dominant dans le domaine du vol spatial habité, de l'exploration du Système solaire et de la recherche spatiale. Parmi les réalisations les plus marquantes de l'agence figurent les programmes spatiaux habités Apollo, la navette spatiale américaine, la Station spatiale internationale (en coopération avec plusieurs pays), les télescopes spatiaux comme Hubble et Kepler, l'exploration de Mars par les sondes spatiales Viking, Mars Exploration Rover et Curiosity, ainsi que celle de Jupiter, Saturne et Pluton par les sondes Pioneer, Voyager, Galileo, Cassini-Huygens et New Horizons.",'content/img/nasa.jpg');

CREATE TABLE evenements(
    id SERIAL,
    nom VARCHAR(256) NOT NULL,
    date DATE
);

INSERT into evenements VALUES(DEFAULT,'Réunion de la Commission Histoire de l’Astronomie','2022-04-02');
INSERT into evenements VALUES(DEFAULT,'Réunion de la Commission des Cadrans solaires','2022-04-29');

CREATE TABLE conferences(
    id SERIAL,
    titre VARCHAR(256) NOT NULL,
    abreviation VARCHAR(16) NOT NULL,
    sujet VARCHAR(256) NOT NULL,
    date DATE,
    date_limite DATE,
    conferencier VARCHAR(64) NOT NULL,
    lieu VARCHAR(128) NOT NULL
);

INSERT into conferences VALUES(DEFAULT,'International Conference on Knowledge Capture','K-CAP','capture des connaissances','2023-12-01','2022-06-15','Jose Manuel Gomez-Perez','Californie');
INSERT into conferences VALUES(DEFAULT,'International Conferences on Conceptual Structures','ICCS',"intelligence artificielle, cognition humaine, linguistique computatio nnelle et domaines connexes de l'informatiq ue et des sciences cognitives",'2022-09-12','2022-03-25','Tanya Braun','Munster');
INSERT into conferences VALUES(DEFAULT,'Société astronomique de france','SAF','Les débris spatiaux','2022-04-13','2022-04-10','Christophe Bonnal','Paris');

CREATE TABLE journaux(
    id SERIAL,
    titre VARCHAR(256) NOT NULL,
    isbn VARCHAR(32) NOT NULL,
    editeur VARCHAR(32) NOT NULL,
    theme VARCHAR(32) NOT NULL
);

INSERT into journaux VALUES(DEFAULT,'Knowledge-Based Systems','9780763776473','Jie lu','Intelligence artificielle');

CREATE TABLE publications(
    id SERIAL,
    auteur VARCHAR(64),
    titre VARCHAR(256),
    date DATE
);

INSERT into publications VALUES(DEFAULT,'Elias Aliche','Polymérisation des cartes Yu Gi Oh!','2022-05-05');