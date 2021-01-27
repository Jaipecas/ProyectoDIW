<template>
  <div class="dash">
    <user-data-component
      :user="c_user"
      :avatar="c_avatar"
      @avatar-change="onAvatarChange"
    />
    <p class="variables-title">Estadísticas</p>
    <card-container-component :variables="c_variables" />
    <aside class="sidebar">
      <ul>
        <li class="input-menu">
          <a
            href="#"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          >
            Logout
          </a>
        </li>
        <li class="input-menu upper-margin">
          <a href="#" @click.prevent="removeAvatar">Elimina avatar</a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="giveupGame">Abandonar partida</a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="userStatistics">Estadísticas usuario</a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="removeUser">Eliminar cuenta</a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="userGames">
            Partidas del usuario (pag 1)
          </a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="userGamesPag2">
            Partidas del usuario (pag 2)
          </a>
        </li>
        <li class="input-menu upper-margin">
          <a href="#" @click.prevent="deleteNotification">
            Borrar notificación
          </a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="updateProfile">Modificar datos usuario</a>
        </li>
        <li class="input-menu">
          <a href="#" @click.prevent="requestChallenge">Solicitar partida</a>
        </li>
        <li v-if="requestChallengeId" class="input-menu">
          <a href="#" @click.prevent="gotoGame">Ir a partida solicitada</a>
        </li>
        <li v-else class="input-menu" style="text-decoration: line-through">
          <a>Ir a partida solicitada</a>
        </li>
        <li class="input-menu">
          <a
            title="Partida preparada para ser jugada"
            href="#"
            @click.prevent="gotoGame($event, 6)"
          >
            Ir partida juego
          </a>
        </li>
        <li class="input-menu">
          <a
            title="Partida preparada para ser ganada TOME en D6"
            href="#"
            @click.prevent="gotoGame($event, 7)"
          >
            Ir partida ganar
          </a>
        </li>
        <li class="input-menu">
          <a
            title="Limpia tarjetas resultados server"
            href="#"
            @click.prevent="scroll(true)"
          >
            Ir a ultimo mensaje
          </a>
        </li>
        <li class="input-menu upper-margin">
          Lista jugadores
          <div class="submenu">
            <input v-model="name" />
            <button @click="listUsers">OK</button>
          </div>
        </li>
      </ul>
    </aside>
    <!-- el atributo ref me permite definir un nombre que permite utilizar el elemento
    en el que se ubica desde el código Vue a través de this.$refs.nombre -->
    <card-container-component ref="container" :cards="c_cards" />
  </div>
</template>

<script>
import UserDataComponent from "./UserDataComponent";
import CardContainerComponent from "./CardContainerComponent";
import axios from "axios";

export default {
  name:
    "DashboardTestComponent" /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */,
  components: {
    CardContainerComponent,
    UserDataComponent,
  },
  props: {
    user: { required: true, type: Object },
    avatar: { required: true, type: String },
    variables: { required: true, type: Array },
  },
  data: () => ({
    c_user: null,
    c_avatar: "",
    c_variables: null,
    c_cards: [],
    requestChallengeId: null,
    name: "",
  }),
  created() {
    this.c_user = this.user;
    this.c_variables = this.variables;

    if (!this.avatar) this.c_avatar = "";
    else this.c_avatar = this.avatar;

    this.listenForBroadcast();
  },
  mounted() {
    console.log("DashboardComponent montado.");
  },
  methods: {
    onAvatarChange(image) {
      this.c_avatar = image;
    },
    gotoGame(event, idg) {
      if (idg === undefined) {
        idg = this.requestChallengeId;
      }
      let url =
        location.protocol +
        "//" +
        location.hostname +
        (location.port ? ":" + location.port : "");
      window.location.href = url + "/scrabble/game/" + idg;
    },
    updateProfile() {
      // modifica los datos del usuario.
      // el JSON de ejemplo incluye todos los posibles datos a modificar
      // podría sólo indicarse uno
      const promise = axios.put("/scrabble/user/update", {
        name: "Fred",
        country: "UK",
        favourite_language: "ES",
        new_password: "1234567",
        new_password_confirmation: "1234567",
        old_password: "12345",
      });

      promise
        .then((response) => {
          console.log("Datos de usuario:", response);
          this.createCard(
            "Update Profile",
            response.status,
            response.statusText,
            response.data
          );

          /* IMPORTANTE: en caso de hacer cambio de password el servidor 
                       hace un logout y por lo tanto conviene volver a la página de login
                       siempre se ejecuta
                       uso replace para que la página actual desaparezca del historial
                       y evitar la tecla back
                    
                        setTimeout(() => {
                            window.location.replace('/scrabble/login');
                        }, 2000);
                    */
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Update Profile",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    requestChallenge() {
      // solicita una partida en español
      const promise = axios.post("/scrabble/challenge/request/es/level/-4");

      promise
        .then((response) => {
          console.log("Reto creado:", response);
          this.createCard(
            "Request Challenge",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Request Challenge",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    deleteNotification() {
      // pone a borrado el estado de una notificación (id=3)
      const promise = axios.put("/scrabble/notification/9/update/delete");

      promise
        .then((response) => {
          console.log("Borrado notificación:", response);
          this.createCard(
            "Update Notification",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Update Notification",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    userGames() {
      // partidas del usuario paginadas, 3 por página
      const promise = axios.get("/scrabble/user/games/3");

      promise
        .then((response) => {
          console.log("Partidas de usuario:", response);
          this.createCard(
            "User Games",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "User Games",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    userGamesPag2() {
      // partidas del usuario paginadas, 3 por página
      const promise = axios.get("/scrabble/user/games/3?page=2");

      promise
        .then((response) => {
          console.log("Partidas de usuario:", response);
          this.createCard(
            "User Games",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "User Games",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    removeUser() {
      // elimina usuario
      const promise = axios.delete("/scrabble/user/remove");

      promise
        .then((response) => {
          console.log("Eliminar cuenta:", response);
          this.createCard(
            "Remove User",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Remove User",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        })
        .then(() => {
          // siempre se ejecuta
          // uso replace para que la página actual desaparezca del historial
          // y evitar la tecla back
          setTimeout(() => {
            window.location.replace("/scrabble/login");
          }, 2000);
        });
    },
    userStatistics() {
      // estadísiticas via AJAX
      const promise = axios.get("/scrabble/user/statistics");

      promise
        .then((response) => {
          console.log("Estadísticas:", response);
          this.createCard(
            "User Statistics",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "User Statistics",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    giveupGame() {
      // abandona la partida 3 (no se comprueba si es jugador de la partida o no)
      const promise = axios.post("/scrabble/game/12/giveup");

      promise
        .then((response) => {
          console.log("Abandonando partida:", response);
          this.createCard(
            "Giveup Game",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Giveup Game",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    removeAvatar() {
      //  event.preventDefault(); no hace falta ya que lo he puesto en la llamada
      this.c_avatar = null;
      const promise = axios.post("/scrabble/user/avatar/remove");

      promise
        .then((response) => {
          console.log("Elimina avatar respuesta:", response);
          this.createCard(
            "Remove Avatar",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Giveup Game",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    scroll: function () {
      this.$refs.container.scroll(true);
    },
    listUsers() {
      // solicita la lista de jugadores
      return axios
        .get("/scrabble/search/user/live", {
          params: {
            name: this.name,
          },
        })
        .then((response) => {
          console.log("Lista usuarios: ", response);
          this.createCard(
            "Remove User",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Lista usuarios",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    createCard(title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };

      this.c_cards.push(newcard);
    },
    listenForBroadcast() {
      console.log("Escuchando canales: user" + this.c_user.id);
      window.Echo.private("user." + this.c_user.id).listen(
        ".AcceptedChallenge",
        (e) => {
          alert(
            "Generada partida " +
              e.gameId +
              "\nIdioma: " +
              e.lang +
              "\nOponente\n\tid: " +
              e.oppoId +
              "\n\tNombre: " +
              e.oppoName +
              "\n\tPaís: " +
              e.oppoCountry +
              "\n\tAvatar: " +
              e.oppoAvatar
          );

          this.requestChallengeId = e.gameId;

          console.log("Recibido");
        }
      );
    },
  },
};
</script>

<style lang="scss" scoped>
.dash {
  max-width: 100%;
  display: grid;
  grid-gap: 10px;
  grid-template-columns: 1fr 0.5fr 6fr;

  > div:nth-child(1) {
    grid-column: 1 / 4;
  }

  > div:nth-child(3) {
    grid-column: 2 / 4;
  }
}

.sidebar {
  grid-column: 1 / 3;
}

.variables-title {
  font-size: 1.6em;
  padding: 0.5em;
  font-weight: 500;
  margin-left: 15%;
}
</style>
