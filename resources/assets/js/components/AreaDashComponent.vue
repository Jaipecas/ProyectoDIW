<template>
  <div class="user-dash">
    <div />
    <input-dash name="Nombre" type="text" />
    <input-dash name="Antigua contraseña" type="password" />
    <combo-countries />
    <input-dash name="Nueva contraseña" type="password" />
    <input-dash name="Nombre" type="text" />
    <input-dash name="Confirma contraseña" type="password" />
    <div>
      <button>Guardar</button>
    </div>
  </div>
</template>

<script>
import ComboCountries from "./ComboCountriesComponent.vue";
import InputDash from "./InputGroupComponent.vue";

export default {
  name: "AreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
  },
};
</script>

<style lang="scss" scoped>
.user-dash {
  display: grid;
  grid-template: 1fr 1fr 1fr 1fr 1fr/ 0.5fr 1fr 1fr 0.5fr;

  div {
    align-self: center;

    &:nth-child(even) {
      grid-column: 2 / 3;
    }

    &:nth-child(odd) {
      grid-column: 3 / 4;
    }

    &:nth-child(1) {
      grid-column: 1 / -1;
      background: blue;
      justify-self: center;
      width: 130px;
      height: 130px;
      border-radius: 70px;
      margin-top: 10px;
    }

    &:last-child {
      grid-column: 2 / 4;

      button {
        width: 100%;
        height: 50px;
      }
    }
  }
}
</style>
