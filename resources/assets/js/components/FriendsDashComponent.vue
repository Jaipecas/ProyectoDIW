<template>
  <div>
    <h3>Amigos conectados</h3>
    <div class="friends-conected">
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
      <friend-conected />
    </div>
  </div>
</template>

<script>
import FriendConectedComponent from "./FriendConectedComponent.vue";

export default {
  name: "FriendConectedComponent",
  components: {
    "friend-conected": FriendConectedComponent,
  },
};
</script>

<style lang="scss" scoped>
h3 {
  margin-top: 10px;
  text-align: center;
}

.friends-conected {
  padding: 10px;
  height: 400px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    display: none;
  }
}
</style>
