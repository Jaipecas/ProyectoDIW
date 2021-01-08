<template>
  <div class="upload-image">
    <img v-if="image" :src="image" />
    <!--UPLOAD-->
    <form v-if="isInitial || isSaving" enctype="multipart/form-data" novalidate>
      <div class="dropbox" :class="{ opacityon: image }">
        <input
          type="file"
          :name="uploadFieldName"
          :disabled="isSaving"
          accept="image/*"
          class="input-file"
          @change="filesChange($event.target.name, $event.target.files)"
        />
        <p v-if="isInitial">
          Arrastra tu imagen aquí<br />o pincha para buscarla
        </p>
        <p v-if="isSaving">Subiendo imagen...</p>
      </div>
    </form>
  </div>
</template>

<script>
/* La manera más natural de realizar la actualización de la imagen del avatar sería
   la de modificar la propiedad image de dentro del método upload/post/then
        vm.image = response.data.path;
 El problema es que esto no es aconsejable. Cambiar una propiedad (es decir, un dato que 
 viene del padre) en el hijo, es posible ya que las propiedades son objetos mutables,
 pero, realizar el cambio de esta manera puede ser muy confuso. 
 Es por tanto una mala práctica (incluso salta un warning en la consola)
 La solucion radica en que todo los cambios se realicen en el mismo componente, 
 es decir, en este caso la eliminación del avatar debería lanzarse desde 
 este componente. 
 En nuestro caso vamos a seguir manteniendo la separación para aprender más cosas.
 La solución obvia sería crea una variable interna, por ejemplo imageToRender, que inicializariamos
 con el valor de image yque seria la que renderizariamos. A la hora de actualizar en upload/post/then 
 hariamos algo como 
    vm.imageToRender = response.data.path;
 En este caso el problema vendria al eliminar el avatar desde el menú. ya que necesitamos actualizar el 
 valor de imageToRender a null cuando esto ocurra, es decir, cuando la variable image valga null de nuevo.
 Para eso podemos usar los métodos watch.
 Los métodos watch se utilizan para cambiar el valor de un dato o propiedad porque haya cambiado otro. 
 El nombre de la función es el nombre de la propiedad que quiero vigilar si ha cambiado
 Desgraciadamente, en este caso es sólo una solución parcial, ya que si el componente se monta con 
 image=null cuando se borra el avatar desde el padre se envia image=null.. es decir, no cambia, así que 
 no salta la función. (sólo se detectan cambios de valor)
 Sólo saltría en el caso de que al montar el componente SI tenga avatar, es decir image!=null
 Para solicionar este caso problemático la única solución que tenemos es que image pase a no ser
 null cuando se le asigna, es decir que la propiedad image cambie si cambia la imagen... parece que volvemos
 al principio
 La solución, y esta vez es definitiva, consiste en mandar un evento al abuelo (al dashboard), a través
 del padre (UserData) indicándole que la imagen ha cambiado y con que nuevo valor y que sea el dashboard
 el que cambie la propiedad y, por lo tanto, se actualice de manera automática en el componente UploadImage
*/
import axios from "axios";

const STATUS_INITIAL = 0,
  STATUS_SAVING = 1,
  STATUS_SUCCESS = 2,
  STATUS_FAILED = 3;

export default {
  name: "UploadImageComponent", // que sea siempre compuesto con - para evitar colisiones con otros tag HTML5
  props: {
    image: { required: false, type: String, default: "" },
  }, // imagen por defecto
  data: () => ({
    currentStatus: null,
    uploadFieldName: "avatar",
  }),
  computed: {
    isInitial() {
      return this.currentStatus === STATUS_INITIAL;
    },
    isSaving() {
      return this.currentStatus === STATUS_SAVING;
    },
    isSuccess() {
      return this.currentStatus === STATUS_SUCCESS;
    },
    isFailed() {
      return this.currentStatus === STATUS_FAILED;
    },
  },
  created() {
    this.reset();
    console.log("Avatar por defecto:", this.image);
  },
  mounted() {
    console.log("UploadImageComponent montado.");
  },
  /*watch: {  
        image: function (val) {
            // image sólo cambia si se elimina el avatar desde el padre
            this.imageToRender = val;
        }
    },*/
  methods: {
    reset() {
      // reset form to initial state
      this.currentStatus = STATUS_INITIAL;
    },
    upload(formData) {
      return axios
        .post("/scrabble/upload/avatar", formData)
        .then((response) => {
          this.currentStatus = STATUS_SUCCESS;
          console.log(response);

          this.$emit("avatar-change", response.data.path);
          this.currentStatus = STATUS_INITIAL;
        })
        .catch((error) => {
          this.currentStatus = STATUS_FAILED;
          console.log("ERROR: " + error);
        });
    },
    save(formData) {
      // subimos los datos al servidor
      this.currentStatus = STATUS_SAVING;
      this.upload(formData);
    },
    filesChange(fieldName, fileList) {
      const formData = new FormData();

      if (!fileList.length) return;

      // se adjuntan los ficheros a formData
      Array.from(Array(fileList.length).keys()).map((x) => {
        formData.append(fieldName, fileList[x], fileList[x].name);
      });

      // se graba
      this.save(formData);
    },
  },
};
</script>

<style lang="scss">
.upload-image {
  position: relative;
}

.dropbox {
  outline: 2px dashed #808080; /* the dash box */
  outline-offset: -8px;
  background: #e0ffff;
  color: #696969;
  padding: 4px 10px 2px;
  position: absolute;
  top: 0;
  cursor: pointer;

  // centrado horizontal con posicionamiento absoluto
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
}

.input-file {
  opacity: 0; /* invisible but it's there! */
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  cursor: pointer;
}

.dropbox:hover {
  background: #add8e6; /* when mouse over to the drop zone, change color */
}

.dropbox p {
  font-size: 0.8em;
  text-align: center;
  padding: 5px 0;
}

img {
  max-width: 100%;
  max-height: 100%;
  margin-left: auto;
  margin-right: auto;
  display: block;
}

.opacityon {
  opacity: 0.4;
}
</style>
