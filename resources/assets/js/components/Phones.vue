<template>
	<div>
		<nav class="panel column is-offset-2 is-8">
			<p class="panel-heading">
			  	Phunny Book
				 <v-btn slot="activator" color="cyan lighten-2" class="ml-5" @click="openAdd">
				 	Add New
				</v-btn>
	 		</p>
			<div class="panel-block">

				<p class="control has-icons-left">
					<input class="input is-small" type="text" placeholder="search">
					<span class="icon is-small is-left">
					  <i class="fas fa-search" aria-hidden="true"></i>
					</span>
				</p>
			</div>

			<a class="panel-block is-active">
				<span class="column is-9">
			  		bulma
				</span>
				<span class="column is-1">
					<v-icon color="red lighten-2">delete</v-icon>
				</span>
				<span class="column is-1">
					<v-icon color="green lighten-2">edit</v-icon>
				</span>
				<span class="column is-1">
					<v-icon>face</v-icon>
				</span>
			</a>
			<div class="panel-block">
				<button class="button is-outlined is-fullwidth" @click="getPhones">
					reset all filters
			  	</button>
			</div>
		</nav>

		<Add :openmodal='addActive' @closeRequest="closeAdd"></Add>
	</div>

</template>

<script>
let Add = require('./Add');

    export default {
 
      	components: {Add},

      	data() {
      		return {

      			addActive: ''
      		}
      	},
      	methods: {

      		openAdd() {
      			this.addActive = 'is-active';
      		},
      		closeAdd() {
      			this.addActive = ''
      		},
			getPhones() {
				axios.get('/phonebook/list').then((response) => console.log(response))
					.catch((error) => console.log(error))
			  		.then(() => { });
			}
      	}
    };

</script>