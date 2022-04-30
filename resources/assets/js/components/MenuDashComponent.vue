<template>
  <div>
    <h2>Scrabble Dashboard</h2>
    <div class="menu-dash">
      <menu-item icon="fa fa-user" title="Perfil" @changeArea="changeArea" />
      <menu-item icon="fa fa-user" title="Partidas" @changeArea="changeArea" />
      <menu-item
        icon="fa fa-user"
        title="Notificaciones"
        @changeArea="changeArea"
      />
      <menu-item icon="fa fa-users" title="Amigos" @changeArea="changeArea" />
      <menu-item
        icon="fa fa-user"
        title="Estadisticas"
        @changeArea="changeArea"
      />
      <menu-item icon="fa fa-user" title="Ranking" @changeArea="changeArea" />
    </div>
  </div>
</template>

<script>
import MenuItem from "./MenuItemDash.vue";

export default {
  name: "MenuDashComponent",
  components: {
    "menu-item": MenuItem,
  },
  methods: {
    changeArea(area) {
      this.$emit("changeArea", area);
    },
  },
};
</script>

<style lang="scss" scoped>
h2 {
  margin-top: 10px;
  text-align: center;
  justify-content: center;
}

.menu-dash {
  display: flex;
  flex-flow: column;
  padding: 30px;
  margin-top: 30px;
}
</style>
