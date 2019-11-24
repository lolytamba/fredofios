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
              v-for="galeri in galeries" :key="galeri.id"
              :cols="6"
            >
              <v-card>
                <v-img
                  :src="'/Galeri/'+galeri.gambar"
                  class="white--text align-end"
                  height="400px"
                >
                </v-img>
                 <v-card-text class="text--primary">{{ galeri.judul }} </v-card-text>
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
import { mapGetters, mapState, mapActions } from 'vuex'

  export default {
    data () {
      return {}
    },

    computed: {
      ...mapState({
        loading: state => state.Galeri.loading,
        error: state => state.Galeri.error,
        galeries: state => state.Galeri.galeries
      }),

      ...mapGetters({
      form: 'Galeri/galeri',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'Galeri/get',
      }),
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>