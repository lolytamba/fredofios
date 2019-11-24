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
                  <v-icon color="orange darken-2">wb_sunny</v-icon>
                  <v-list-item-content>
                      <v-list-item-text v-text="item.isi_misi"></v-list-item-text>
                  </v-list-item-content>
                </v-list-item>
        </v-list>

    </v-container>
  </v-card>
  </v-card>
</template>

<script>
import Controller from './../service/Misi'

  export default {
    data () {
      return {
        i: 1,
        items: [],
        item:{
          isi_misi :'',
        },
      }
    },

    methods: {
      async get(){
            try{
                this.items = (await Controller.get())
            }catch(err){
                console.log(err)
            }
        },
    },

    mounted(){
      this.get()
    },

  }
</script>