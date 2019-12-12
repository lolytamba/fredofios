<template>
<v-app>
  <v-img
    src="/aset/logo.png"
    height="150"
    contain
    style="right:300px; top:40px"
  ></v-img>
    <v-img
      src="/aset/moto2.png"
      contain
      height="150"
      style="left: 250px; top: -110px"
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
                  v-for="item in itemsTentang"
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
import { mapGetters, mapState, mapActions } from 'vuex'
import Controller from './../service/Tentang'
export default {
    data () {
      return {
        items: [],
        item:{
          isi_tentang :'',
        },
        menu: false,
        offset: true,
        itemsTentang:[
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
      ...mapActions({
        fetch: 'Carousel/get',
      }),

      async get(){
          try{
              this.items = (await Controller.get())
          }catch(err){
              console.log(err)
          }
        },

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

    mounted(){
      this.get()
      this.fetch()
    },
}
</script>