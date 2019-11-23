<template>
    <v-app>
      <!-- ini pop up tambah-->
      <v-dialog v-model="dialog" persistent max-width="600px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on"
            style="height: 36px; max-width:200px; left:800px; top:30px;"
          >Tambah Misi</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Tambah Misi</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Misi*" 
                  class="pa-1"
                  v-model="isi_misi"
                  required 
                  :error-messages="misiErrors"
                  @input="$v.isi_misi.$touch()"
                  @blur="$v.isi_misi.$touch()"
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
          Misi berhasil ditambah
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
                 <v-text-field 
                  label="Misi*" 
                  class="pa-1"
                  v-model="isi_misi"
                  required 
                  :error-messages="misiErrors"
                  @input="$v.isi_misi.$touch()"
                  @blur="$v.isi_misi.$touch()"
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
              @click="editHandler()"
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
          Misi berhasil dihapus
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
        @click="editMisi(props.item.id)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteMisi(props.item.id)"
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
import { required, maxLength, minLength, numeric } from 'vuelidate/lib/validators'
import Controller from './../service/Misi'

  export default {
    props: {
      value: {
        type: Boolean,
        default: false
      }
    },

    validations: {
        isi_misi: { required },  
    },

    data () {
      return {
        isi_misi: '',
        search: '',
        items:[],
        Misi:{
            isi_misi: '',
        },
        dialog: false,
        dialog2: false,
        dialog3: false,
        dialogTambah: false,
        dialogEdit: false,
        dialogDelete: false,
        headers: [
            { text: 'Misi',  
              align: 'left', 
              value: 'isi_misi' 
            },
            { text: 'Action',  
              align: 'center', 
              value: 'action' 
            },
        ],
      }
    },

    computed: {
        misiErrors(){
          const errors = []
          if (!this.$v.isi_misi.$dirty) return errors      
          !this.$v.isi_misi.required && errors.push('Misi tidak boleh kosong.')
          return errors
        },
    },

    methods: {
        async submitHandler(){
            try{
                const payload = {
                    isi_misi  : this.isi_misi,
                }
                await Controller.store(payload);
                this.dialog=false
                this.dialogTambah=true
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

        editMisi(id){
            this.id_misi=id
            this.dialog2=true
        },

        deleteMisi(id){
            this.id_misi=id
            this.dialog3=true
        },

        async editHandler(){
            try{
                console.log("tes")
                const payload = {
                    id: this.id_misi,
                    isi_misi: this.isi_misi,
                } 
                console.log(payload)
                await Controller.update(payload)
                console.log("tes2")
                this.get()
                this.dialog2=false
                this.dialogEdit=true
            }catch(err){
                console.log(err);
            }
        },

        async deleteHandler(){
        try{
            await Controller.delete(this.id_misi)
            this.dialog3=false
            this.dialogDelete=true
            this.get()
        }catch(err){
          console.log(err)
        }
      },

        reload(){
        window.location.reload()
        },     
    },

    mounted(){
      this.get()
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