<template>
<v-app>
    <v-card flat>
        <v-card
        class="mx-auto"
        max-width="1200"
        style="margin-top: 150px;"
        >
        <v-toolbar flat
        color="blue lighten-1" 
        style="center">
            <v-toolbar-items>
                <v-btn text color="white" style="right: 0px;" @click="home">BERANDA</v-btn>
                <v-btn text color="white" style="right: -100px;">TENTANG KAMI</v-btn>
                <v-btn text color="white" style="right: -200px;">AUTISME</v-btn>
                <v-btn text color="white" style="right: -300px;">PROGRAM</v-btn>
                <v-btn text color="white" style="right: -400px;">GALERI</v-btn>
                <v-btn text color="white"  style="right: -500px;">KONTAK</v-btn>  
            </v-toolbar-items>
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
                    :key="i"
                    >
                    <v-sheet
                        :color="colors[i]"
                        height="100%"
                    >
                        <v-row
                        class="fill-height"
                        align="center"
                        justify="center"
                        >
                        <div class="display-3">{{ slide }} Slide</div>
                        </v-row>
                    </v-sheet>
                    </v-carousel-item>
                </v-carousel>
            </v-card-text>
        </v-card>
    </v-card>
    <v-content>
    </v-content>
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
      <v-card-title class="teal lighten-2">
        <strong class="subheading">Get connected with us on social networks!</strong>

        <v-spacer></v-spacer>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
      </v-card-text>
    </v-card>
  </v-footer>
  </v-app>
</template>

<script>
export default {
    data () {
      return {
        colors: [
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
      }
    },
    methods: {
        home(){
            this.$router.push({ name : 'home' })
        }
    },
}
</script>