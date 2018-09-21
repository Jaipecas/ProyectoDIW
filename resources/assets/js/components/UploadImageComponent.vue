<template>
    <div id="upload-image">
      
            <!--UPLOAD-->
            <form enctype="multipart/form-data" novalidate v-if="isInitial || isSaving">
                <div class="dropbox">
                    <input type="file" :name="uploadFieldName" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files)"
                        accept="image/*" class="input-file">
                    <p v-if="isInitial">Arrastra tu imagen aquí<br>o picha para buscarla</p>
                    <p v-if="isSaving">Subiendo imagen...</p>
                </div>
            </form>
     
    </div>
</template>

<script>
const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;

export default {
    name: 'upload-image-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTML5 */
    data() {
      return {
        currentStatus: null,
        uploadFieldName: 'avatar'
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
                })
                .catch(function (error) {
                    vm.currentStatus = STATUS_FAILED;
                    console.log("ERROR: " + error);
                });
        },
        save(formData) {
            // upload data to the server
            this.currentStatus = STATUS_SAVING;
            this.upload(formData);
        },
        filesChange(fieldName, fileList) {
            // handle file changes
            const formData = new FormData();

            if (!fileList.length) return;

            // append the files to FormData
            Array
                .from(Array(fileList.length).keys())
                .map(x => {
                    formData.append(fieldName, fileList[x], fileList[x].name);
                });

            // save it
            this.save(formData);
        }
     },
    created() {
        this.reset();
    },
    mounted() {
        console.log('UploadImageComponent montado.');
    }
}
</script>

<style lang="scss">
 .dropbox {
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -8px;
    background: lightcyan;
    color: dimgray;
    padding: 4px 10px 2px;
    position: relative;
    cursor: pointer;
  }

  .input-file {
    opacity: 0; /* invisible but it's there! */
    width: 100%;
  
    position: absolute;
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
  </style>