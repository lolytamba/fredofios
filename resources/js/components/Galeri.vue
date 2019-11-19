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
import Controller from './../service/Galeri'

  export default {
    data () {
      return {
        cards: [
        { title: 'Kuas Melukis', src: '/aset/1.JPG', flex: 6 },
        { title: 'Angklung', src: '/aset/2.JPG', flex: 6 },
        { title: 'Batik', src: '/aset/3.JPG', flex: 6 },
        { title: 'Melukis', src: '/aset/4.JPG', flex: 6 },
        { title: 'Musik', src: '/aset/5.JPG', flex: 6 },
        { title: 'Karya Lukis', src: '/aset/7.JPG', flex: 6 },
        { title: 'Membuat Gelang', src: '/aset/6.JPG', flex: 6 },
        { title: 'Makan Siang', src: '/aset/8.JPG', flex: 6 },
        { title: 'Galeri Olahraga', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg',  flex: 6 },
        { title: 'Galeri Melukis', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
      ],
      }
    },
    methods: {
     
    }
  }
</script>