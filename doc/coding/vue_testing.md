# Pruebas componentes Vue

El objetivo de de este documento es servir de índice de referencia de las pruebas realizadas con Vue Testing Utils (VTU) indicado que elementos característicos incorporan a la hora de poder analizar su funcionamiento. 

> Nota: A efectos académicos todas  las pruebas tienen, además de su descripción, un identificador.

<br />

## Leyenda

| Siglas | Descripción |
| :---   | :---------- |
| TU     | Test unitario |
| TI     | Test integración |
| TE     | Test e2e |
| SM     | Montaje de componente. Obtención de wrapper |
| PRM    | Paso de parámetros al wrapper |
| TXT    | Comprobación de textos renderizados |
| ATTR   | Comprobación de atributos |
| LENGTH | Comprobación de número de elementos |
| FIND   | Búsqueda de elementos |
| STYLE  | Comprobación de estilos |
| METHD  | Comprobación de ejecución de métodos |
| ACT    | Generación de eventos de DOM |
| EVNT   | Comprobación de emisión de eventos |
| MCK    | Uso de mocks |
| SNP    | Snapshot |

<br />

## Tests

**[T001] exists**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un componente. | 
| *Observaciones* | |
| *Leyenda* | TU, SM, PRM |  

<br /> 

**[T002] renders user.id**  

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un texto renderizado. | 
| *Observaciones* | _text()_ devuelve una cadena con la totalidad del texto renderizado por el componente. Por otra parte, es interesante comprobar que cada prueba comprueba una única cosa |
| *Leyenda* | TU, SM, PRM, TXT |

<br />

**[T003] renders user.updated_at**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un texto renderizado. | 
| *Observaciones* | Falla de manera habitual ya que en el componente la salida no ha sido filtrada |
| *Leyenda* | TU, SM, PRM, TXT |

<br />

**[T004] renders a link to the user.email with user.email as text**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación del renderizado de un enlace. | 
| *Observaciones* | _find()_ realiza una búsqueda dentro de un elemento y devuelve un único valor.  |
| *Leyenda* | TU, SM, PRM, TXT, ATTR, FIND |

<br />

**[T005] each info has data and value**

|     |       |
| :-- | :---- |
| *Componente* | UserData |Comprobación de que todos los elementos de una clase contengan otros elementos
| *Observaciones* | _findAll()_ realiza una búsqueda dentro de un elemento y devuelve un array. |
| *Ejercicio* | Comprobar que hay un y solo un elemento de ese tipo |
| *Leyenda* | TU, SM, PRM, FIND |

<br />

**[T006] has upload-image-component component**

|     |       |
| :-- | :---- |
| *Componente* | UserData |
| *Objetivo* | Comprobación de la existencia de un componente. | 
| *Observaciones* | _findComponente()_ requiere de la propiedad *name*. Es posible usar find, pero requiere la importación del componente. |
| *Leyenda* | TU, SM, PRM, FIND |

<br />

**[T007] input has input-file class**

|     |       |
| :-- | :---- |
| *Componente* | UploadImage |
| *Objetivo* | Comprobación dela aplicación de una clase CSS. | 
| *Observaciones* | Es posibble también utilizar la propiedad _style_ si el estilo es aplicado de manera directa. |
| *Leyenda* | TU, SM, PRM, FIND, STYLE |

<br />

**[T008] scrolls to the right of container**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer |
| *Objetivo* | Comprobar que hemos llegado al final de un scroll. | 
| *Observaciones* | Uso de una función _build_ para construir todo la configuración. Ejecución de un método externo. Consulta a una propiedad de un elemento |
| *Leyenda* | TU, SM, PRM, METHD  |

<br />

**[T009] if avatar changes => emit event avatar-change**

|     |       |
| :-- | :---- |
| *Componente* | UploadImage |
| *Objetivo* | Comprobar que se ha emitido un evento de usuario cuando se ha realizado una acción. | 
| *Observaciones* | Se hace uso de dos tipos de mock: una funcion sustituida y la sustitución de todo un módulo (este último se implementa en la carpeta  _\_\_mocks\_\__) |
| *Leyenda* | SM, PRM, FIND, ACT, EVENT, MCK  |

<br />

**[T010] AcceptedChallenge received => call processBoradcastEvent**

|     |       |
| :-- | :---- |
| *Componente* | DashboardTestComponent |
| *Objetivo* | Comprobar que una función interna es llamada si se recibe un evento vue. | 
| *Observaciones* | Es necesario crear un mock espía para que pueda controlar si una función es llamada. |
| *Leyenda* | TU, SM, PRM, FIND, METHD, EVENT, MCK  |

<br />

**[T011] AcceptedChallenge received => show alert with game info**

|     |       |
| :-- | :---- |
| *Componente* | DashboardTestComponent |
| *Objetivo* | Comprobar que una función es llamada y que sus parámetros contienen cierta información. | 
| *Observaciones* | Hay que crear un espía para poder analizar que pasa en la función y posteriormente utilizar la propiedad mock para obtener valores. ¡OJO! Se prueba un función _alert_ que no tiene mucho sentido en entornos de producción. |
| *Leyenda* | TU, SM, PRM, FIND, METHD, EVENT, MCK  |

<br />

**[T012] when the word is accepted the number of pieces in the bag decreases**

|     |       |
| :-- | :---- |
| *Componente* | InfoGameComponent |
| *Objetivo* | Comprobar que una vez enviada una palabra correcta y asigandas nuevas fichas, en pantalla aparece el número correcto de fichas que quedan en la bolsa. | 
| *Observaciones* | Se hace uso de una variable reactiva. Se busca un elemento por su clase CSS asignada. Se fuerza un refresco del template ya que entran en juego funciones asíncronas. |
| *Leyenda* | TU, SM, PRM, FIND, METHD, MCK  |

<br />

**[T013] should render 5 cards**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer |
| *Objetivo* | Snapshot. | 
| *Observaciones* | Se utiliza _mount_ para cargar los componentes hijos. |
| *Leyenda* | SNP |

<br />

**[T014] should render 5 cards (random mode)**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer |
| *Objetivo* | Snapshot. | 
| *Observaciones* | ¡Falla! Se utiliza _mount_ para cargar los componentes hijos. Problema al introducir datos cambiantes entre dos ejecuciones del test. Hay que unificar este tipo de datos. Un caso claro podría se elementos que rendericen valores de tiempo relativo, por ejemplo "se conectó por última vez hace XX días" |
| *Leyenda* | SNP  |

<br />

**[T015] renders cards for each card in props.cards**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer |
| *Objetivo* | Comprueba que se creen tantos OutputCard como elementos se hayan pasado por parámetro. | 
| *Observaciones* | Permite ver como realizar este test mediante una prueba unitaria, sin llegar a cargar el componente OutputCard |
| *Leyenda* | TU, SM, FIND, LENGTH |

<br />

**[T016] renders cards for each card in props.cards**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer/OutputCard |
| *Objetivo* | Comprueba que se creen tantos OutputCard como elementos se hayan pasado por parámetro. | 
| *Observaciones* | Similar al T015, pero en este caso mediante un test de integración. Para tealizar el conteo se utiliza una clase interna del componente hijo. |
| *Leyenda* | TI, SM, FIND, LENGTH |

<br />

**[T017] renders a card with class error**

|     |       |
| :-- | :---- |
| *Componente* | CardContainer/OutputCard |
| *Objetivo* | Comprueba que aparezca la clase CSS error cuando una respuesta de la API es erronea. | 
| *Observaciones* | Se realiza un filtrado para realizar una búsqueda de un elemento por texto. |
| *Leyenda* | TI, SM, FIND, TXT |
