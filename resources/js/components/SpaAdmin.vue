<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      fixed
    >
      <v-list dense>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-camera</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddGaleri">
            <v-list-item-title class="subtitle-2">Galeri</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-book-open-variant</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddAkademik">
            <v-list-item-title class="subtitle-2">Program Akademik</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-creation</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddNonAkademik">
            <v-list-item-title class="subtitle-2">Program Non Akademik</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-vector-circle</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddFasilitas">
            <v-list-item-title class="subtitle-2">Fasilitas</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-account-multiple</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddStaff">
            <v-list-item-title class="subtitle-2">Staff</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-key</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddVisiMisi">
            <v-list-item-title class="subtitle-2">Visi Misi</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

       <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-playlist-plus</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddTentang">
            <v-list-item-title class="subtitle-2">Tentang</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
      
      <v-list-item link>
          <v-list-item-action>
            <v-icon>assignment</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddArtikel">
            <v-list-item-title class="subtitle-2">Artikel</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

    </v-navigation-drawer>

    <v-app-bar
      app
      color="blue lighten-1"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>Admin Fredofios</v-toolbar-title>
       <v-spacer></v-spacer>
        <v-btn class="ma-2" outlined color="white"  @click="logoutHandler">
        <v-icon>mdi-logout</v-icon>
          Logout
        </v-btn>

    </v-app-bar>
  
    <v-content>
    <v-container>
      <router-view></router-view>
    </v-container>
    </v-content>

    <v-footer
      color="blue lighten-1"
      app
    >
      <span class="white--text text-center">&copy; Fredofios</span>
    </v-footer>
    
  </v-app>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'

  export default {
    data(){
        return{
            drawer: null,
        }
    },
    computed: {
      ...mapState({
          loading: state => state.Token.loading,
          error: state => state.Token.error,
          token: state => state.Token.token,
        }),
    },

    methods: {
      ...mapActions({
        destroyToken: 'Token/deleteToken',
      }),

      ...mapGetters({
        loggedIn: 'Token/loggedIn',
      }),
      
      async logoutHandler() {
          await this.destroyToken()
          this.$router.push({ name : 'login' })
      },

      AddGaleri(){
          this.$router.push({ name : 'AddGaleri' })
      },
      AddAkademik(){
          this.$router.push({ name : 'AddAkademik' })
      },
      AddNonAkademik(){
          this.$router.push({ name : 'AddNonAkademik' })
      },
      AddFasilitas(){
          this.$router.push({ name : 'AddFasilitas' })
      },
      AddStaff(){
          this.$router.push({ name : 'AddStaff' })
      },
      AddVisiMisi(){
          this.$router.push({ name : 'AddVisiMisi' })
      },
      AddTentang(){
          this.$router.push({ name : 'AddTentang' })
      },
      AddArtikel(){
        this.$router.push({ name: 'AddArtikel'})
      }
    },
  }
</script>

<style>
div.logout{
  position: relative;
  left: 1000px;
}
</style>