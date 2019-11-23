<template>
 <v-card flat>
  <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
     <v-card-text style="height:auto">
    <v-container fluid>
        <v-row>
          <v-col
            v-for="facility in facilities"
            :key="facility.id"
            :cols="12"
          >
            <v-card
              class="mx-auto"
              max-width="1200"
              height="auto"
            >
              <v-img
                :src="'/Fasilitas/'+facility.gambar"
                class="white--text align-end"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                height="400px"
                >
                <v-card-title>{{ facility.judul }}</v-card-title>
              </v-img>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
  </v-card>
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
        loading: state => state.Facility.loading,
        error: state => state.Facility.error,
        facilities: state => state.Facility.facilities
      }),

      ...mapGetters({
      form: 'Facility/facility',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'Facility/get',
      }),
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>