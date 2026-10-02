<?php
/* La portada cambia sola de vestido según la fecha en Monterrey.

   Del 15 de octubre al 3 de noviembre (inclusive) se sirve la versión de
   Día de Muertos; el resto del año, la normal. Se repite cada año sin
   tocar nada. La dirección siempre es "/", así que Google no ve dos
   páginas: las dos versiones declaran el mismo canonical.

   No hay vista previa a propósito: la versión de temporada no se ve
   antes de su fecha. Para revisarla, abrir el .html en local.          */

date_default_timezone_set('America/Monterrey');

$temporadas = [
  // [desde MMDD, hasta MMDD, archivo]
  ['1015', '1103', 'index-dia-de-muertos.html'],
];

$archivo = 'index.html';
$hoy = date('md');
foreach ($temporadas as [$desde, $hasta, $pagina]) {
  if ($hoy >= $desde && $hoy <= $hasta) { $archivo = $pagina; }
}

header('Content-Type: text/html; charset=UTF-8');
// sin caché larga: el día del cambio nadie debe quedarse con la versión anterior
header('Cache-Control: no-cache, must-revalidate');
readfile(__DIR__ . '/' . $archivo);
