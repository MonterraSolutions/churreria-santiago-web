# Reglas del sitio · La Churrería Santiago

## Las cuatro páginas siempre van iguales en contenido

El sitio tiene una página normal y tres versiones de temporada:

| Archivo | Cuándo se ve |
|---|---|
| `index.html` | El resto del año (la página original) |
| `index-san-valentin.html` | 1 de febrero al fin de febrero |
| `index-dia-de-muertos.html` | 15 de octubre al 15 de noviembre |
| `index-navidad.html` | 16 de noviembre al 31 de diciembre |

`index.php` elige cuál mostrar según la fecha. Es automático y no hay que tocarlo.

**Regla:** cualquier cambio en el menú o en los datos del negocio se hace en las
cuatro páginas. Cada vez que se cambie algo en `index.html`, se aplica el mismo
cambio en las tres versiones de temporada, en el mismo commit.

Esto incluye:

- Menú: platillos, precios, descripciones, notas y el PDF de la carta.
- Horarios: el horario de la sección Ubicación, el del pie de página y el de los
  datos estructurados (`openingHoursSpecification`).
- Teléfono, WhatsApp, correo, dirección y redes sociales.
- Textos de la historia, del inicio y del pie de página.
- Datos para Google: título, descripción, `canonical` y datos estructurados.

Lo único que cambia entre versiones es la decoración de la temporada (colores,
papel picado, esferas, corazones, animaciones). El contenido es el mismo.

Antes de subir, revisa que no quede nada viejo. Por ejemplo, después de cambiar un
precio, busca el precio anterior en los cuatro archivos:

```
grep -c '$190' index.html index-dia-de-muertos.html index-navidad.html index-san-valentin.html
```

Los cuatro deben dar el mismo número.

## Otras reglas

- Haz `git pull` antes de editar: más de una persona trabaja en este repo.
- Para publicar se sube el sitio completo a Hostinger (el despliegue borra lo que
  había antes).
- No borres el registro TXT `google-site-verification` del DNS: es la verificación
  de Search Console.
