<template>
<v-app>
  <v-img
    src="/aset/logo.png"
    max-width="350"
    max-height="350"
    style="left:180px; top:80px"
  ></v-img>
  <v-img
    src="/aset/moto2.png"
    max-width="600"
    max-height="600"
    style="left:800px; top:-120px"
  ></v-img>
  <v-card flat>
    <v-card
        class="mx-auto"
        max-width="1200"
        style="margin-top:-100px"  
    >
        <v-toolbar flat
          color="blue lighten-1" 
          style="center">
          <v-toolbar-items>
            <v-btn text color="white" style="right: 0px;" @click="home">BERANDA</v-btn>
            <v-btn text color="white" style="right: -100px;">TENTANG KAMI</v-btn>
            <v-btn text color="white" style="right: -200px;">AUTISME</v-btn>
            <v-btn text color="white" style="right: -300px;">PROGRAM</v-btn>
            <v-btn text color="white" style="right: -400px;">GALERI</v-btn>
            <v-btn text color="white"  style="right: -500px;" @click="kontak">KONTAK</v-btn>  
          </v-toolbar-items>
        </v-toolbar>
        <v-divider></v-divider>
      </v-card>
    </v-card>

    <v-content>
      <router-view></router-view>
    </v-content>

  <!--footer--> 
  <v-footer
    dark
    padless
  >
    <v-card
      class="flex"
      flat
      tile
      color="blue lighten-1"
    >
      <v-card-text class="white--text text-center">
        <span style="font-size: 30px;">
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2">
             <v-icon dark>mdi-instagram</v-icon>
          </v-btn>
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2">
             <v-icon dark>mdi-whatsapp</v-icon>
          </v-btn>
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2">
             <v-icon dark>mdi-facebook</v-icon>
          </v-btn>
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2">
             <v-icon dark>mdi-gmail</v-icon>
          </v-btn>
        </span>
      </v-card-text>

      <v-card-text class="blue-grey darken-2 white--text text-center">
        <strong class="title">SLA Fredofios Yogyakarta</strong>
        <p class="font-condensed-light">Jl. Perumnas No.C7, Dabag, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta (Telp. 55283)</p>
      </v-card-text>
    </v-card>
  </v-footer>
  </v-app>
</template>

<script>
export default {
    methods: {
        home(){
            this.$router.push({ name : 'home' })
        },
        kontak(){
            this.$router.push({ name : 'kontak' })
        }
    },
}
</script>