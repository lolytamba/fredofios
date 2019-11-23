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
                <img :src="'/Fasilitas/'+form.gambar_fasilitas" height="200" :alt="form.gambar_fasilitas" v-else-if="form.gambar_fasilitas"/>
                <img :src="defaultImg" height="200" v-else/>
                <v-text-field 
                  label="Gambar*" 
                  class="pa-1"
                  v-model="imageName"
                  required 
                  @click='pickFile'
                  :error-messages="gambarErrors"
                  @input="$v.form.gambar_fasilitas.$touch()"
                  @blur="$v.form.gambar_fasilitas.$touch()"
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
                  v-model="form.judul_fasilitas"
                  required 
                  :error-messages="judulErrors"
                  @input="$v.form.judul_fasilitas.$touch()"
                  @blur="$v.form.judul_fasilitas.$touch()"
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
                <img :src="'/Fasilitas/'+form.gambar_fasilitas" height="200" :alt="form.gambar_fasilitas" v-else-if="form.gambar_fasilitas"/>
                <img :src="defaultImg" height="200" v-else/>
                <v-text-field 
                  label="Gambar*" 
                  class="pa-1"
                  v-model="imageName"
                  required 
                  @click='pickFile'
                  :error-messages="gambarErrors"
                  @input="$v.form.gambar_fasilitas.$touch()"
                  @blur="$v.form.gambar_fasilitas.$touch()"
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
                  v-model="form.judul_fasilitas"
                  required 
                  :error-messages="judulErrors"
                  @input="$v.form.judul_fasilitas.$touch()"
                  @blur="$v.form.judul_fasilitas.$touch()"
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
          <img :src="'Fasilitas/' + item.gambar" style="width: 200px; height: 200px" />
      </template>
    <template
      slot="items"
      slot-scope="props">
      <td>{{ props.item.judul }}</td>
    </template>
   <template #item.action="props">
      <v-icon
        small
        color="green"
        @click="editFasilitas(props.item.id)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteFasilitas(props.item.id)"
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
        gambar_fasilitas: { required },
        judul_fasilitas: { required },
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
          loading: state => state.Facility.loading,
          error: state => state.Facility.error,
          items: state => state.Facility.facilities
        }),

        ...mapGetters({
        form: 'Facility/facility',
        }),

        gambarErrors () {
          const errors = []
          if (!this.$v.form.gambar_fasilitas.$dirty) return errors       
          !this.$v.form.gambar_fasilitas.required && errors.push('Gambar tidak boleh kosong.')
          return errors
        },

        judulErrors(){
          const errors = []
          if (!this.$v.form.judul_fasilitas.$dirty) return errors      
          !this.$v.form.judul_fasilitas.required && errors.push('Judul tidak boleh kosong.')
          return errors
        },
    },

    methods: {
        ...mapActions({
        fetch: 'Facility/get',
        add: 'Facility/store',
        edit: 'Facility/update',
        find: 'Facility/edit',
        delete: 'Facility/delete'
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
            this.form.gambar_fasilitas = files[0] // this is an image file that can be sent to server..
          })
        } else {
          this.imageName = ''
          this.imageUrl = 'http://localhost:8000/aset/default.png'
        }
      },
      

      async submitHandler(){
        let payload = new FormData();
        payload.append('gambar', this.form.gambar_fasilitas)
        payload.append('judul', this.form.judul_fasilitas)
        
          await this.add(payload)
        
          if (!this.error) {
            this.dialog=false
            this.fetch()
            this.dialogTambah=true
          }         
      },

      editFasilitas(id){
        this.id_fasilitas=id
        this.dialog2=true
        this.find(id)
        console.log(id)
      },

      async editHandler () {
        const payload = {
          id: this.id_fasilitas,
          gambar: this.form.gambar_fasilitas,
          judul: this.form.judul_fasilitas,
        }

        console.log(payload)

        await this.edit(payload)
      
        if (!this.Error) {
          this.dialog2=false
          this.dialogEdit=true
          this.fetch()
        }
      },

      deleteFasilitas(id){
        this.id_fasilitas=id
        this.dialog3=true
      },

      async deleteHandler () {
        console.log(this.id_fasilitas);
        await this.delete(this.id_fasilitas)
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