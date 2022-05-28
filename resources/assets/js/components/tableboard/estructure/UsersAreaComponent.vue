<template>
  <div class="users-area">
    <user-data :user="user" />
    <div class="scores">
      <span>123</span>
      <span> - </span>
      <span>123</span>
    </div>
    <user-data :user="opponent" />
  </div>
</template>

<script>
import UserAvatarFlag from "../../globalComponents/UserAvatarFlagComponent.vue";

import User from "../../../../../classes/User";

export default {
  name: "UsersAreaComponent",
  components: {
    "user-data": UserAvatarFlag,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
    opponent: {
      type: User,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.users-area {
  display: grid;
  grid-template: 1fr / 1fr 1fr 1fr;

  > * {
    justify-self: center;
    align-self: center;
  }

  .scores {
    display: flex;
    align-items: center;
    > * {
      font-size: 1.5rem;
      margin-left: 10px;
      margin-right: 10px;
    }
  }
}
</style>
