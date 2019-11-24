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
        <v-card-text class="subtitle-1 font-weight-regular"
            v-for="(itemVisi, i) in itemsVisi"
            :key="i">
            <v-icon color="red darken-1">flare</v-icon>
                {{ itemVisi.isi_visi }}
        </v-card-text>
       

        
        <v-subheader class="display-1 blue--text">Misi</v-subheader>
         <v-card-text class="subtitle-1 font-weight-regular"
            v-for="(item, i) in items"
            :key="i">
            <v-icon color="red darken-1">wb_sunny</v-icon>
                {{ item.isi_misi }}
        </v-card-text>
    </v-container>
  </v-card>
  </v-card>
</template>

<script>
import Controller from './../service/Misi'
import ControllerVisi from './../service/Visi'

  export default {
    data () {
      return {
          i: 1,
          items: [],
          item:{
            isi_misi :'',
          },
          itemsVisi: [],
          itemVisi:{
            isi_visi :'',
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
        async getVisi(){
          try{
              this.itemsVisi = (await ControllerVisi.get())
          }catch(err){
              console.log(err)
          }
        },
    },

   mounted(){
      this.get()
      this.getVisi()
    }, 
  }
</script>