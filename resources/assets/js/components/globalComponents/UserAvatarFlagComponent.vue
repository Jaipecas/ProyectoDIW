<template>
  <div class="wrapper">
    <img class="img-avatar" :src="user.avatar" alt="avatar" />
    <div>
      <country-flag :country="user.country" size="small" :rounded="true" />
      <span>{{ user.name }}</span>
    </div>
  </div>
</template>

<script>
import CountryFlag from "vue-country-flag";
import User from "../../../../classes/User";

export default {
  name: "UserAvatarFlagComponent",
  components: {
    "country-flag": CountryFlag,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
  },
};
</script>
<style lang="scss" scoped>
.wrapper {
  img {
    width: 50px;
    height: 50px;
    border-radius: 30px;
  }
}
</style>
