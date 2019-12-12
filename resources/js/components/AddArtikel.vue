<template>
    <v-app>
      <!-- ini pop up tambah-->
      <v-dialog v-model="dialog" persistent max-width="600px">
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
                <img :src="'/Artikel/'+form.gambar" height="200" :alt="form.gambar" v-else-if="form.gambar"/>
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

            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Konten*" 
                  class="pa-1"
                  v-model="form.konten"
                  required 
                  :error-messages="kontenErrors"
                  @input="$v.form.konten.$touch()"
                  @blur="$v.form.konten.$touch()"
                />
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Diskripsi*" 
                  class="pa-1"
                  v-model="form.diskripsi"
                  required 
                  :error-messages="diskripsiErrors"
                  @input="$v.form.diskripsi.$touch()"
                  @blur="$v.form.diskripsi.$touch()"
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
              @click="submitHandler"
              :disabled="this.$v.form.$invalid"
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
          Foto berhasil ditambah
        </v-card-text>
        </v-card>
      </v-dialog>
      <!-- ini pop up edit-->
      <v-dialog v-model="dialog2" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Edit Foto</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                <img :src="imageUrl" height="200" v-if="imageUrl"/>
                <img :src="'/Artikel/'+form.gambar" height="200" :alt="form.gambar" v-else-if="form.gambar"/>
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

            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Konten*" 
                  class="pa-1"
                  v-model="form.konten"
                  required 
                  :error-messages="kontenErrors"
                  @input="$v.form.konten.$touch()"
                  @blur="$v.form.konten.$touch()"
                />
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Diskripsi*" 
                  class="pa-1"
                  v-model="form.diskripsi"
                  required 
                  :error-messages="diskripsiErrors"
                  @input="$v.form.diskripsi.$touch()"
                  @blur="$v.form.diskripsi.$touch()"
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
              @click="editHandler"
              :disabled="this.$v.form.$invalid"
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
          Foto berhasil diedit
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
          Foto berhasil dihapus
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
    <template v-slot:item.gambar="{ item }">
          <img :src="'Artikel/' + item.gambar" style="width: 200px; height: 200px" />
      </template>
    <template
      slot="items"
      slot-scope="props">
      <td>{{ props.item.judul }}</td>
      <td>{{ props.item.diskripsi }}</td>
      <td>{{ props.item.konten }}</td>
    </template>
   <template #item.action="props">
      <v-icon
        small
        color="green"
        @click="editArtikel(props.item.id)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteArtikel(props.item.id)"
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

  export default {
    props: {
      value: {
        type: Boolean,
        default: false
      }
    },

    validations: {
      form: {
        gambar: { required },
        judul: { required },
        diskripsi: { required },
        konten: { required },
      },   
    },

    data () {
      return {
        search: '',
        imageName: '',
        defaultImg: 'http://localhost:8000/aset/default.png',
        imageUrl: '',
        dialog: false,
        dialog2: false,
        dialog3: false,
        dialogTambah: false,
        dialogEdit: false,
        dialogDelete: false,
        headers: [
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
            { text: 'Diskripsi',  
              align: 'center', 
              value: 'diskripsi' 
            },
            { text: 'Konten',  
              align: 'center', 
              value: 'konten' 
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
        ...mapState({
          loading: state => state.News.loading,
          error: state => state.News.error,
          items: state => state.News.news_news
        }),

        ...mapGetters({
        form: 'News/news',
        }),

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

        diskripsiErrors(){
          const errors = []
          if (!this.$v.form.diskripsi.$dirty) return errors      
          !this.$v.form.diskripsi.required && errors.push('Diskripsi tidak boleh kosong.')
          return errors
        },

        kontenErrors(){
          const errors = []
          if (!this.$v.form.konten.$dirty) return errors      
          !this.$v.form.konten.required && errors.push('Konten tidak boleh kosong.')
          return errors
        },
    },

    methods: {
        ...mapActions({
        fetch: 'News/get',
        add: 'News/store',
        edit: 'News/update',
        find: 'News/edit',
        delete: 'News/delete'
      }),

      reload(){
        window.location.reload()
      }, 

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
            this.form.gambar = files[0] // this is an image file that can be sent to server..
          })
        } else {
          this.imageName = ''
          this.imageUrl = 'http://localhost:8000/aset/default.png'
        }
      },
      

      async submitHandler(){
        let payload = new FormData();
        payload.append('gambar', this.form.gambar)
        payload.append('judul', this.form.judul)
        payload.append('diskripsi', this.form.diskripsi)
        payload.append('konten', this.form.konten)
        
          await this.add(payload)
        
          if (!this.error) {
            this.dialog=false
            this.fetch()
            this.dialogTambah=true
            this.reload()
          }         
      },

      editArtikel(id){
        this.id_artikel=id
        this.dialog2=true
        this.find(id)
        console.log(id)
      },

      async editHandler () {
        const payload = {
          id: this.id_artikel,
          gambar: this.form.gambar,
          diskripsi: this.form.diskripsi,
          judul: this.form.judul,
          konten: this.form.konten,
        }

        console.log(payload)

        await this.edit(payload)
      
        if (!this.Error) {
          this.dialog2=false
          this.dialogEdit=true
          this.fetch()
          this.reload()
        }
      },

      deleteArtikel(id){
        this.id_artikel=id
        this.dialog3=true
      },

      async deleteHandler () {
        console.log(this.id_artikel);
        await this.delete(this.id_artikel)
        this.fetch()
        this.dialog3=false
        this.dialogDelete=true
      },
      
    },

    mounted () {
      this.fetch()
    }
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