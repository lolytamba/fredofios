<template>
    <v-app>
      <!-- **************CAROUSEL**************-->
      <!-- ini pop up tambah-->
      <v-dialog v-model="dialogCarousel" persistent max-width="600px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on"
            style="height: 36px; max-width:200px; left:800px; top:30px;"
          >Tambah Foto</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Tambah Foto</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                <img :src="imageUrl" height="200" v-if="imageUrl"/>
                <img :src="'/Carousel/'+form.gambar" height="200" :alt="form.gambar" v-else-if="form.gambar"/>
                <img :src="defaultImg" height="200" v-else/>
                <v-text-field 
                  label="Gambar*" 
                  class="pa-1"
                  v-model="imageName"
                  required 
                  @click='pickFile'
                  :error-messages="gambarErrors"
                  @input="$v.form.gambar.$touch()"
                  @blur="$v.form.gambar.$touch()"
                />
                <input  
                  type="file"
                  style="display: none"
                  ref="image"
                  accept="image/*"
                  @change="onFilePicked"
                >
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Judul*" 
                  class="pa-1"
                  v-model="form.judul"
                  required 
                  :error-messages="judulErrors"
                  @input="$v.form.judul.$touch()"
                  @blur="$v.form.judul.$touch()"
                />
              </v-flex>
            </v-layout>
            <small>*indicates required field</small>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
              <VBtn
              depressed
              color="info"
              @click="submitHandlerCarousel"
              :disabled="this.$v.form.$invalid"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialogCarousel = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>
      <v-dialog
        v-model="dialogTambahCarousel"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Foto berhasil ditambah
        </v-card-text>
        </v-card>
      </v-dialog>
      <!-- ini pop up edit-->
      <v-dialog v-model="dialog2Carousel" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Edit Foto</span>
          </v-card-title>
          <VForm>
          <v-card-text>
             <v-layout>
              <v-flex>
                <img :src="imageUrl" height="200" v-if="imageUrl"/>
                <img :src="'/Carousel/'+form.gambar" height="200" :alt="form.gambar" v-else-if="form.gambar"/>
                <img :src="defaultImg" height="200" v-else/>
                <v-text-field 
                  label="Gambar*" 
                  class="pa-1"
                  v-model="imageName"
                  required 
                  @click='pickFile'
                  :error-messages="gambarErrors"
                  @input="$v.form.gambar.$touch()"
                  @blur="$v.form.gambar.$touch()"
                />
                <input  
                  type="file"
                  style="display: none"
                  ref="image"
                  accept="image/*"
                  @change="onFilePicked"
                >
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Judul*" 
                  class="pa-1"
                  v-model="form.judul"
                  required 
                  :error-messages="judulErrors"
                  @input="$v.form.judul.$touch()"
                  @blur="$v.form.judul.$touch()"
                />
              </v-flex>
            </v-layout>
            <small>*indicates required field</small>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
              <VBtn
              depressed
              color="info"
              @click="editHandlerCarousel"
              :disabled="this.$v.form.$invalid"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialog2Carousel = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogEditCarousel"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Foto berhasil diedit
        </v-card-text>
        </v-card>
      </v-dialog>

     <!-- ini pop up buat delete-->
      <v-dialog v-model="dialog3Carousel" persistent max-width="500">
        <v-card>
          <v-card-text class="text-md-center" style="font-size:15px">Anda yakin ingin menghapus data ini?</v-card-text>
          <v-card-actions>
            <v-spacer/>
            <VBtn class="mb-4" depressed dark color="blue darken-1" @click="deleteHandlerCarousel()">Yes</VBtn>
            <VBtn class="mb-4" depressed dark color="blue darken-1"  @click="dialog3Carousel = false">No</VBtn>
            <v-spacer/>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogDeleteCarousel"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Foto berhasil dihapus
        </v-card-text>
        </v-card>
      </v-dialog>

    <div class="search-input">
        <v-text-field
        v-model="searchCarousel"
        class="search-input"
        append-icon="search"
        label="Search..."
        color="black"
        />
    </div>
    <v-data-table 
      :headers="headersCarousel"
      :items="items2"
      :search="searchCarousel"
      class="my-data-table"
      action
    > 
    <template
        slot="headerCell"
        slot-scope="{ headerCarousel }"
      >
      <span
        class="subheading font-weight-black text-success text--darken-3"
        v-text="headerCarousel.text"
      />
    </template>
    <template v-slot:item.gambar="{ item }">
          <img :src="'Carousel/' + item.gambar" style="width: 200px; height: 200px" />
      </template>
    <template
      slot="items2"
      slot-scope="props">
      <td>{{ props.item.judul }}</td>
    </template>
   <template #item.action="props">
      <v-icon
        small
        color="green"
        @click="editCarousel(props.item.id)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteCarousel(props.item.id)"
      >
        delete
      </v-icon>
    </template>
      <v-alert v-slot:no-results :value="true" color="error" icon="warning">
        Your search for "{{ searchCarousel }}" found no results.
      </v-alert>
    </v-data-table>

      <!-- **************TENTANG**************-->
      <!-- ini pop up tambah-->
      <v-dialog v-model="dialog" persistent max-width="600px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on"
            style="height: 36px; max-width:200px; left:800px; top:30px;"
          >Tambah Tentang</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Tambah Tentang</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                <v-textarea
                  label="Tentang*" 
                  class="pa-1"
                  v-model="isi_tentang"
                  required 
                  :error-messages="tentangErrors"
                  @input="$v.isi_tentang.$touch()"
                  @blur="$v.isi_tentang.$touch()"
                ></v-textarea>
              </v-flex>
            </v-layout>
            <small>*indicates required field</small>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
              <VBtn
              depressed
              color="info"
              @click="submitHandler"
              :disabled="this.$v.$invalid"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialog = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>
      <v-dialog
        v-model="dialogTambah"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Data berhasil ditambah
        </v-card-text>
        </v-card>
      </v-dialog>
      <!-- ini pop up edit-->
      <v-dialog v-model="dialog2" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Edit Tentang</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                 <v-textarea
                  label="Misi*" 
                  class="pa-1"
                  v-model="isi_tentang"
                  required 
                  :error-messages="tentangErrors"
                  @input="$v.isi_tentang.$touch()"
                  @blur="$v.isi_tentang.$touch()"
                ></v-textarea>
              </v-flex>
            </v-layout>
            <small>*indicates required field</small>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
              <VBtn
              depressed
              color="info"
              @click="editHandler(id)"
              :disabled="this.$v.$invalid"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialog2 = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogEdit"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Data berhasil diedit
        </v-card-text>
        </v-card>
      </v-dialog>

     <!-- ini pop up buat delete-->
      <v-dialog v-model="dialog3" persistent max-width="500">
        <v-card>
          <v-card-text class="text-md-center" style="font-size:15px">Anda yakin ingin menghapus data ini?</v-card-text>
          <v-card-actions>
            <v-spacer/>
            <VBtn class="mb-4" depressed dark color="blue darken-1" @click="deleteHandler()">Yes</VBtn>
            <VBtn class="mb-4" depressed dark color="blue darken-1"  @click="dialog3 = false">No</VBtn>
            <v-spacer/>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogDelete"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Data berhasil dihapus
        </v-card-text>
        </v-card>
      </v-dialog>

    <div class="search-input">
        <v-text-field
        v-model="search"
        class="search-input"
        append-icon="search"
        label="Search..."
        color="black"
        />
    </div>
    <v-data-table 
      :headers="headers"
      :items="items"
      :search="search"
      class="my-data-table"
      action
    > 
    <template
        slot="headerCell"
        slot-scope="{ header }"
      >
      <span
        class="subheading font-weight-black text-success text--darken-3"
        v-text="header.text"
      />
    </template>
    <template
      slot="items"
      slot-scope="props">
      <td>{{ props.item.misi }}</td>
    </template>
   <template #item.action="props">
      <v-icon
        small
        color="green"
        @click="editTentang(props.item)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteTentang(props.item.id)"
      >
        delete
      </v-icon>
    </template>
      <v-alert v-slot:no-results :value="true" color="error" icon="warning">
        Your search for "{{ search }}" found no results.
      </v-alert>
    </v-data-table>
    </v-app>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'
import { required, maxLength, minLength, numeric } from 'vuelidate/lib/validators'
import Controller from './../service/Tentang'

  export default {
    props: {
      value: {
        type: Boolean,
        default: false
      }
    },

    validations: {
        isi_tentang: { required },  
        form: {
          gambar: { required },
          judul: { required },
      }, 
    },

    data () {
      return {
        imageName: '',
        defaultImg: 'http://localhost:8000/aset/default.png',
        imageUrl: '',
        isi_tentang: '',
        search: '',
        searchCarousel: '',
        items:[],
        itemsCarousel:[],
        Tentang:{
            id:'',
            isi_tentang: '',
        },
        dialog: false,
        dialog2: false,
        dialog3: false,
        dialogTambah: false,
        dialogEdit: false,
        dialogDelete: false,
        dialogCarousel: false,
        dialog2Carousel: false,
        dialog3Carousel: false,
        dialogTambahCarousel: false,
        dialogEditCarousel: false,
        dialogDeleteCarousel: false,
        headers: [
            { text: 'Tentang',  
              align: 'left', 
              value: 'isi_tentang' 
            },
            { text: 'Action',  
              align: 'center', 
              value: 'action' 
            },
        ],
        headersCarousel: [
            {
              text: 'Gambar',
              align: 'center',
              sortable: false,
              value: 'gambar',
            },
            { text: 'Judul',  
              align: 'center', 
              value: 'judul' 
            },
            {
              text: 'Actions', 
              sortable: false,
              value: 'action'
            }
        ],
      }
    },

    computed: {
        tentangErrors(){
          const errors = []
          if (!this.$v.isi_tentang.$dirty) return errors      
          !this.$v.isi_tentang.required && errors.push('Data tidak boleh kosong.')
          return errors
        },

        gambarErrors () {
          const errors = []
          if (!this.$v.form.gambar.$dirty) return errors       
          !this.$v.form.gambar.required && errors.push('Gambar tidak boleh kosong.')
          return errors
        },

        judulErrors(){
          const errors = []
          if (!this.$v.form.judul.$dirty) return errors      
          !this.$v.form.judul.required && errors.push('Judul tidak boleh kosong.')
          return errors
        },

        ...mapState({
          loading: state => state.Carousel.loading,
          error: state => state.Carousel.error,
          items2: state => state.Carousel.carousels
        }),

        ...mapGetters({
          form: 'Carousel/carousel',
        }),

    },

    methods: {
        async submitHandler(){
            try{
                const payload = {
                    isi_tentang  : this.isi_tentang,
                }
                await Controller.store(payload);
                this.dialog=false
                this.dialogTambah=true
                this.get()
                this.reload()
                console.log(payload);
            }catch(err){
                console.log(err)
            }     
        },

        async get(){
            try{
                this.items = (await Controller.get())
            }catch(err){
                console.log(err)
            }
        },

        async find(id){
            try{
                this.items = (await Controller.find(id))
            }catch(err){
                console.log(err)
            }
        },

        editTentang(item){
            this.isi_tentang = item.isi_tentang
            this.id =item.id
            console.log(this.isi_tentang)
            console.log(this.id)
            this.dialog2=true
        },

        deleteTentang(id){
            this.id_tentang=id
            this.dialog3=true
        },

        async editHandler(id){
            try{
                const payload = {
                    isi_tentang  : this.isi_tentang,
                } 
                await Controller.update(id,payload)
                this.get()
                this.dialog2=false
                this.dialogEdit=true
            }catch(err){
                console.log(err);
            }
        },

        async deleteHandler(){
        try{
            await Controller.delete(this.id_tentang)
            this.dialog3=false
            this.dialogDelete=true
            this.get()
        }catch(err){
          console.log(err)
        }
      },

      //ini buat carousel

      ...mapActions({
        fetch: 'Carousel/get',
        add: 'Carousel/store',
        edit: 'Carousel/update',
        find: 'Carousel/edit',
        delete: 'Carousel/delete'
      }),

      pickFile () {
        this.$refs.image.click ()
      },
		
      onFilePicked (e) {
        const files = e.target.files
        if(files[0] !== undefined) {
          this.imageName = files[0].name
          if(this.imageName.lastIndexOf('.') <= 0) {
            return
          }
          const fr = new FileReader ()
          fr.readAsDataURL(files[0])
          fr.addEventListener('load', () => {
            this.imageUrl = fr.result
            this.form.gambar = files[0] // this is an image file that can be sent to server...
            console.log(this.form.gambar)
          })
        } else {
          this.imageName = ''
          this.imageUrl = 'http://localhost:8000/aset/default.png'
        }
      },

       async submitHandlerCarousel(){
        console.log(this.form.gambar)

        let payload = new FormData();
        payload.append('gambar', this.form.gambar)
        payload.append('judul', this.form.judul)
        
          await this.add(payload)
        
          if (!this.error) {
            this.dialogCarousel=false
            this.fetch()
            this.dialogTambahCarousel=true
            this.reload()
          }         
      },

      editCarousel(id){
        this.id_carousel=id
        this.dialog2Carousel=true
        this.find(id)
        console.log(id)
      },

      async editHandlerCarousel() {
        const payload = {
          id: this.id_carousel,
          gambar: this.form.gambar,
          judul: this.form.judul,
        }

        console.log(payload)

        await this.edit(payload)
      
        if (!this.Error) {
          this.dialog2Carousel=false
          this.dialogEditCarousel=true
          this.fetch()
          this.reload()
        }
      },

        deleteCarousel(id){
          this.id_carousel=id
          this.dialog3Carousel=true
        },

        async deleteHandlerCarousel() {
          console.log(this.id_carousel);
          await this.delete(this.id_carousel)
          this.fetch()
          this.dialog3Carousel=false
          this.dialogDeleteCarousel=true
        },
    },

    reload(){
        window.location.reload()
    },    

    mounted(){
      this.get()
      this.fetch()
    },
  }
</script>

<style scoped>
.button{
  left:250px;
  top:50px;
}
.search-input {
      padding: 0px;
      width: 350px;
    }
.my-data-table {
 margin-top: 70px;
}
</style>