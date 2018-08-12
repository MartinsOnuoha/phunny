<template>

  	<v-snackbar
  		v-model="snackbar"
    	:color="color"
    	:multi-line="mode"
    	:timeout="timeout"
  	>
    	{{ text }}
    	<v-btn
      	dark
      	flat
      	@click="snackbar = false"
    	>
      		Close
    	</v-btn>
  	</v-snackbar>
</template>

<script>

  	export default {

    	data () {
      		return {
        		snackbar: true,
        		color: 'red lighten-2',
        		mode: 'multi-line',
        		timeout: 6000,
        		text: `An Error occurred.`
      		}
    	},
  	};
</script>