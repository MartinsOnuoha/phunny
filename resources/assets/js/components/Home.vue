<template>
  <v-layout row>
    <v-flex xs12 sm6 offset-sm3>
      <v-card>
        <v-toolbar color="cyan" dark>
          <v-toolbar-side-icon></v-toolbar-side-icon>

          <v-toolbar-title>Contacts</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>
        </v-toolbar>

        <v-list two-line>
          <template v-for="(contact, index) in list">
            <v-subheader
              v-if="contact.header"
              :key="contact.header"
            >
              {{ contact.header }}
            </v-subheader>

            <v-divider
              v-else-if="contact.divider"
              :inset="contact.inset"
              :key="index"
            ></v-divider>

            <v-list-tile
              v-else
              :key="contact.name"
              avatar
              @click=""
            >
              <v-list-tile-avatar>
                <img src="/photo.jpg">
              </v-list-tile-avatar>
              <v-list-tile-content>
                <v-list-tile-title v-html="contact.name"></v-list-tile-title>
                <v-list-tile-sub-title v-html="contact.phone"></v-list-tile-sub-title>
              </v-list-tile-content>
            </v-list-tile>
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>

  	export default {
	    data() {
	  		return {
	  			list: [
	  				{ header: 'Today' },
	  				{ divider: true, inset: true },
	  			],
	  		}
  		},
	  	mounted() {
			axios.get('/phonebook/list')
				.then((response) => this.list = response.data)
				.catch((error) => this.errors = error.response.data.errors)
	  			.then(() => { this.$data.msg = 'Loaded Contacts' });
		},
  };
</script>


