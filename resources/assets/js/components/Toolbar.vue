<template>
  <v-toolbar>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Phunny</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
    	<router-link class="navbar-item" to="/home">Home</router-link>
    	<router-link class="navbar-item" to="/phones">Phones</router-link>
    	<router-link class="navbar-item" to="/about">About</router-link>
    </v-toolbar-items>
  </v-toolbar>
</template>