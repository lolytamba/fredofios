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
                  class="white--text align-end"
                  gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                  height="400px"
                >
                  <v-card-title v-text="card.title"></v-card-title>
                </v-img>
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
        { title: 'Gambar 1', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', desc:'ini keterangan', flex: 12 },
        { title: 'Gambar 2', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Gambar 3', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Gambar 4', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', desc:'ini keterangan', flex: 12 },
        { title: 'Gambar 4', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', desc:'ini keterangan', flex: 6 },
        { title: 'Gambar 5', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', desc:'ini keterangan', flex: 6 },
      ],
      }
    },
  }
</script>