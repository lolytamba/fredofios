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
        <p>Silahkan kirim pertanyaan atau pesan anda dengan mengisi form berikut. Kami akan merespon pesan anda secepat Mungkin.
        Terima kasih atas perhatian yang telah diberikan.</p>
        <v-form
          ref="form"
          lazy-validation
        >
        <v-row>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="Nama"
              outlined
              dense
              required
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="Email"
              outlined
              dense
              required
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6" md="5">
            <v-text-field
              label="No Hp"
              outlined
              dense
              required
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
            ></v-textarea>
          </v-col>
         </v-row>
        <div class="text-center">
          <v-btn rounded color="primary" dark>Submit</v-btn>
        </div>
        </v-form>
      </v-card-text>
    </v-card>
    <v-container></v-container>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
      }
    },
  }
</script>