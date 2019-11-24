<template>
    <v-app>
    <!-- ******************VISI******************-->
    <!-- ini pop up tambah-->
      <v-dialog v-model="dialogVisi" persistent max-width="600px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on"
            style="height: 36px; max-width:200px; left:800px; top:30px;"
          >Tambah Visi</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">Tambah Visi</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                <v-text-field 
                  label="Visi*" 
                  class="pa-1"
                  v-model="isi_visi"
                  required 
                  :error-messages="visiErrors"
                  @input="$v.isi_visi.$touch()"
                  @blur="$v.isi_visi.$touch()"
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
              @click="submitHandlerVisi"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialogVisi = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>
      <v-dialog
        v-model="dialogTambahVisi"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Visi berhasil ditambah
        </v-card-text>
        </v-card>
      </v-dialog>

    <!-- ini pop up edit-->
      <v-dialog v-model="dialog2Visi" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Edit Visi</span>
          </v-card-title>
          <VForm>
          <v-card-text>
            <v-layout>
              <v-flex>
                 <v-text-field 
                  label="Visi*" 
                  class="pa-1"
                  v-model="isi_visi"
                  required 
                  :error-messages="visiErrors"
                  @input="$v.isi_visi.$touch()"
                  @blur="$v.isi_visi.$touch()"
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
              @click="editHandlerVisi(id)"
            >
              Simpan
            </VBtn>
            <v-btn color="success" @click="dialog2Visi = false">Batal</v-btn>
          </v-card-actions>
          </VForm>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogEditVisi"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Visi berhasil diedit
        </v-card-text>
        </v-card>
      </v-dialog>

     <!-- ini pop up buat delete-->
      <v-dialog v-model="dialog3Visi" persistent max-width="500">
        <v-card>
          <v-card-text class="text-md-center" style="font-size:15px">Anda yakin ingin menghapus data ini?</v-card-text>
          <v-card-actions>
            <v-spacer/>
            <VBtn class="mb-4" depressed dark color="blue darken-1" @click="deleteHandlerVisi()">Yes</VBtn>
            <VBtn class="mb-4" depressed dark color="blue darken-1"  @click="dialog3 = false">No</VBtn>
            <v-spacer/>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-dialog
        v-model="dialogDeleteVisi"
        width="300"
      >
        <v-card color="green">
        <v-card-text class="white--text text-center title" style="padding-top: 20px;">
        <v-icon dark right>mdi-checkbox-marked-circle</v-icon>
          Visi berhasil dihapus
        </v-card-text>
        </v-card>
      </v-dialog>

    <div class="search-input">
        <v-text-field
        v-model="searchVisi"
        class="search-input"
        append-icon="search"
        label="Search..."
        color="black"
        />
    </div>
    <v-data-table 
      :headers="headersVisi"
      :items="itemsVisi"
      :search="searchVisi"
      class="my-data-table"
      action
    > 
    <template
        slot="headerCell"
        slot-scope="{ headerVisi }"
      >
      <span
        class="subheading font-weight-black text-success text--darken-3"
        v-text="headerVisi.text"
      />
    </template>
    <template
      slot="itemsVisi"
      slot-scope="props">
      <td>{{ props.item.visi }}</td>
    </template>
   <template #item.action="props">
      <v-icon
        small
        color="green"
        @click="editVisi(props.item)"
      >
        edit
      </v-icon>
      <v-icon
        small
        color="red"
        @click="deleteVisi(props.item.id)"
      >
        delete
      </v-icon>
    </template>
      <v-alert v-slot:no-results :value="true" color="error" icon="warning">
        Your search for "{{ searchVisi }}" found no results.
      </v-alert>
    </v-data-table>
    <!-- ******************MISI******************-->
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
            <span class="headline">Edit Misi</span>
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
          Misi berhasil diedit
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
        @click="editMisi(props.item)"
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
import ControllerVisi from './../service/Visi'

  export default {
    props: {
      value: {
        type: Boolean,
        default: false
      }
    },

    validations: {
        isi_misi: { required },  
        isi_visi: { required },  
    },

    data () {
      return {
        isi_misi: '',
        isi_visi: '',
        search: '',
        searchVisi: '',
        items:[],
        itemsVisi:[],
        Misi:{
            id:'',
            isi_misi: '',
        },
        Visi:{
            id:'',
            isi_visi: '',
        },
        dialog: false,
        dialog2: false,
        dialog3: false,
        dialogTambah: false,
        dialogEdit: false,
        dialogDelete: false,
        dialogVisi: false,
        dialog2Visi: false,
        dialog3Visi: false,
        dialogTambahVisi: false,
        dialogEditVisi: false,
        dialogDeleteVisi: false,
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
        headersVisi: [
            { text: 'Visi',  
              align: 'left', 
              value: 'isi_visi' 
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

        visiErrors(){
          const errors = []
          if (!this.$v.isi_visi.$dirty) return errors      
          !this.$v.isi_visi.required && errors.push('Visi tidak boleh kosong.')
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

         async submitHandlerVisi(){
            try{
                const payload = {
                    isi_visi  : this.isi_visi,
                }
                await ControllerVisi.store(payload);
                this.dialogVisi=false
                this.dialogTambahVisi=true
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

        async getVisi(){
            try{
                this.itemsVisi = (await ControllerVisi.get())
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

        editMisi(item){
            this.isi_misi = item.isi_misi
            this.id =item.id
            console.log(this.isi_misi)
            console.log(this.id)
            this.dialog2=true
        },

        deleteMisi(id){
            this.id_misi=id
            this.dialog3=true
        },

        editVisi(item){
            this.isi_visi = item.isi_visi
            this.id =item.id
            console.log(this.isi_visi)
            console.log(this.id)
            this.dialog2Visi=true
        },

        deleteVisi(id){
            this.id_visi=id
            this.dialog3Visi=true
        },

        async editHandler(id){
            try{
                const payload = {
                    isi_misi  : this.isi_misi,
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
            await Controller.delete(this.id_misi)
            this.dialog3=false
            this.dialogDelete=true
            this.get()
        }catch(err){
          console.log(err)
        }
      },

      async editHandlerVisi(id){
            try{
                const payload = {
                    isi_visi  : this.isi_visi,
                } 
                await ControllerVisi.update(id,payload)
                this.getVisi()
                this.dialog2Visi=false
                this.dialogEditVisi=true
            }catch(err){
                console.log(err);
            }
        },

        async deleteHandlerVisi(){
        try{
            await ControllerVisi.delete(this.id_visi)
            this.dialog3Visi=false
            this.dialogDeleteVisi=true
            this.getVisi()
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
      this.getVisi()
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