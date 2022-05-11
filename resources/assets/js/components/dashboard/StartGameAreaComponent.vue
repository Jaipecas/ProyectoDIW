<template>
  <div>
    <select-lang />
    <input
      class="searchInput"
      type="text"
      placeholder="Busca contrincante"
      title="Type in a name"
    />

    <ul class="listUsers">
      <li><a href="#">Adele</a></li>
      <li><a href="#">Agnes</a></li>

      <li><a href="#">Billy</a></li>
      <li><a href="#">Bob</a></li>

      <li><a href="#">Calvin</a></li>
      <li><a href="#">Christina</a></li>
      <li><a href="#">Cindy</a></li>
    </ul>
  </div>
</template>

<script>
import SelectLanguageComponent from "./SelectLanguageComponent.vue";

export default {
  name: "StartGameAreaComponent",
  components: {
    "select-lang": SelectLanguageComponent,
  },
};
</script>
<style lang="scss" scoped>
* {
  box-sizing: border-box;
}

.searchInput {
  background-image: url("/css/searchicon.png");
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
}

.listUsers {
  list-style-type: none;
  padding: 0;
  margin: 0;

  li a {
    border: 1px solid #ddd;
    margin-top: -1px;
    background-color: #f6f6f6;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    color: black;
    display: block;
  }

  li a:hover:not(.header) {
    background-color: #eee;
  }
}
</style>
