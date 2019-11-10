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
          <p style="text-indent:60px">Sekolah Lanjutan Autis Fredofios merupakan sekolah khusus untuk remaja autis usia 10 - 23 tahun pada jenjang SMOLB dan SMALB, 
          yang telah memiliki kemampuan dasar dan telah mendapatkan terapi/pendidikan sebelumnya. Pembelajaran Anak dan Remaja Autis di Fredofios lebih
          mengarah ke Life Skill, dengan porsi belajar Keterampilan dan Seni 80% yang disesuaikan dengan Minat dan Potensi dari masing-masing siswa.
          Setiap anak digali potensinya dan dikembangkan sesuai potensi yang dimilikinya. Sehingga setiap anak akan berkembang sesuai mnat dan bakatnya masing-masing.</p>
          
          <p style="text-indent:60px">FREDOFIOS diambil dari 3 nama orang yang menjadi cikal bakal berdirinya sekolah ini. Fred dari nama Fred Vrugteveen, seorang konsultan pendidikan dari Belanda 
          yang bekerja sebagai sukarelawan dan membimbing serta mendukung terbentuknya sekolah lanjutan autis di yogyakarta ini. 
          Of berasal dari nama Ofiq (Muhammad Harun Arofiq Siregar) seorang penyandang autis putra dari Ir. Dikran Ar Rasyid Siregar dan Zubaidah Hasibuan,BSc, 
          pemilik sekolah ini. Dan Os dari nama Osi (Aussie Novarga) seorang penyandang autis putra dari Ir. Bugi Rustamdji, MSc dan Ir. Sri Sudaryati, MS, 
          ketua Yayasan Autisma Nusantara dan Kepala sekolah.</p>

          <p class="font-weight-black"><u>Visi Sekolah</u><br>Terwujudnya anak berkebutuhan khusus yang terampil sesuai bakat individu siswa dan mandiri berdasarkan iman dan taqwa</p>
          <p class="font-weight-black"><u>Misi Sekolah</u><br>Untuk mewujudkan Visi tersebut SLA Fredofios merumuskan Misi sebagai berikut:
          <br>1.Menyelenggarakan pembelajaran dengan pendekatan Pakem dan CTL secara efektif,
             terus menerus dan berkesinambungan, sehingga setiap siswa dapat berkembang secara optimal.<br> 
             2.Menerapkan manajemen peningkatan mutu berbasis sekolah yang ditunjukkan dengan kemandirian, kemitraan, partisipasi,
             keterbukaan, dan akuntabilitas.<br>
             3. Meningkatkan kualitas dan kuantitas tenaga pendidik dan tenaga kependidikan melalui uji sertifikasi, peningkatan kualifikasi, pengiriman diklat, dan pertemuan-pertemuan ilmiah.<br>
             4. Menumbuhkan semangat keunggulan secara intensif kepada semua warga sekolah.<br>
             5. Pengadaan sarana prasaran sekolah yang memenuhi standar minimal.<br>
             6. Menjalin hubungan kerja sama dengan instansi pemerintah, masyarakat, dunia usaha, dan industri.<br>
             7. Menumbuh kembangkan pengalaman agama, budaya luhur semua warga sekolah.<br>
             8. Meningkatkan citra, harkat, dan martabat anak berkebutuhan khusus sehingga tidak mendapatkan perlakuan yang diskriminatif dari pihak manapun.
             </p>
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