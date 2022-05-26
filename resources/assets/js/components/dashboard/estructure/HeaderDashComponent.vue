<template>
  <div class="header-dash">
    <p>{{ name }}</p>
    <img src="/img/power.png" alt="apagar" @click="logout" />
  </div>
</template>

<script>
export default {
  name: "HeaderDashComponent",
  props: {
    userName: {
      type: String,
      required: true,
    },
  },
  data: function () {
    return {
      name: "",
    };
  },
  created() {
    this.name = "Bienvenido, " + this.userName;
  },
  methods: {
    logout() {
      window.location.replace("/scrabble");
    },
  },
};
</script>

<style lang="scss" scoped>
.header-dash {
  display: flex;
  align-items: center;
  justify-content: space-between;

  p {
    margin-left: 30px;
    font-size: 2rem;
  }

  img {
    width: 50px;
    height: 50px;
    cursor: pointer;
  }
}
</style>
