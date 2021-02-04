# Documentación del componente ListenForBroadcast

El componente ListenForBroadcast es un componente Vue encargado de gestionar la comunicación con Laravel Echo Server, el servidor de web socket de Laravel.

Es un componente renderless, es decir, no tiene interfaz gráfico asociada.

## Propiedades

### **config**

Permite definir los datos de configuración del websocket. Ha de ser de tipo Config, clase definida en el propio fichero de definición del componente.

| Variable | Descripción |
| :---     | :----       |
| broadcaster | Tipo de broadcaster. En la versión actual únicamente está soportado _socket.io_ si bien en próximas versiones se espera soportar _pusher_ | 
| host  | url de localización del servidor |

<br/>

### **channels**

Array que contiene la definición de cada uno de los canales que se desea escuchar. Cada canal es un objeto JSON con las siguientes claves

| Variable    | Descripción |
| :------     | :---------  |
| name        | Nombre del canal | 
| events      | Array con los nombres de los eventos a escuchar en ese canal |
| type        | private: canal privado (próximas versiones soportaran otros tipos) |

<br/>

> Todas las claves son obligatorias

<br/>

## Eventos

El componente emite los siguientes eventos:

| Evento           | Descripción | Parámetros |
| :------          | :---------  | :-----     | 
| broadcast:status | El estado de la conexión ha cambiado | [0]: CONNECTED / DISCONNECTED |  
| broadcast:channel-susbcription | Se ha producido la suscripción a un canal | [0]: nombre del canal  [1]:tipo del canal |  
| broadcast:channel-unsusbcription | Se ha dado de baja a un canal | [0]: nombre del canal |  
| broadcast:event | Se ha recibido un evento | [0]: nombre del canal  [1]: nombre del evento  [2]: información asociada al evento |  
