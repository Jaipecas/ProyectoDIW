<template>
  <div class="avatar-wrapper">
    <img class="profile-pic" :src="userData.avatar" />
    <div class="upload-button" @click="openInput">
      <i class="fa fa-arrow-circle-up" aria-hidden="true" />
    </div>
    <input
      ref="inputFile"
      class="file-upload"
      type="file"
      accept="image/*"
      @change="uploadAvatar($event)"
    />
  </div>
</template>

<script>
import User from "../../../../classes/User";

export default {
  name: "UploadImageComponent",
  props: {
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      userData: null,
    };
  },
  created() {
    this.userData = this.user;
  },
  methods: {
    openInput() {
      this.$refs["inputFile"].click();
    },
    async uploadAvatar(event) {
      const formData = new FormData();
      const file = event.target.files[0];

      if (!file) return;

      formData.append("avatar", file, file.name);
      console.log(formData);
      this.userData.avatar = await this.userData.uploadAvatar(formData);
    },
  },
};
</script>

<style lang="scss">
.avatar-wrapper {
  position: relative;
  height: 200px;
  width: 200px;
  margin: 50px auto;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all 0.3s ease;
  &:hover {
    transform: scale(1.05);
    cursor: pointer;
  }
  &:hover .profile-pic {
    opacity: 0.5;
  }
  .profile-pic {
    height: 100%;
    width: 100%;
    transition: all 0.3s ease;
    &:after {
      font-family: FontAwesome;
      content: "\f007";
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      font-size: 190px;
      background: #ecf0f1;
      color: #34495e;
      text-align: center;
    }
  }
  .upload-button {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    .fa-arrow-circle-up {
      position: absolute;
      font-size: 234px;
      top: -17px;
      left: 0;
      text-align: center;
      opacity: 0;
      transition: all 0.3s ease;
      color: #34495e;
    }
    &:hover .fa-arrow-circle-up {
      opacity: 0.9;
    }
  }
}
</style>
