<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
      <v-card-text style="height:auto">
        <p class="Headline text-center font-weight-bold">Pengurus-Pengurus Fredofios</p>
        <v-row 
         v-for="staff in staffs"
        :key="staff.id"
        justify="space-around" v-if="staff.jabatan === 'Kepala Sekolah'">
            <v-avatar size="200">
                <v-img
                    :src="'/Staff/'+staff.gambar"
                ></v-img>
            </v-avatar>
            <v-list-item class="pb-7">
                <v-list-item-content>
                    <v-list-item-title class="title font-weight-black text-center">{{ staff.nama }}</v-list-item-title>
                    <v-list-item-subtitle class="font-weight-bold text-center">{{ staff.jabatan }}</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-row>
        <v-row>
        <v-col
        v-for="staff in staffs"
        :key="staff.id"
        :cols="4"
        v-if="staff.jabatan != 'Kepala Sekolah'">
        <v-avatar size="200" style="left:80px" >
                <v-img
                    :src="'/Staff/'+staff.gambar"
                ></v-img>
            </v-avatar>
            <v-list-item class="pb-7">
                <v-list-item-content>
                    <v-list-item-title class="title font-weight-black text-center">{{ staff.nama }}</v-list-item-title>
                    <v-list-item-subtitle class="font-weight-bold text-center">{{ staff.jabatan }}</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>  
        </v-col>
        </v-row>
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
        loading: state => state.Staff.loading,
        error: state => state.Staff.error,
        staffs: state => state.Staff.staffs
      }),

      ...mapGetters({
      form: 'Staff/staff',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'Staff/get',
      }),
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>