<?php
/* La portada cambia sola de vestido según la fecha en Monterrey.

   Cada temporada se sirve en sus fechas (inclusive) y el resto del año la
   portada normal. Se repite cada año sin tocar nada. La dirección siempre
   es "/", así que Google no ve páginas distintas: todas las versiones
   declaran el mismo canonical.

   Una temporada puede cruzar de un año a otro (Navidad: 1 de diciembre al
   6 de enero): si "desde" es mayor que "hasta", vale de "desde" a fin de
   año y de inicio de año a "hasta".

   No hay vista previa a propósito: una versión de temporada no se ve
   antes de su fecha. Para revisarla, abrir el .html en local.          */

date_default_timezone_set('America/Monterrey');

$temporadas = [
  // [desde MMDD, hasta MMDD, archivo]
  ['1015', '1103', 'index-dia-de-muertos.html'],
  ['1201', '0106', 'index-navidad.html'],
  ['0201', '0214', 'index-san-valentin.html'],
];

$archivo = 'index.html';
$hoy = date('md');
foreach ($temporadas as [$desde, $hasta, $pagina]) {
  $dentro = ($desde <= $hasta)
    ? ($hoy >= $desde && $hoy <= $hasta)
    : ($hoy >= $desde || $hoy <= $hasta);
  if ($dentro) { $archivo = $pagina; }
}

header('Content-Type: text/html; charset=UTF-8');
// sin caché larga: el día del cambio nadie debe quedarse con la versión anterior
header('Cache-Control: no-cache, must-revalidate');
readfile(__DIR__ . '/' . $archivo);
