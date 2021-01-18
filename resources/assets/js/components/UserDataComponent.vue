<template>
  <div class="user-data">
    <upload-image-component :image="avatar" @avatar-change="onAvatarChange" />
    <div class="info">
      <span class="data">ID: </span>
      <span class="value">{{ user.id }}</span>
    </div>
    <div class="info">
      <span class="data">Usuario: </span>
      <span class="value">{{ user.name }}</span>
    </div>
    <div class="info">
      <span class="data">Mail: </span>
      <span class="value">
        <a :href="'mailto:' + user.email">{{ user.email }}</a>
      </span>
    </div>
    <div class="info">
      <span class="data">País: </span>
      <span class="value">{{ user.country }}</span>
    </div>
    <div class="info">
      <span class="data">Lenguaje favorito: </span>
      <span class="value">{{ user.favourite_language }}</span>
    </div>
    <div v-if="user.updated_at" class="info">
      <span class="data">Última actualización: </span>
      <span class="value">{{ user.updated_at }}</span>
    </div>
    <div v-else class="info">
      <span class="data">Última actualización: </span>
      <span class="value">Nunca</span>
    </div>
  </div>
</template>

<script>
import UploadImageComponent from "./UploadImageComponent";

export default {
  name: "UserDataComponent",
  components: {
    UploadImageComponent,
  } /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */,
  props: {
    user: { required: true, type: Object },
    avatar: { required: true, type: String },
  },
  mounted() {
    console.log("UserDataComponent montado.");
  },
  methods: {
    onAvatarChange: function (image) {
      this.$emit("avatar-change", image);
    },
  },
};
</script>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
@import "../../sass/variables";

.user-data {
  background-color: $card-bg;
  width: 96%;
  margin: 0 2%;
  display: grid;
  grid-template: repeat(2, 40px) / 200px repeat(3, 1fr);
  grid-column-gap: 10px;
  font-size: 1.2em;

  // es el div padre del componente de subida de imágenes
  .upload-image {
    grid-column: 1 / 2;
    grid-row: 1 / 3;
  }

  .info {
    line-height: 40px;
  }

  .value {
    color: rgb(111, 97, 170);
    padding-left: $padding-left;
    font-weight: 700;
  }

  .data {
    padding-left: $padding-left;
    text-align: left;
  }
}
</style>
