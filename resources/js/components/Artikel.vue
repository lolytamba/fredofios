<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
      <v-card-text style="height:auto">
      <v-row  
        align="star"
        justify="center"
        style="width:auto; height:auto;">
        <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 1</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn small color="primary" @click="berita1">Lanjutkan membaca </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-spacer></v-spacer>
         <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 2</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn small color="primary" @click="berita2">Lanjutkan membaca </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-spacer></v-spacer>
         <v-col>
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
              src="https://cdn.vuetifyjs.com/images/cards/house.jpg"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
              <v-card-title>berita 3</v-card-title>
            </v-img>
            <v-card-text>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn small color="primary" @click="berita3">Lanjutkan membaca </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
      </v-card-text>
    </v-card>
    <v-container></v-container>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
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