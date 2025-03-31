
-- 1- Muestra las visitas con el nombre del jesuita que las has realizado.

	SELECT * FROM visita
	INNER JOIN jesuita ON visita.idJesuita = jesuita.idJesuita
	WHERE jesuita.nombre = 'Matteo Ricci'; -- Nombre del jesuita

-- 2- Muestra todas las visitas con el nombre del jesuita que las ha realizado y el nombre (lugar) de lugar visitado.

	SELECT jesuita.nombre, lugar.lugar
	FROM visita
	INNER JOIN lugar ON visita.ip = lugar.ip
	INNER JOIN jesuita ON visita.idJesuita = jesuita.idJesuita;

-- 3- Añade un jesuita nuevo. Este jesuita no va a realizar ninguna visita.

	INSERT INTO jesuita (codigo, nombre, nombreAlumno, firma, firmaIngles)
	VALUES 
		('ABC05', 'Baltasar Gracián', 'Fernando José', 'La prudencia es la guía de la vida', 'Prudence is the guide of life');

-- 4- Añade 2 lugares nuevos. Estos lugares no se van a visitar.

	INSERT INTO lugar
	VALUES	
		('25.2.8.306', 'WIN-XP35-004', 'Montijo'),
		('25.2.8.307', 'WIN-XP35-005', 'Trujillo');

-- 5- Muestra todos los jesuitas con el nombre del lugar que han visitado. Si algún jesuita no ha realizado visita, 
-- también habrá que visualizar sus datos, mira que ocurre con el valor del campo lugar en estos casos. Realiza 2 versiones 
-- de la misma consulta, una usando LEFT y otra usando RIGHT.

	SELECT jesuita.nombre, lugar.lugar
	FROM visita
	LEFT JOIN lugar ON visita.ip = lugar.ip
	LEFT JOIN jesuita ON visita.idJesuita = jesuita.idJesuita;

-- Se muestra a NULL el campo lugar cuando el jesuita no ha hecho ninguna visita
	SELECT jesuita.nombre, lugar.lugar
	FROM visita
	RIGHT JOIN lugar ON visita.ip = lugar.ip
	RIGHT JOIN jesuita ON visita.idJesuita = jesuita.idJesuita;

-- 6- Muestra todos los lugares con el nombre del jesuita que realiza la visitada. Si algún lugar no se ha visitado, también 
-- habrá que visualizar sus datos ´mira que ocurre con el valor del campo nombre (jesuita) en estos casos.

-- El campo nombre aparece como NULL en los lugares donde no ha visitado;
	SELECT lugar.lugar, jesuita.nombre
	FROM lugar
	LEFT JOIN visita ON lugar.ip = visita.ip 
	LEFT JOIN jesuita ON visita.idJesuita = jesuita.idJesuita
	WHERE visita.idJesuita = 2 OR visita.idJesuita IS NULL;

-- 7- Mirando los resultado de la consulta anterior, intenta mostrar solo los lugares que NO se han visitado (es la consulta 
-- anterior con una condición).

	SELECT lugar.lugar, jesuita.nombre
	FROM visita
	RIGHT JOIN lugar ON visita.ip = lugar.ip 
	RIGHT JOIN jesuita ON visita.idJesuita = jesuita.idJesuita AND jesuita.idJesuita = 2
	WHERE  lugar.lugar IS NULL;

-- 8- Muestra todos los jesuitas con el nombre del lugar que han visitado. Si algún jesuita no ha realizado visita, también 
-- habrá que visualizar sus datos y si algún lugar no se ha visitado también se muestra su nombre (lugar). Realiza esta consulta 
-- en 2 pasos y ve comprobado qué ocurre al hacer el JOIN.

	-- Usando union y empezando de lugar y jesuita en dos consultas.
	
	SELECT lugar.lugar, jesuita.nombre
	FROM lugar
	LEFT JOIN visita ON lugar.ip = visita.ip
	LEFT JOIN jesuita ON visita.idJesuita = jesuita.idJesuita

	UNION

	SELECT lugar.lugar, jesuita.nombre
	FROM jesuita
	LEFT JOIN visita ON jesuita.idJesuita = visita.idJesuita
	LEFT JOIN lugar ON visita.ip = lugar.ip;
	
	-- Usando full JOIN
	
	SELECT lugar.lugar, jesuita.nombre
	FROM visita
	FULL JOIN lugar ON visita.ip = lugar.ip
	FULL JOIN jesuita ON visita.idJesuita = jesuita.idJesuita;

--Consultas con DISTINCT:
-- 9- Muestra el nombre de los jesuitas que han realizado alguna visitas (no hay que mostrar ningún dato más de la visita).

	SELECT DISTINCT jesuita.nombre
	FROM jesuita 
	INNER JOIN visita ON visita.idJesuita = jesuita.idJesuita;

-- 10- Piensa otra consulta diferente con DISTINCT (con la misma base de datos).

	-- Lugares que han sido visitados
	SELECT DISTINCT lugar.lugar
	FROM lugar 
	INNER JOIN visita ON visita.ip = lugar.ip;

	
-- Consultas para probar los operadores de la cláusula WHERE:

-- Busca una necesidad de consultas con la base de datos jesuitas y usa cada uno de los operadores. Tienes que poner los enunciados y también la solución.
	-- AND
		
		
	-- OR
		SELECT * FROM visita
		WHERE ip = '10.3.13.101' OR ip = '10.2.8.203';
	
	-- NOT
	
	
	-- IN
	
	-- BETWEEN
		-- Mostrar los lugares con un rango de ip. 
		SELECT *
		FROM lugar 
		WHERE ip BETWEEN '10.2.8.201' AND '10.2.8.205';

-- Busca en Internet el operador LIKE y realiza las siguientes consultas:
  -- * Lugares con IP que terminen en  (completa el enunciado según tus datos).
		
	SELECT *
	FROM lugar
	WHERE ip like '%25.2.%';
  
  -- * Jesuitas que sean santos (comienzan por la palabra San ).
  
	SELECT * FROM jesuita 
	WHERE nombre LIKE 'San%';
	
  -- * Otras consultas con LIKE (pueden ser de 2 o 3 tablas).
	
	-- Las visitas que se realizaron a maquinas con sistema operativo Linux (LNX)
	SELECT jesuita.nombre, lugar.lugar
	FROM visita
	INNER JOIN jesuita ON jesuita.idJesuita = visita.idJesuita
	INNER JOIN lugar ON lugar.ip = visita.ip
	WHERE lugar.nombre_maquina LIKE 'LNX%';

-- Todos los operadores se pueden negar, menos el IS (ya que se preguntaría por NOT NULL). Realiza consultas negando estos operadores, de nuevo tienes que poner los enunciados con su solución.


