<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
      <v-card-text style="height:auto">
        <v-container fluid>
          <v-row dense>
            <v-col
              v-for="card in cards"
              :key="card.title"
              :cols="card.flex"
            >
              <v-card>
                <v-img
                  :src="card.src"
                  class="black--text align-end"
                  height="300px"
                >
                </v-img>
                  <v-card-title v-text="card.title"></v-card-title>
                 <v-card-text class="text--primary" v-text="card.desc"></v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
    <v-container></v-container>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        cards: [
        { title: 'Batik', src: '/aset/Batik.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Kriya', src: '/aset/Kriya.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Masak', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Melukis', src: '/aset/Melukis.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Musik', src: '/aset/Musik.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Olahraga', src: '/aset/Olahraga.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Pengenalan Masak', src: '/aset/PengenalanMasak.JPG', desc:'ini keterangan', flex: 6 },
        { title: 'Pramuka', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Berenang', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Tata Boga', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
      ],
      }
    },
  }
</script>