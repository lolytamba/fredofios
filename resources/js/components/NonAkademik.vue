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
              v-for="nonakademik in nonakademiks" :key="nonakademik.id"
              :cols="6"
            >
              <v-card>
                <v-img
                  :src="'/NonAkademik/'+nonakademik.gambar"
                  class="black--text align-end"
                  gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                  height="300px"
                >
                </v-img>
                 <v-card-text class="text--primary"> {{ nonakademik.judul }} </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
    <v-container></v-container>
  </v-card>
</template>

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
              v-for="nonakademik in nonakademiks" :key="nonakademik.id"
              :cols="6"
            >
              <v-card>
                <v-img
                  :src="'/NonAkademik/'+nonakademik.gambar"
                  class="black--text align-end"
                  height="400px"
                >
                </v-img>
                  <v-card-title>{{ nonakademik.judul }}</v-card-title>
                 <v-card-text class="text--primary"> {{ nonakademik.keterangan }} </v-card-text>
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
        loading: state => state.NonAkademik.loading,
        error: state => state.NonAkademik.error,
        nonakademiks: state => state.NonAkademik.nonakademiks
      }),

      ...mapGetters({
      form: 'NonAkademik/nonakademik',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'NonAkademik/get',
      }),
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>