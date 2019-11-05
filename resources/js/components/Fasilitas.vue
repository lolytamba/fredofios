<template>
  <v-container fluid>
      <v-row>
        <v-col
          v-for="card in cards"
          :key="card.title"
          :cols="12"
        >
          <v-card
            class="mx-auto"
            max-width="1200"
            height="auto"
          >
            <v-img
              :src="card.src"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="300px"
              >
              <v-card-title>{{ card.title }}</v-card-title>
            </v-img>


            <v-card-text class="text--primary">
              <div>{{ card.text }}</div>
            </v-card-text>

          </v-card-item>
          </v-card>
          </v-col>
          </v-row>
          </v-container>
</template>

<script>
  export default {
    data () {
      return {
        cards: [
          {
          title: 'Kolam Renang',
            src: 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Lafayette_High_School_%28Lexington%2C_KY%29_in_August_2019.jpg',
          text: 'lorem ipsum'
          },
          {
            title: 'Ruang Komputer',
            src: 'https://www.thelocal.se/userdata/images/article/f399c757d392dd0d8bdfc817a9993176f527de128bb7d1928a85c9ce0c0aabd5.jpg',
            text: 'lorem ipsum'
          },
          {
            title: 'Ruang Kelas',
            src: 'https://www.warringtonguardian.co.uk/resources/images/10137723.jpg?display=1&htype=0&type=responsive-gallery',
            text: 'lorem ipsum'
          },
          {
            title: 'Toilet',
            src: 'https://www.expatica.com/uk/wp-content/uploads/sites/10/2019/01/School-Holidays-1920x1080.jpg',
            text: 'lorem ipsum'
          }
        ]
        
      }
    },
  }
</script>