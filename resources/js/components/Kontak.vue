<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
     <v-divider></v-divider>
      <v-card-text style="height: auto;">
        <p class="title black--text font-weight-black">Hubungi Kami</p>
        <p>Silahkan kirim pertanyaan atau pesan anda dengan mengisi form berikut. Kami akan merespon pesan anda secepat mungkin.
        Terima kasih atas perhatian yang telah diberikan.</p>
        <v-card
        max-width="auto"
        height="50px"
        color="green"
        v-if="cek"
        >
        <v-card-text class="white--text align-end"><v-icon dark right>mdi-checkbox-marked-circle</v-icon>
        Pesan anda telah dikirim, terima kasih. </v-card-text>
        </v-card>
        <v-form
          v-model="valid"
        >
        <v-row>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="Nama"
              outlined
              dense
              required
              v-model="nama"
              :error-messages="namaRules"
              @input="$v.nama.$touch()"
              @blur="$v.nama.$touch()"
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="Email"
              outlined
              dense
              required
              v-model="email"
              :error-messages="emailRules"
              @input="$v.email.$touch()"
              @blur="$v.email.$touch()"
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="No Hp"
              outlined
              dense
              required
              v-model="nohp"
              :error-messages="nohpRules"
              @input="$v.nohp.$touch()"
              @blur="$v.nohp.$touch()"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
         <v-col md="10">
            <v-textarea
              label="Pesan/Pertanyaan"
              outlined
              dense
              required
              v-model="pesan"
              :error-messages="pesanRules"
              @input="$v.pesan.$touch()"
              @blur="$v.pesan.$touch()"
            ></v-textarea>
          </v-col>
         </v-row>
        <div class="text-center">
          <v-btn 
          rounded color="primary" 
          dark 
          @click="submit();cek=true" 
          :disabled="this.$v.$invalid"
          >
          Submit</v-btn>
        </div>
        </v-form>
      </v-card-text>
    </v-card>
    <v-container></v-container>
  </v-card>
</template>

<script>
import Controller from './../service/Kontak'
import { required, maxLength, minLength, numeric, email } from 'vuelidate/lib/validators'

  export default {
    validations: {
      nama: { required, maxLength: maxLength(30),minLength: minLength(1)},
      nohp: { required, maxLength: maxLength(13),minLength: minLength(1), numeric},
      pesan: { required, maxLength: maxLength(1000), minLength: minLength(1)},
      email: { required, email }
    },

    data () {
      return {
        cek1:[],
        nama: '',
        email: '',
        nohp: '',
        pesan: '',
        valid: false,
        cek: false,
      };
    },
    mounted(){
      this.getItem()
    },
    computed: {
      namaRules () {
        const errors = []
        if (!this.$v.nama.$dirty) return errors
        !this.$v.nama.maxLength && errors.push('Nama tidak boleh melebihi 30 karakter')          
        !this.$v.nama.required && errors.push('Nama tidak boleh kosong.')
        return errors
      },

      nohpRules(){
        const errors = []
        if (!this.$v.nohp.$dirty) return errors
        !this.$v.nohp.numeric && errors.push('Nomor hp harus numerik')          
        !this.$v.nohp.required && errors.push('Nomor hp tidak boleh kosong.')
        return errors
      },

      pesanRules(){
        const errors = []
        if (!this.$v.pesan.$dirty) return errors     
        !this.$v.pesan.required && errors.push('Pesan tidak boleh kosong.')
        return errors
      }, 

      emailRules(){
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Email harus valid')
        !this.$v.email.required && errors.push('Email tidak boleh kosong')
        return errors
      }
    },

    methods: {
      async submit(){
        try{
          const payload = {
            nama  : this.nama,
            email : this.email,
            nohp  : this.nohp,
            pesan : this.pesan,
          }
          await Controller.store(payload);
          this.refresh()
          console.log(payload);
        }catch(err){
          console.log(err)
        }
      },
      refresh(){
        this.nama = '',
        this.email = '',
        this.nohp = '',
        this.pesan = '',
        this.cek = false 
      }
    }
  }
</script>