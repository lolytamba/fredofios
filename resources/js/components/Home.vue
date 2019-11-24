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
              v-for="(carousel, i) in carousels"
              :key="carousel.id"
            >
            <v-img 
              :src="'/Carousel/'+carousel.gambar"
              height="100%"
              class="white--text align-end">
              <v-row
                class="fill-height"
                align="center"
                justify="center"
              >
              <div class="display-3">{{ carousel.judul }}</div>
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

       <v-flex class="title font-weight-regular"
          v-for="(item, i) in items"
          :key="i">
          {{ item.isi_tentang }}
       </v-flex>
      </v-card-text>
    </v-container>

    
  </v-card>
</template>

<script>
import Controller from './../service/Tentang'
import { mapGetters, mapState, mapActions } from 'vuex'

  export default {
    data () {
      return {
        items: [],
        item:{
          isi_tentang :'',
        },
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

    computed: {
      ...mapState({
        loading: state => state.Carousel.loading,
        error: state => state.Carousel.error,
        carousels: state => state.Carousel.carousels
      }),

      ...mapGetters({
      form: 'Carousel/carousel',
      }),
    },

    methods: {
       async get(){
          try{
              this.items = (await Controller.get())
          }catch(err){
              console.log(err)
          }
        },

        ...mapActions({
        fetch: 'Carousel/get',
      }),
        
    },

     mounted(){
      this.get()
      this.fetch()
    },
  }
</script>
