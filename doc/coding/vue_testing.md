# Pruebas componentes Vue

El objetivo de de este documento es servir de índice de referencia de las pruebas realizadas con Vue Testing Utils (VTU) indicado que elementos característicos incorporan a la hora de poder analizar su funcionamiento. 

> Nota: A efectos académicos todas  las pruebas tienen, además de su descripción, un identificador.

<br />

## Leyenda

| Siglas | Descripción |
| :---  | :---------- |
| SM     | Montaje de componente. Obtención de wrapper |
| PRM    | Paso de parámetros al wrapper |
| TXT    | Comprobación de textos renderizados |
| ATTR   | Comprobación de atributos |
| FIND   | Búsqueda de elementos |
| STYLE  | Comprobación de estilos |
| METHD  | Comprobación de ejecución de métodos |
| ACT    | Generación de eventos de DOM |
| EVNT   | Comprobación de emisión de eventos |
| MCK    | Uso de mocks |

<br />

## Tests

**[T001] exists**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un componente. | 
| *Observaciones* | |
| *Leyenda* | SM, PRM |  

<br /> 

**[T002] renders user.id**  

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un texto renderizado. | 
| *Observaciones* | _text()_ devuelve una cadena con la totalidad del texto renderizado por el componente. Por otra parte, es interesante comprobar que cada prueba comprueba una única cosa |
| *Leyenda* | SM, PRM, TXT |

<br />

**[T003] renders user.updated_at**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un texto renderizado. | 
| *Observaciones* | Falla de manera habitual ya que en el componente la salida no ha sido filtrada |
| *Leyenda* | SM, PRM, TXT |

<br />

**[T004] renders a link to the user.email with user.email as text**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación del renderizado de un enlace. | 
| *Observaciones* | _find()_ realiza una búsqueda dentro de un elemento y devuelve un único valor.  |
| *Leyenda* | SM, PRM, TXT, ATTR, FIND |

<br />

**[T005] each info has data and value**

|     |       |
| :-- | :---- |
| *Componente* | UserData |Comprobación de que todos los elementos de una clase contengan otros elementos
| *Observaciones* | _findAll()_ realiza una búsqueda dentro de un elemento y devuelve un array. |
| *Ejercicio* | Comprobar que hay un y solo un elemento de ese tipo |
| *Leyenda* | SM, PRM, FIND |

<br />

**[T006] has upload-image-component component**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un componente. | 
| *Observaciones* | _findComponente()_ requiere de la propiedad *name*. Es posible usar find, pero requiere la importación del componente. |
| *Leyenda* | SM, PRM, FIND |

<br />

**[T007] input has input-file class**

|     |       |
| :-- | :---- |
| *Componente* | UploadImage |
| *Objetivo* | Comprobación dela aplicación de una clase CSS. | 
| *Observaciones* | Es posibble también utilizar la propiedad _style_ si el estilo es aplicado de manera directa. |
| *Leyenda* | SM, PRM, FIND, STYLE |

<br />

**[T008] scrolls to the right of container**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer |
| *Objetivo* | Comprobar que hemos llegado al final de un scroll. | 
| *Observaciones* | Uso de una función _build_ para construir todo la configuración. Ejecución de un método externo. Consulta a una propiedad de un elemento |
| *Leyenda* | SM, PRM, METHD  |

<br />

**[T009] if avatar changes => emit event avatar-change**

|     |       |
| :-- | :---- |
| *Componente* | UploadImage |
| *Objetivo* | Comprobar que se ha emitido un evento de usuario cuando se ha realizado una acción. | 
| *Observaciones* | Se hace uso de dos tipos de mock: uan funcion sustituidad y la sustitución de todo un módulo (este último se implementa en la carpeta  _\_\_mocks\_\__) |
| *Leyenda* | SM, PRM, FIND, ACT, EVENT, MCK  |