import Echo from "laravel-echo";

export class Config {
  constructor(broadcaster, host) {
    this.broadcaster = broadcaster;
    this.host = host;
  }
}

export default {
  name: "ListenForBroadcast",
  render: () => null,
  props: {
    config: {
      type: Config,
      required: true,
    },
    channels: {
      type: Array,
      required: true,
      validator: (val) => {
        // comprobación de que todos los objetos tengan name y events
        // podria haber hecho una clase, instanciar objetos en el padre y comprobar
        // el tipo con instanceof, pero al ser pocos datos he optado por esta solución
        if (!val.every((el) => "name" in el && "events" in el && "type" in el))
          return false;

        // events es un array
        if (!val.every((el) => el.events instanceof Array)) return false;

        // no hay nombres vacios
        if (!val.every((el) => el.name.length > 0)) return false;

        // no hay elementos con nombres repetidos
        if ([...new Set(val.map((el) => el.name))].length != val.length)
          return false;
        return true;
      },
    },
  },
  data() {
    return {
      echo: null,
      isConnected: false,
    };
  },
  watch: {
    channels: function (newChannels, oldChannels) {
      // nuevos canales => suscripción
      let incomingChannels = newChannels.filter(
        (x) => !oldChannels.includes(x)
      );
      createChannels(this, incomingChannels);

      // canales eliminados => cancela la suscripción
      let deleteChannels = oldChannels.filter((x) => !newChannels.includes(x));
      deleteChannels.forEach((ch) => {
        leaveChannel(this, ch);
      });
    },
    // emite un evento cuado cambia el estado de la conexión
    isConnected: function (val) {
      this.$emit("broadcast:status", val ? "CONNECTED" : "DISCONNECTED");
    },
  },
  methods: {
    // Conecta Echo
    connect() {
      if (!this.echo) {
        this.echo = new Echo({
          broadcaster: "socket.io",
          host: window.location.hostname + ":6001",
          csrfToken: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
          auth: {
            headers: {
              "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            },
          },
        });
      }

      // No es necesario llamar especificamente a connect ya que el constructor de Echo
      // automáticamente realiza la conexión
      this.isConnected = true;

      // crea todos los canales
      createChannels(this, this.channels);
    },
    // Desconecta el echo
    disconnect() {
      if (!this.echo) return;
      this.echo.disconnect();
      this.isConnected = false;
    },
  },
  created() {
    this.connect();
  },
  beforeDestroy() {
    console.log("El contrincante ha pasado turno.");
    this.disconnect();
  },
};

// funciones privadas del componente
// crea y suscribe a todos los canales
function createChannels(vm, channels) {
  channels.forEach((ch) => {
    createChannel(vm, ch);
    listen(vm, ch);
  });
}

// crea y suscribe a un canal
function createChannel(vm, channel) {
  if (channel.type === "private") {
    vm.echo.private(channel.name);
    vm.$emit("broadcast:channel-susbcription", channel.name, "private");
  }
}

// cancela la suscripción
function leaveChannel(vm, channel) {
  vm.echo.leave(channel.name);
  vm.$emit("broadcast:channel-unsusbcription", channel.name);
}

// vincula la escucha de los eventos de broadcasting con la emisión
// de los mismos al padre
function listen(vm, ch) {
  console.log("Enlazando eventos broadcast (" + ch.name + ") -> vue");

  if (ch.type === "private") {
    let socket = vm.echo.private(ch.name);
    ch.events.forEach((ev) => {
      socket.listen("." + ev, (e) => {
        vm.$emit("broadcast:event", ch.name, ev, e);
      });
    });
  }
}
