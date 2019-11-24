<template>
  <v-card flat >
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
      <v-card-text style="height:auto" v-if="show">
      <v-row  
        align="star"
        justify="center"
        style="width:auto; height:auto;">
        <v-col 
          v-for="news in news_news"
          :key="news.id"
        >
          <v-card 
            color="white"
            style="width:350px; height:500px">
           <v-img
                :src="'/Artikel/'+news.gambar"
                class="white--text align-end"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                height="200px"
            >
            </v-img>
            <v-card-title>{{ news.judul}} </v-card-title>
            <v-card-text>
              {{news.diskripsi}}
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn small color="primary" @click="show=false;template=true;showHandler(news)" style="margin-top:110px">Lanjutkan membaca </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
      </v-card-text>
      <v-container v-if="template">
         <v-img
          :src="'/Artikel/'+artikel.gambar"
          class="white--text align-end"
          gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
          height="400px" 
          >
        </v-img>

        <v-card-text class="black--text text-justify">
          <v-flex class="display-2 font-weight-bold blue--text">
            {{ artikel.judul }}
          </v-flex>
          <br>
          <v-flex class="title font-weight-regular">
            {{ artikel.konten }}
          </v-flex>
        </v-card-text>
      </v-container>
    </v-card>
  </v-card>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'

  export default {
    data () {
      return {
        id: '',
        show: true,
        template: false,
        artikel : {
          id :'',
          judul: '',
          konten:'',
          diskripsi:''
        }
      }
    },
    computed: {
      ...mapState({
        loading: state => state.News.loading,
        error: state => state.News.error,
        news_news: state => state.News.news_news
      }),

      ...mapGetters({
      form: 'News/news',
      }),
    },

    methods:{
       ...mapActions({
        fetch: 'News/get',
      }),
      berita1(){
         this.$router.push({ name : 'berita1' })
      },
      showHandler(id){
        this.artikel = id
        console.log(this.artikel)
      }
    },
    
    mounted () {
        this.fetch()
    }
  }
</script>