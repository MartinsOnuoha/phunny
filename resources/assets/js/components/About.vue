<template>
  <v-container>    
    <v-layout>
      <v-flex xs12 sm6 offset-sm3>
        <v-card>
          <v-card-media
            src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
            height="200px"
          ></v-card-media>

          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">Phunny</h3>
              <div>Phunny is some sort of <i>Funny</i> phone records tracker</div>
            </div>
          </v-card-title>

          <v-card-actions>
            <v-btn flat color="orange">Share</v-btn>
            <v-btn flat color="orange">Explore</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>