<template>
  <div class="wrapper">
    <div class="lang-area">
      <p>lang</p>
    </div>
    <div class="users-area">
      <p>users</p>
    </div>
    <div class="exit-area">
      <p>exit</p>
    </div>
    <div class="nose-area">
      <p>nose</p>
    </div>
    <div class="table-area">
      <p>tabla</p>
    </div>
    <div class="notif-area">
      <p>notif</p>
    </div>
    <div class="icons-area">
      <p>icons</p>
    </div>
    <div class="letters-area">
      <p>lettres</p>
    </div>
  </div>
</template>

<script>
import Game from "../../../../classes/Game";
import User from "../../../../classes/User";

export default {
  name: "TableboardComponent",
  props: {
    user: {
      type: User,
      required: true,
    },
    opponent: {
      type: User,
      required: true,
    },
    game: {
      type: Game,
      required: true,
    },
  },
};
</script>
<style lang="scss" scoped>
.wrapper {
  display: grid;
  grid-template: 100px 1fr 200px 100px / 300px 1fr 300px;
  height: 90vh;
  padding: 20px;
  gap: 15px;

  .lang-area {
    background: red;
  }
  .users-area {
    background: rgb(226, 215, 115);
  }
  .exit-area {
    background: rgb(94, 255, 0);
  }
  .nose-area {
    background: rgb(0, 255, 234);
  }
  .table-area {
    grid-row: 2 / 4;
    grid-column: 2 / 3;
    background: rgb(38, 0, 255);
  }
  .notif-area {
    grid-row: 2 / -1;
    grid-column: 3 / -1;
    background: rgb(225, 0, 255);
  }
  .icons-area {
    grid-row: 3 /-1;
    background: rgb(255, 0, 195);
  }
  .letters-area {
    background: rgb(255, 128, 0);
  }
}
</style>
