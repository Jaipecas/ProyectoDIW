<template>
    <div id="upload-image">
        <img v-if="imageToRender" :src="imageToRender">
            <!--UPLOAD-->
            <form enctype="multipart/form-data" novalidate v-if="isInitial || isSaving">
                <div class="dropbox" v-bind:class="{ opacityon: imageToRender }">
                    <input type="file" :name="uploadFieldName" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files)"
                        accept="image/*" class="input-file">
                    <p v-if="isInitial">Arrastra tu imagen aquí<br>o pincha para buscarla</p>
                    <p v-if="isSaving">Subiendo imagen...</p>
                </div>
            </form>
     
    </div>
</template>

<script>
const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;

export default {
    name: 'upload-image-component', // que sea siempre compuesto con - para evitar colisiones con otros tag HTML5
    props: ['image'],   // imagen por defecto
    data() {
      return {
        currentStatus: null,
        uploadFieldName: 'avatar',
        imageToRender: null
      }
    },
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
        }
    },
    methods: {
        reset() {
            // reset form to initial state
            this.currentStatus = STATUS_INITIAL;
        },
        upload(formData){
            // no se accede a this desde dentro de las funciones then
            // me creo una variable v (viewmodel) para cambiar el ámbito
            // y así si poder acceder
            var vm = this;
            return axios.post('/upload/avatar',formData)
                .then(function (response) {
                    vm.currentStatus = STATUS_SUCCESS;
                    console.log(response);
                    vm.imageToRender = response.data.path;
                    vm.currentStatus = STATUS_INITIAL;
                })
                .catch(function (error) {
                    vm.currentStatus = STATUS_FAILED;
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
            Array
                .from(Array(fileList.length).keys())
                .map(x => {
                    formData.append(fieldName, fileList[x], fileList[x].name);
                });

            // se graba
            this.save(formData);
        }
    },
    created() {
        this.reset();
    },
    mounted() {
        console.log('UploadImageComponent montado.');
        console.log('Avatar por defecto:', this.image );
        this.imageToRender = this.image;
    }
}
</script>

<style lang="scss">
    #upload-image {
        position: relative;
    }

    .dropbox {
        outline: 2px dashed grey; /* the dash box */
        outline-offset: -8px;
        background: lightcyan;
        color: dimgray;
        padding: 4px 10px 2px;
        position: absolute;
        top: 0px;
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
        top: 0px;
        left: 0px;
        cursor: pointer;
    }

    .dropbox:hover {
        background: lightblue; /* when mouse over to the drop zone, change color */
    }

    .dropbox p {
        font-size: 0.8em;
        text-align: center;
        padding: 5px 0 5px 0;
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