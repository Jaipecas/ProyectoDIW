<template>
  <div class="menu-dash">
    <h2>Scrabble Dashboard</h2>
    <div class="menu">
      <menu-item icon="fa fa-user" title="Perfil" />
      <menu-item icon="fa fa-user" title="Partida pendientes" />
      <menu-item icon="fa fa-user" title="Notificaciones" />
      <menu-item icon="fa fa-users" title="Amigos" />
      <menu-item icon="fa fa-user" title="Estadísticas" />
      <menu-item icon="fa fa-user" title="Ranking" />
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
};
</script>

<style lang="scss" scoped>
.menu-dash {
  display: flex;
  flex-flow: column;
  justify-content: center;

  h2 {
    text-align: center;
  }

  .menu {
    margin-top: 20px;
    padding: 30px;
  }
}
</style>
