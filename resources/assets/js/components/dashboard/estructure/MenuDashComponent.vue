<template>
  <div>
    <h2>Scrabble Dashboard</h2>
    <div class="menu-dash">
      <menu-item
        v-for="item in menu"
        :key="item"
        :title="item"
        @changeArea="changeArea"
      />
    </div>
  </div>
</template>

<script>
import MenuItem from "../components/MenuItemDash.vue";

export default {
  name: "MenuDashComponent",
  components: {
    "menu-item": MenuItem,
  },
  data: function () {
    return {
      menu: [
        "Partidas",
        "Perfil",
        "Notificaciones",
        "Estadisticas",
        "Historial",
      ],
    };
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
