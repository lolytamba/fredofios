<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
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
      berita1(){
         this.$router.push({ name : 'berita1' })
      },
      berita2(){
         this.$router.push({ name : 'berita2' })
      },
      berita3(){
         this.$router.push({ name : 'berita3' })
      }
    },
  }
</script>
