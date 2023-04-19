# Informe tarea 2 INF239


# **Ares Galaxy (Penquify para terminos comerciales)**

## Información del grupo:
-   José Llanos | 202073103-9
-   Kirk Heim   | 201903009-4
---
## Supuestos / Consideraciones:

- Se considera que la herencia es exclusiva, por lo que una misma persona es o artista o usuario, ya que segun el enunciado al logearse en la página el sistema debe detectar si es artista o usuario.

- Para la imagen del album solo se aceptarán **links** con fines de que la BD no tenga demaciado peso.

- De no ser ingresada una **URL** para la imagen de un álbum, la página le asignara una automaticamente.

- A la hora de mostrar todas las canciones con sus artistas y albumes correspondientes se opto por mostrar nombre,apellido y nombre artistico del compositor debido a que el usuario requiere la mayor cantidad de información sobre su artista favorito para poder realizar futuras bsuquedas de manera mas precisa.

- Al momento de un artista querer modificar ya sea una canción o un álbum, este tendra el formulario de modificación a un costado del formulario de registro, esto para que el artista tenga a la vista los datos de la canción o álbum que desea editar, no obstante el boton que permite eliminar una canción o álbum esta situado a un costado de cada uno de estos con el fin de evitar eliminar canciones o albumes no deseados por falla de ingreso (Introducir mal el *id* de un álbum por ejemplo).

- Se agregaron multiples imagenes nuevas a la carpeta de *img* con el fin de embellecer la página, támbien se crearon nuevos archivos *Html* y *PhP* para la funcionalidad de la tarea, queremos recalcar que se creo una nueva *NavBar* para el *index* de la página para que este no interfiriera con el *NavBar* de la página cuando la persona ya esta ingresada con sus credenciales correctas y validadas.

## Como se manejó el modelo

- Se dejó todo en una sola tabla, dejando la herencia del modelo de forma en que existe una variable bool no nula que identifica a una fila, de forma en que se puede saber si es artista o usuario y guardar esa información en la sesión.


## Modificaciones a archivos
-   *include/navbar.php* fue modificada para poder tener un botón de cierre de sesión, tomando una plantilla en la página de bootstrap. (funcionalidad + estética)
-   style.css fue modificado por motivos estéticos.

Debe indicar, si es que los hay, qué archivos de la plantilla fueron modificados. Esto no considera archivos tanto .html y .php con comentarios indicando que hagan cambios.

Expliciten también si las modificaciones fueron de funcionalidad o simplemente estéticas
*(ejemplo: uso de Bootstrap para hacerlas más estéticas).*
## Enlace git: 
`GitHub` : <https://github.com/jllanosg/tarea2bbdd>
## Dificultades
- Agregar dificultades, también tiempos de trabajo por cada miembro con su explicación correspondiente.
- Lo mas desafiante aquí fue enfrentarnos a nuevos lenguajes de programación y a su vez el como se podia utilizar este para nuestro beneficio a la hora de desarrollar la tarea. Otra dificultad que se tuvo que superar fue coordinarnos a veces debido a la inconsistencia de nuestros horarios entre estudios y trabajo, pero fue rapidamente solucionada mediante juntas semanales en el *LabPro*
- Tiempo trabajado por Jose Llanos: 1 semana, básicamente jose se dedico prioritariamente al *backend* del trabajo buscando en gran medida como poder hacer la conexión entre *PhP* y *MySQL*.
- Tiempo trabajado por Kirk Heim: 4 días, kirk se dedico prioritariamente al *frontend* del trabajo y en muy poca medida al *backend* se dedico a buscar el aspecto estético de la página y algunas implementaciones básicas en *PhP*.
---
