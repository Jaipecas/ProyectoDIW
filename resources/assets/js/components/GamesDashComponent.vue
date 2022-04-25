<template>
  <div>
    <h3>Partidas pendientes</h3>
    <div class="pending-area">
      <pending-match-component />
      <pending-match-component />
      <pending-match-component />
      <pending-match-component />
      <pending-match-component />
      <pending-match-component />
    </div>
  </div>
</template>
<script>
import PendingMatchComponent from "./PendingMatchComponent.vue";

export default {
  name: "GamesDashComponent",
  components: {
    "pending-match-component": PendingMatchComponent,
  },
};
</script>

<style lang="scss" scoped>
/* SE REPITE LA MIMSA ESTRUCTURA ÀRA AMIGOS CONECTADOS
SACARLO EN UN MIXIN  */
.pending-area {
  padding: 10px;
  height: 195px;
  overflow: auto;
  /* SACAR ESTO EN UN MIXIM PARA REUTILIZARLO */
  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    display: none;
  }
}

/* SE REPITE TAMBIEN EN AMIGOS  */
h3 {
  margin-top: 10px;
  text-align: center;
}
</style>
