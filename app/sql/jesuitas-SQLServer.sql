CREATE TABLE jesuita (
    idJesuita SMALLINT NOT NULL PRIMARY KEY IDENTITY,
    codigo CHAR(60) NULL, 
    nombre VARCHAR(50) NOT NULL,
    nombreAlumno VARCHAR(100) NOT NULL,
    firma VARCHAR(300) NOT NULL,
    firmaIngles VARCHAR(300) NOT NULL
);

CREATE TABLE lugar (
    ip CHAR(15) NOT NULL PRIMARY KEY,
    nombre_maquina CHAR(12) NOT NULL,
    lugar VARCHAR(30) NOT NULL
);

CREATE TABLE visita (
    idVisita SMALLINT NOT NULL PRIMARY KEY IDENTITY,
    idJesuita SMALLINT NOT NULL,
    ip CHAR(15) NOT NULL,
    fechaHora DATETIME NOT NULL DEFAULT GETDATE(),
    CONSTRAINT FK_Lugar_Visita FOREIGN KEY (ip) REFERENCES lugar(ip),
    CONSTRAINT FK_Jesuita_Visita FOREIGN KEY (idJesuita) REFERENCES jesuita(idJesuita)
);

insert into jesuita (codigo, nombre, nombreAlumno, firma, firmaIngles)
values 
	('$2y$10$bXAtXQVm/8YNxnyPWxRDwuI9MF0s5IeSNc2s2z.Q87QS2dluWg0lW', 'San Ignacio de Loyola', 'Eduardo', 'Me hice jesuita porque me gusta servir al prójimo', 'I became a Jesuit because I like to serve others'),
	('$2y$10$pJNopVQgZdt1vqgcIdxOeOStmt/.vOfeVm8IbXFFS7E/0h5WRB2ea', 'San Francisco Javier', 'Carlos', 'Llevar la fe a todos los rincones del mundo', 'Bring faith to every corner of the world'),
	('$10$1B04IYHG8E08ehlDn6/aP.RtecbbF4JyX7p0POo9/9KekdrDH.GSO', 'Matteo Ricci', 'Francisco', 'El conocimiento y la fe pueden ir de la mano', 'Knowledge and faith can go hand in hand'),
	('$2y$10$NYiPQefLxNr/HAK.XAoJauFQzU5ceLeU8L5JyxzVK3p/ADlJkKama', 'Pedro Arrupe', 'Adrián', 'Ser hombres para los demás', 'Be men for others');


INSERT INTO lugar
VALUES
    ('10.3.13.101', 'WIN-AI43-001', 'Badajoz'),
    ('10.3.13.102', 'WIN-AI43-002', 'Sevilla'),
    ('10.3.13.103', 'WIN-AI43-003', 'Córdoba'),
    ('10.3.13.104', 'WIN-AI43-004', 'Granada'),
    ('10.3.13.105', 'WIN-AI43-005', 'Málaga'),
    ('10.3.13.106', 'WIN-AI43-006', 'Almería'),
    ('10.3.13.107', 'WIN-AI43-007', 'Huelva'),

    ('10.2.8.201', 'LNX-UB12-001', 'Cáceres'),
    ('10.2.8.202', 'LNX-UB12-002', 'Salamanca'),
    ('10.2.8.203', 'LNX-UB12-003', 'León'),
    ('10.2.8.204', 'LNX-UB12-004', 'Burgos'),
    ('10.2.8.205', 'LNX-UB12-005', 'Zamora'),

    ('25.2.8.301', 'WIN-XP35-001', 'Mérida'),
    ('25.2.8.302', 'WIN-XP35-002', 'Toledo'),
    ('25.2.8.303', 'WIN-XP35-003', 'Valladolid'),
    ('25.2.8.304', 'WIN-XP35-004', 'Segovia'),
    ('25.2.8.305', 'WIN-XP35-005', 'Cuenca');
	
INSERT INTO visita (idJesuita, ip) VALUES
    (1, '10.3.13.101'), 
	(2, '10.3.13.102'), 
	(3, '10.3.13.103'), 
	(4, '10.3.13.104'),
    (1, '10.3.13.105'), 
	(2, '10.3.13.106'), 
	(3, '10.3.13.107'), 
	(4, '10.2.8.201'),
    (1, '10.2.8.202'), 
	(2, '10.2.8.203'), 
	(3, '10.2.8.204'), 
	(4, '10.2.8.205'),
    (1, '25.2.8.301'), 
	(2, '25.2.8.302'), 
	(3, '25.2.8.303'), 
	(4, '25.2.8.304'),
    (1, '25.2.8.305'), 
	(2, '10.3.13.101'), 
	(3, '10.3.13.102'), 
	(4, '10.3.13.103'),
    (1, '10.3.13.104'), 
	(2, '10.3.13.105'), 
	(3, '10.3.13.106'), 
	(4, '10.3.13.107'),
    (1, '10.2.8.201'), 
	(2, '10.2.8.202'), 
	(3, '10.2.8.203'), 
	(4, '10.2.8.204'),
    (1, '10.2.8.205'), 
	(2, '25.2.8.301'), 
	(3, '25.2.8.302'), 
	(4, '25.2.8.303'),
    (1, '25.2.8.304'), 
	(2, '25.2.8.305');
