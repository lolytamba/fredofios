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
                <v-btn text color="white"  style="right: -500px;">KONTAK</v-btn>  
            </v-toolbar-items>
        </v-toolbar>
        <v-divider></v-divider>
            <v-card-text style="height: 430px;">
               <v-carousel
                  cycle
                  height="400"
                  hide-delimiter-background
                  show-arrows-on-hover
                >
                    <v-carousel-item
                      v-for="(slide, i) in slides"
                      :key="slide.title"
                    >
                    <v-img 
                      :src="slide.src"
                      height="100%"
                      class="white--text align-end">
                      <v-row
                        class="fill-height"
                        align="center"
                        justify="center"
                      >
                      <div class="display-3">{{ slide.title }}</div>
                      </v-row>
                    </v-img>
                    </v-carousel-item>
                </v-carousel>
            </v-card-text>
        </v-card>
    </v-card>

    <v-container>
      <v-row  
        align="star"
        justify="center"
        style="width:1200px; height:auto;">
        <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 1</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-icon color="black">mdi-arrow-right-bold</v-icon>
              <v-card-text>Continue reading</v-card-text>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-spacer></v-spacer>
         <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 2</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-icon color="black">mdi-arrow-right-bold</v-icon>
              <v-card-text>Continue reading</v-card-text>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-spacer></v-spacer>
         <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 3</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-icon color="black">mdi-arrow-right-bold</v-icon>
              <v-card-text>Continue reading</v-card-text>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-card>

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
    data () {
      return {
        slides: [
          {
            title: 'Mandiri',
            src: 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Lafayette_High_School_%28Lexington%2C_KY%29_in_August_2019.jpg'
          },
          {
            title: 'Terampil',
            src: 'https://www.thelocal.se/userdata/images/article/f399c757d392dd0d8bdfc817a9993176f527de128bb7d1928a85c9ce0c0aabd5.jpg'
          },
          {
            title: 'Berkembang',
            src: 'https://www.warringtonguardian.co.uk/resources/images/10137723.jpg?display=1&htype=0&type=responsive-gallery'
          },
          {
            title: 'Sosialisasi',
            src: 'https://www.expatica.com/uk/wp-content/uploads/sites/10/2019/01/School-Holidays-1920x1080.jpg'
          }
        ]
      }
    },
    methods: {
        home(){
            this.$router.push({ name : 'home' })
        }
    },
}
</script>