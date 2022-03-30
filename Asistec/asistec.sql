-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2021 a las 00:28:52
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumno` int(11) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `dni` int(8) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `nrotarjeta` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `genero_alumn` varchar(10) NOT NULL,
  `aniolectivo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumno`, `apellido`, `nombre`, `dni`, `fechanacimiento`, `nrotarjeta`, `foto`, `Email`, `genero_alumn`, `aniolectivo`) VALUES
(1, 'soto', 'Mateo', 44779311, '2000-01-01', 2147483647, 'hombre (1).png', 'So.mateo2003@gmail.com', 'hombre', '2021'),
(2, 'Aguirre', 'Ulises', 16134616, '2000-01-01', 1122334422, 'hombre (1).png', 'ulisesAguirre@gmail.com', 'hombre', '2021'),
(3, 'Pereyra', 'Emanuel', 24727272, '2000-01-01', 1361161613, 'hombre (1).png', 'Emanuel@gmail.com', 'hombre', '2021'),
(4, 'Sandoval', 'Melissa', 62462626, '2000-01-01', 2147483647, 'mujer.png', 'Melissa@gmail.com', 'mujer', '2021'),
(5, 'Juarez', 'Samuel', 16161466, '2000-01-01', 2147483647, 'hombre (1).png', 'SamuleJuarez@gmail.com', 'hombre', '2021'),
(6, 'MEROSOSIAIN', 'JUAN', 49568989, '1999-09-02', 2147483647, 'hombre (3).png', 'merososia@gmail.com', 'hombre', '2021'),
(7, 'Gonzalez Garcia', 'Eusebio', 47474949, '1997-06-15', 2147483647, 'hombre (3).png', 'egg@gmai.com', 'hombre', '2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnosxcurso`
--

CREATE TABLE `alumnosxcurso` (
  `idcurso` int(11) NOT NULL,
  `nrogrupo` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnosxcurso`
--

INSERT INTO `alumnosxcurso` (`idcurso`, `nrogrupo`, `idalumno`) VALUES
(25, 1, 6),
(25, 1, 7),
(25, 2, 1),
(25, 2, 2),
(25, 2, 3),
(25, 2, 4),
(25, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnosxmaterias`
--

CREATE TABLE `alumnosxmaterias` (
  `idalumno` int(11) NOT NULL,
  `idmateria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `fecha` date NOT NULL,
  `idturno` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `idestadoasistencia` int(11) NOT NULL,
  `idusuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`fecha`, `idturno`, `idalumno`, `observaciones`, `idestadoasistencia`, `idusuario`) VALUES
('2021-09-04', 2, 1, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-04', 2, 2, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-04', 2, 3, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-04', 2, 4, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-04', 2, 5, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-04', 3, 1, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-04', 3, 2, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-04', 3, 3, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-04', 3, 4, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-04', 3, 5, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-05', 2, 1, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-05', 2, 2, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-05', 2, 3, 'El alumno llego tarde', 2, 'AI'),
('2021-09-05', 2, 4, 'El alumno estuvo ausente', 3, 'AI'),
('2021-09-05', 2, 5, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-17', 2, 6, 'El alumno llego a tiempo', 1, 'AI'),
('2021-09-17', 3, 6, 'El alumno llego a tiempo', 1, 'AI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciacomedor`
--

CREATE TABLE `asistenciacomedor` (
  `fechacomedor` date NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idestadoasistencia` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `aniolectivo` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `division` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `aniolectivo`, `anio`, `division`) VALUES
(1, 2020, 1, 'A'),
(2, 2020, 1, 'B'),
(3, 2020, 1, 'C'),
(4, 2020, 1, 'D'),
(5, 2020, 2, 'A'),
(6, 2020, 2, 'B'),
(8, 2020, 2, 'D'),
(9, 2020, 2, 'C'),
(10, 2020, 3, 'A'),
(11, 2020, 3, 'B'),
(12, 2020, 3, 'C'),
(13, 2020, 3, 'D'),
(14, 2020, 4, '1'),
(15, 2020, 4, '2'),
(16, 2020, 4, '3'),
(17, 2020, 4, '4'),
(18, 2020, 5, '1'),
(19, 2020, 5, '2'),
(20, 2020, 5, '3'),
(21, 2020, 5, '4'),
(22, 2020, 6, '1'),
(23, 2020, 6, '2'),
(25, 2020, 7, '2'),
(26, 2021, 7, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursosxturno`
--

CREATE TABLE `cursosxturno` (
  `idturno` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursosxturno`
--

INSERT INTO `cursosxturno` (`idturno`, `idcurso`) VALUES
(1, 1),
(2, 1),
(2, 25),
(3, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosasistencia`
--

CREATE TABLE `estadosasistencia` (
  `idestadoasistencia` int(11) NOT NULL,
  `nombreestadoasistencia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadosasistencia`
--

INSERT INTO `estadosasistencia` (`idestadoasistencia`, `nombreestadoasistencia`) VALUES
(1, 'Presente'),
(2, 'tarde'),
(3, 'Ausente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposxcurso`
--

CREATE TABLE `gruposxcurso` (
  `idcurso` int(11) NOT NULL,
  `nrogrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gruposxcurso`
--

INSERT INTO `gruposxcurso` (`idcurso`, `nrogrupo`) VALUES
(1, 2),
(1, 7),
(2, 1),
(25, 1),
(25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitadoscomedor`
--

CREATE TABLE `habilitadoscomedor` (
  `idalumno` int(11) NOT NULL,
  `nrodiasemana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitadostemporalmente`
--

CREATE TABLE `habilitadostemporalmente` (
  `idalumno` int(11) NOT NULL,
  `fechacomedor` date NOT NULL,
  `idusuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombremateria` varchar(200) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `nrogrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombremateria`, `idcurso`, `nrogrupo`) VALUES
(2, 'Hardware', 1, 2),
(3, 'Hardware', 1, 1),
(4, 'Redes', 25, 1),
(5, 'Redes', 25, 2),
(6, 'Programacion', 25, 1),
(7, 'Programacion', 25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensaje` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `encabezado` varchar(150) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `idusuarioemisor` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idusuarioreceptor` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensaje`, `fecha`, `encabezado`, `mensaje`, `idusuarioemisor`, `idusuarioreceptor`) VALUES
(1, '2021-08-27 00:47:25', 'Asistencia', 'Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'lector', 'AI'),
(2, '2021-08-27 01:11:31', 'prueba', 'sarasa', 'AI', 'JORGE'),
(3, '2021-08-27 01:16:59', 'asda', 'asdasda', 'AI', 'JORGE'),
(4, '2021-08-27 01:30:13', 'Mateo FEO', 'asdasdasdas', 'ai', 'AI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menues`
--

CREATE TABLE `menues` (
  `idmenu` int(11) NOT NULL,
  `nombremenu` varchar(200) NOT NULL,
  `nombremenuPC` varchar(200) NOT NULL,
  `nombremenuWEB` varchar(200) NOT NULL,
  `nombremenuMovil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menues`
--

INSERT INTO `menues` (`idmenu`, `nombremenu`, `nombremenuPC`, `nombremenuWEB`, `nombremenuMovil`) VALUES
(1, 'FILE', 'fileMenu', '', ''),
(2, 'EXIT', 'exitToolStripMenuItem', '', ''),
(3, 'ADMINISTRACION', 'administraciónToolStripMenuItem', '', ''),
(4, 'ADMINISTRACIÓN DE CURSO', 'cursosToolStripMenuItem1', '', ''),
(5, 'ELEGIR CICLO LECTIVO', 'elegirCicloLectivoToolStripMenuItem', '', ''),
(6, 'CURSO', 'cursosToolStripMenuItem', '', ''),
(7, 'CARGAR ALUMNOS', 'cargaDeAlumnosToolStripMenuItem', '', ''),
(8, 'TOMAR ASISTENCIA', 'asistenciaToolStripMenuItem', '', ''),
(9, 'CONSULTAS', 'consultasToolStripMenuItem', '', ''),
(10, 'CONSULTA DE ASISTENCIA', 'asistenciaToolStripMenuItem1', '', ''),
(11, 'CAMBIAR DE CONTRASEÑA', 'cambiarContraseñaToolStripMenuItem', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuesxperfil`
--

CREATE TABLE `menuesxperfil` (
  `idperfil` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menuesxperfil`
--

INSERT INTO `menuesxperfil` (`idperfil`, `idmenu`) VALUES
(1, 1),
(1, 2),
(1, 11),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 11),
(3, 1),
(3, 2),
(3, 11),
(4, 1),
(4, 2),
(4, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL,
  `nota1ertrimestre` double NOT NULL,
  `nota2ertrimestre` double NOT NULL,
  `nota3ertrimestre` double NOT NULL,
  `promedio` double NOT NULL,
  `idusuario` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idalumno` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnotas`, `nota1ertrimestre`, `nota2ertrimestre`, `nota3ertrimestre`, `promedio`, `idusuario`, `idalumno`, `id_materia`, `borrado`) VALUES
(1, 0, 0, 0, 0, 'JORGE', 1, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idperfil` int(11) NOT NULL,
  `nombreperfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idperfil`, `nombreperfil`) VALUES
(1, 'PRECEPTOR'),
(2, 'DIRECTIVO'),
(3, 'EOE'),
(4, 'PROFESOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `idsession` bigint(20) NOT NULL,
  `idusuario` varchar(100) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(8) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `apenom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `idturno` int(11) NOT NULL,
  `nombreturno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`idturno`, `nombreturno`) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Vespertino\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` varchar(100) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `apellido`, `nombre`, `idperfil`, `pwd`) VALUES
('AI', 'IRASTORZA', 'ALEJANDRO', 1, 'skqpyurialyuwowodjeiyueiqpqp'),
('BG', 'ROBERTO', 'BOGGIO', 2, 'skqpyurialyuwowodjeiyueiqpqp'),
('JORGE', 'BARMAT', 'JORGITO', 4, 'skqpyurialyuwowodjeiyueiqpqp'),
('lector', 'lector', 'aula1', 1, 'skqpyurialyuwowodjeiyueiqpqp'),
('MS', 'SOTO', 'MATEO', 2, 'skqpyurialyuwowodjeiyueiqpqp'),
('PEPE', 'PICAFLOR', 'PEDRO', 4, 'skqpyurialyuwowodjeiyueiqpqp'),
('VM', 'NOMEACUERDO', 'PRUEBA', 3, 'skqpyurialyuwowodjeiyueiqpqp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosxcurso`
--

CREATE TABLE `usuariosxcurso` (
  `idusuario` varchar(100) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariosxcurso`
--

INSERT INTO `usuariosxcurso` (`idusuario`, `idcurso`) VALUES
('AI', 1),
('AI', 2),
('AI', 20),
('AI', 25),
('JORGE', 1),
('JORGE', 20),
('JORGE', 25),
('PEPE', 1),
('PEPE', 19),
('PEPE', 23),
('PEPE', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosxmaterias`
--

CREATE TABLE `usuariosxmaterias` (
  `idusuario` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosxmaterias`
--

INSERT INTO `usuariosxmaterias` (`idusuario`, `idmateria`) VALUES
('JORGE', 6),
('JORGE', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumno`) USING BTREE;

--
-- Indices de la tabla `alumnosxcurso`
--
ALTER TABLE `alumnosxcurso`
  ADD PRIMARY KEY (`idcurso`,`nrogrupo`,`idalumno`),
  ADD KEY `axc_alumnos` (`idalumno`);

--
-- Indices de la tabla `alumnosxmaterias`
--
ALTER TABLE `alumnosxmaterias`
  ADD PRIMARY KEY (`idalumno`,`idmateria`) USING BTREE,
  ADD KEY `materiasxalumnos` (`idmateria`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`fecha`,`idturno`,`idalumno`),
  ADD KEY `ASIST_alumnos` (`idalumno`),
  ADD KEY `ASIST_turnos` (`idturno`),
  ADD KEY `ASIST_estadosasistencia` (`idestadoasistencia`),
  ADD KEY `ASIST_usuarios` (`idusuario`);

--
-- Indices de la tabla `asistenciacomedor`
--
ALTER TABLE `asistenciacomedor`
  ADD PRIMARY KEY (`fechacomedor`,`idalumno`),
  ADD KEY `ASISTCOM_alumnos` (`idalumno`),
  ADD KEY `ASISTCOM_estadosasistencia` (`idestadoasistencia`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `cursosxturno`
--
ALTER TABLE `cursosxturno`
  ADD PRIMARY KEY (`idturno`,`idcurso`),
  ADD KEY `cursos` (`idcurso`);

--
-- Indices de la tabla `estadosasistencia`
--
ALTER TABLE `estadosasistencia`
  ADD PRIMARY KEY (`idestadoasistencia`);

--
-- Indices de la tabla `gruposxcurso`
--
ALTER TABLE `gruposxcurso`
  ADD PRIMARY KEY (`idcurso`,`nrogrupo`);

--
-- Indices de la tabla `habilitadoscomedor`
--
ALTER TABLE `habilitadoscomedor`
  ADD PRIMARY KEY (`idalumno`,`nrodiasemana`);

--
-- Indices de la tabla `habilitadostemporalmente`
--
ALTER TABLE `habilitadostemporalmente`
  ADD PRIMARY KEY (`idalumno`,`fechacomedor`),
  ADD KEY `HT_usuarios` (`idusuario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`,`idcurso`,`nrogrupo`) USING BTREE,
  ADD KEY `CXM_cursos` (`idcurso`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensaje`),
  ADD KEY `id_emisormensaje` (`idusuarioemisor`),
  ADD KEY `id_receptormensaje` (`idusuarioreceptor`);

--
-- Indices de la tabla `menues`
--
ALTER TABLE `menues`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `menuesxperfil`
--
ALTER TABLE `menuesxperfil`
  ADD PRIMARY KEY (`idperfil`,`idmenu`),
  ADD KEY `MNUXP_menues` (`idmenu`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnotas`) USING BTREE,
  ADD KEY `usuarioxnotas` (`idusuario`),
  ADD KEY `alumnoxnotas` (`idalumno`),
  ADD KEY `materiasxnotas` (`id_materia`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`idsession`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idturno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `USU_perfiles` (`idperfil`);

--
-- Indices de la tabla `usuariosxcurso`
--
ALTER TABLE `usuariosxcurso`
  ADD PRIMARY KEY (`idusuario`,`idcurso`),
  ADD KEY `UXC_cursos` (`idcurso`);

--
-- Indices de la tabla `usuariosxmaterias`
--
ALTER TABLE `usuariosxmaterias`
  ADD PRIMARY KEY (`idusuario`,`idmateria`),
  ADD KEY `materias` (`idmateria`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnosxcurso`
--
ALTER TABLE `alumnosxcurso`
  ADD CONSTRAINT `axc_alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `axc_gruposxcurso` FOREIGN KEY (`idcurso`,`nrogrupo`) REFERENCES `gruposxcurso` (`idcurso`, `nrogrupo`);

--
-- Filtros para la tabla `alumnosxmaterias`
--
ALTER TABLE `alumnosxmaterias`
  ADD CONSTRAINT `alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`),
  ADD CONSTRAINT `materiasxalumnos` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`id_materia`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `ASIST_alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ASIST_estadosasistencia` FOREIGN KEY (`idestadoasistencia`) REFERENCES `estadosasistencia` (`idestadoasistencia`),
  ADD CONSTRAINT `ASIST_turnos` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`),
  ADD CONSTRAINT `ASIST_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistenciacomedor`
--
ALTER TABLE `asistenciacomedor`
  ADD CONSTRAINT `ASISTCOM_alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`),
  ADD CONSTRAINT `ASISTCOM_estadosasistencia` FOREIGN KEY (`idestadoasistencia`) REFERENCES `estadosasistencia` (`idestadoasistencia`);

--
-- Filtros para la tabla `cursosxturno`
--
ALTER TABLE `cursosxturno`
  ADD CONSTRAINT `cursos` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  ADD CONSTRAINT `turnos` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`);

--
-- Filtros para la tabla `gruposxcurso`
--
ALTER TABLE `gruposxcurso`
  ADD CONSTRAINT `GxC_cursos` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`);

--
-- Filtros para la tabla `habilitadoscomedor`
--
ALTER TABLE `habilitadoscomedor`
  ADD CONSTRAINT `HC_alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`);

--
-- Filtros para la tabla `habilitadostemporalmente`
--
ALTER TABLE `habilitadostemporalmente`
  ADD CONSTRAINT `HT_alumnos` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`),
  ADD CONSTRAINT `HT_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `CXM_cursos` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `id_emisormensaje` FOREIGN KEY (`idusuarioemisor`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `id_receptormensaje` FOREIGN KEY (`idusuarioreceptor`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `menuesxperfil`
--
ALTER TABLE `menuesxperfil`
  ADD CONSTRAINT `MNUXP_menues` FOREIGN KEY (`idmenu`) REFERENCES `menues` (`idmenu`),
  ADD CONSTRAINT `MNUXP_perfiles` FOREIGN KEY (`idperfil`) REFERENCES `perfiles` (`idperfil`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `alumnoxnotas` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`),
  ADD CONSTRAINT `materiasxnotas` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `usuarioxnotas` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `USU_perfiles` FOREIGN KEY (`idperfil`) REFERENCES `perfiles` (`idperfil`);

--
-- Filtros para la tabla `usuariosxcurso`
--
ALTER TABLE `usuariosxcurso`
  ADD CONSTRAINT `UXC_cursos` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  ADD CONSTRAINT `UXC_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariosxmaterias`
--
ALTER TABLE `usuariosxmaterias`
  ADD CONSTRAINT `materias` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
