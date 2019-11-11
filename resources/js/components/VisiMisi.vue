<template>
 <v-card flat>
  <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
    <v-container fluid>
        <br>
        <v-subheader class="display-1 blue--text">Visi</v-subheader>
        <v-card-text class="subtitle-1 font-weight-regular">
            <v-icon color="red darken-1">flare</v-icon>
                Terwujudnya anak berkebutuhan khusus yang terampil sesuai bakat individu siswa dan mandiri berdasarkan iman dan taqwa.
        </v-card-text>
       

        <v-list>
            <v-subheader class="display-1 blue--text">Misi</v-subheader>
                <v-list-item
                    v-for="(item, i) in items"
                    :key="i"
                >
                    <v-list-item-icon>
                        <v-icon v-text="item.icon" color="orange darken-2"></v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-text v-text="item.text"></v-list-item-text>
                    </v-list-item-content>
                </v-list-item>
        </v-list>

    </v-container>
  </v-card>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        item: 1,
        items: [
            { text: 'Menyelenggarakan pembelajaran dengan pendekatan Pakem dan CTL secara efektif, terus menerus dan berkesinambungan sehingga setiap siswa dapat berkembang secara optimal.', icon: 'filter_1' },
            { text: 'Menerapkan manajemen peningkatan mutu berbasis sekolah yang ditunjukkan dengan kemandirian, kemitraan, partisipasi, keterbukaan, dan akuntabilitas.', icon: 'filter_2' },
            { text: 'Meningkatkan kualitas dan kuantitas tenaga pendidik dan tenaga kependidikan melalui uji sertifikasi, peningkatan kualifikasi, pengiriman diklat, dan pertemuan-pertemuan ilmiah.', icon: 'filter_3' },
            { text: 'Menumbuhkan semangat keunggulan secara intensif kepada semua warga sekolah.', icon: 'filter_4' },
            { text: 'Pengadaan sarana prasaran sekolah yang memenuhi standar minimal.', icon: 'filter_5' },
            { text: 'Menjalin hubungan kerja sama dengan instansi pemerintah, masyarakat, dunia usaha, dan industri.', icon: 'filter_6' },
            { text: 'Menumbuh kembangkan pengalaman agama, budaya luhur semua warga sekolah.', icon: 'filter_7' },
            { text: 'Meningkatkan citra, harkat, dan martabat anak berkebutuhan khusus sehingga tidak mendapatkan perlakuan yang diskriminatif dari pihak manapun.', icon: 'filter_8' },
        ],
      }
    },
  }
</script>