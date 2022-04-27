<template>
  <div>
    <h2>Scrabble Dashboard</h2>
    <div class="menu-dash">
      <menu-item icon="fa fa-user" title="Perfil" />
      <menu-item icon="fa fa-user" title="Partidas" />
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
