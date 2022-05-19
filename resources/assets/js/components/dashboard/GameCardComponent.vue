<template>
  <div class="wrapper">
    <p>{{ game.id }}</p>
  </div>
</template>

<script>
import Game from "../../../../classes/Game";

export default {
  name: "GameCardComponent",
  props: {
    game: {
      type: Game,
      required: true,
    },
  },
};
</script>
