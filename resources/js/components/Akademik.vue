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
              v-for="akademik in akademiks" :key="akademik.id"
              :cols="6"
            >
              <v-card>
                <v-img
                  :src="'/Akademik/'+akademik.gambar"
                  class="white--text align-end"
                  gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                  height="400px"
                >
                </v-img>
                <v-card-title>{{ akademik.judul }}</v-card-title>
                 <v-card-text class="text--primary"> {{ akademik.keterangan }} </v-card-text>
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
        loading: state => state.Akademik.loading,
        error: state => state.Akademik.error,
        akademiks: state => state.Akademik.akademiks
      }),

      ...mapGetters({
      form: 'Akademik/akademik',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'Akademik/get',
      }),
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>