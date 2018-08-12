<template>
	<div>
		<nav class="panel column is-offset-2 is-8">
			<p class="panel-heading">
			  	Phone Book
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

			<a class="panel-block is-active" v-for="item,key in list">
				<span class="column is-9">
			  		{{ item.name }}
				</span>
				<span class="column is-1">
					<v-icon color="red lighten-2">delete</v-icon>
				</span>
				<span class="column is-1">
					<v-icon color="green lighten-2" @click="openUpdate(key)">edit</v-icon>
				</span>
				<span class="column is-1">
					<v-icon @click="openDetails(key)">face</v-icon>
				</span>
			</a>

			<div class="panel-block">
				<button class="button is-outlined is-fullwidth h" @click="getPhones">
					delete all contact
			  	</button>
			</div>
		</nav>

		<Add :openmodal='addActive' @closeRequest="closeModal"></Add>
		<Show :openmodal='showActive' @closeRequest="closeModal"></Show>
		<Update :openmodal='updateActive' @closeRequest="closeModal"></Update>
	</div>

</template>

<script>

let Add = require('./Add');
let Show = require('./Show');
let Update = require('./Update');

    export default {
 
      	components: {Add, Show, Update},

      	data() {
      		return {

      			addActive: '',
      			showActive: '',
      			updateActive: '',
      			list: {},
      			errors: {}
      		}
      	},
      	mounted() {
			axios.get('/phonebook/list')
				.then((response) => this.list = response.data)
				.catch((error) => this.errors = error.response.data.errors)
	  			.then(() => { });
    	},
      	methods: {

      		openAdd() {
      			this.addActive = 'is-active';
      		},      		
      		openDetails(key) {
      			this.$children[2].list = this.list[key]
      			this.showActive = 'is-active';
      		},
      		openUpdate(key) {
      			this.$children[3].list = this.list[key]
      			this.updateActive = 'is-active';
      		},
      		closeModal() {
      			this.addActive = this.showActive = this.updateActive = '';
      		},
			getPhones() {
				axios.get('/phonebook/list').then((response) => console.log(response))
					.catch((error) => console.log(error))
			  		.then(() => { });
			}
      	}
    };

</script>