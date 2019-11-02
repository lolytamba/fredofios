<template>
  <v-card flat>
    <v-card
      class="mx-auto"
      max-width="1200"
      style="margin-top:-40px" 
    >
     <v-divider></v-divider>
      <v-card-text style="height: 430px;.">
        <v-carousel
            cycle
            height="400"
            hide-delimiter-background
            show-arrows-on-hover
        >
            <v-carousel-item
            v-for="(slide, i) in slides"
            :key="i"
            >
            <v-sheet
                :color="colors[i]"
                height="100%"
            >
                <v-row
                class="fill-height"
                align="center"
                justify="center"
                >
                <div class="display-3">{{ slide }} Slide</div>
                </v-row>
            </v-sheet>
            </v-carousel-item>
        </v-carousel>
      </v-card-text>
    </v-card>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        colors: [
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
      }
    },
  }
</script>