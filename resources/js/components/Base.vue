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
          style="center"
          max-width="auto">
          <v-row justify="space-around">
          <v-toolbar-items>
            <v-btn text color="white" style="right:150px" @click="home">BERANDA</v-btn>
              <v-menu offset-y>
                <template v-slot:activator="{ on }">
                  <v-btn text color="white" style="right:100px"  v-on="on">TENTANG KAMI</v-btn>
                </template>
                <v-list color="blue darken-1">
                <v-list-item
                  v-for="item in items"
                  :key="item.index"
                  route :to="item.route"
                >
                  <v-list-item-title class="white--text">{{ item.title }}</v-list-item-title>
                </v-list-item>
              </v-list>
              </v-menu> 
            <v-btn text color="white" @click="artikel" style="right:40px">ARTIKEL</v-btn>
            <v-menu offset-y>
              <template v-slot:activator="{ on }">
                <v-btn text color="white" v-on="on" style="right:-40px">PROGRAM</v-btn>
              </template>
                 <v-list color="blue darken-1">
                <v-list-item
                  v-for="program in programs"
                  :key="program.index"
                  route :to="program.route"
                >
                  <v-list-item-title class="white--text">{{ program.title }}</v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
            <v-btn text color="white" @click="galeri" style="right:-100px">GALERI</v-btn>
            <v-btn text color="white" style="right:-150px" @click="kontak">KONTAK</v-btn>  
          </v-toolbar-items>
          </v-row>
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
     <v-card-text class="black--text text-justify">
       <v-flex class="display-2 font-weight-bold blue--text">
         Tentang SLA Fredofios
       </v-flex>
       <br>

       <v-flex class="title font-weight-regular">
          Sekolah Lanjutan Autis (SLA) Fredofios berdiri pada tanggal 3 April 2003. SLA Fredofios  
          merupakan salah satu sekolah luar
          biasa yang berada di Yogyakarta untuk pelajar dengan Autism Spectrum Disorder (ASD).
          <br><br>
          Fredofios terletak di sebidang tanah seluas 400 m dan bangunan 370m beralamat di JL. Seturan II 
          Perumnas Gg Indragiri B/II Condongsari Depok Sleman Yogyakarta, tepatnya berada diarah utara
          selokan mataram. Sekolah khusus untuk remaja autis usia 10 - 23 tahun pada jenjang SMOLB dan SMALB.
          Fredofios memiliki sekitar 18 pelajar dan xx anggota staff sekolah. Fredofios dibawah naungan Yayasan Autisma Nusantara.
          <br><br>
          Pembelajaran Anak dan Remaja Autis di Fredofios lebih
          mengarah ke Life Skill, dengan porsi belajar Keterampilan dan Seni 80% yang disesuaikan dengan Minat dan Potensi dari masing-masing siswa.
          Setiap anak digali potensinya dan dikembangkan sesuai potensi yang dimilikinya. Sehingga setiap anak akan berkembang sesuai mnat dan bakatnya masing-masing.</p>
       </v-flex>
      </v-card-text>
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
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2" @click="yutub()">
            <v-icon dark>mdi-youtube</v-icon>
          </v-btn>
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2" @click="wa()">
            <v-icon dark>mdi-whatsapp</v-icon>
          </v-btn>
          <v-btn class="mx-2" fab dark small color="blue-grey darken-2" @click="fb()">
            <v-icon dark>mdi-facebook</a></v-icon>
          </v-btn>
          <v-menu
            v-model="menu"
            :close-on-content-click="false"
            :nudge-width="100"
            top :offset-y="offset"
          >
          <template v-slot:activator="{ on }">
            <v-btn class="mx-2" fab dark small color="blue-grey darken-2" v-on="on">
              <v-icon dark>mdi-gmail</v-icon>
            </v-btn>
          </template>
          <v-card align="center" justify="center" color="blue-grey darken-2">
            <v-card-text class="white--text">
              fredofios@gmail.com
            </v-card-text>
          </v-card>
          </v-menu>
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
        ],
        menu: false,
        offset: true,
        items:[
          {title: 'Visi & Misi', route: '/spa/visi_misi'},
          {title: 'Faslitas Sekolah', route: '/spa/fasilitas'},
          {title: 'Staff Sekolah', route: '/spa/staff'}
        ],
        programs:[
          {title: 'Akademik', route: '/spa/akademik'},
          {title: 'Non Akademik', route: '/spa/non_akademik'},
        ],
      }
    },
    methods: {
      home(){
          this.$router.push({ name : 'home' })
      },
      kontak(){
          this.$router.push({ name : 'kontak' })
      },
      artikel(){
          this.$router.push({ name : 'artikel' })
      },
      galeri(){
          this.$router.push({ name : 'galeri' })
      },
      fb: function(){
        window.open('https://id-id.facebook.com/fredofios');
      },
      wa: function(){
        window.open('https://api.whatsapp.com/send?phone=6281226911571');
      },
      yutub: function(){
        window.open('https://www.youtube.com/channel/UCIQBMYvkv2kHfB-Aq4i59Lw');
      }
    },
}
</script>