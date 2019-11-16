<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-camera</v-icon>
          </v-list-item-action>
          <v-list-item-content @click="AddGaleri">
            <v-list-item-title>Galeri</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="blue lighten-1"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>Admin Fredofios</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <router-view></router-view>
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
  export default {
    data(){
        return{
            drawer: null,
        }
    },

    methods: {
        AddGaleri(){
          this.$router.push({ name : 'AddGaleri' })
      },
    },
  }
</script>