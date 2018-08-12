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
				<button class="button is-outlined is-fullwidth h" @click="">
					delete all contact
			  	</button>
			</div>
		</nav>


		<div class="notification is-primary text-center">
	    	<button class="delete"></button>
	    	<strong>{{ msg }}</strong>
	  	</div>


		<Add :openmodal='addActive' @closeRequest="closeModal"></Add>
		<Show :openmodal='showActive' @closeRequest="closeModal"></Show>
		<Update :openmodal='updateActive' @closeRequest="closeModal"></Update>
		<SnackError v-if="failure"></SnackError>
	</div>

</template>

<style type="text/css">

	  .notification {
	    position: -webkit-sticky;
	    position: sticky;
	    bottom: 0;
	    padding: 50px;
	    font-size: 20px;
	    margin: 0 auto;
	    width: 30%;
	    z-index: 21;
	    float: right;
	  }
	.text-center {

	}
</style>
<script>

let Add = require('./Add');
let Show = require('./Show');
let Update = require('./Update');
let SnackSuccess = require('./SnackSuccess');
let SnackError = require('./SnackError');

    export default {
 
      	components: {Add, Show, Update, SnackSuccess, SnackError},

      	data() {
      		return {
      			addActive: '',
      			showActive: '',
      			updateActive: '',
      			list: {},
      			errors: {},
      			success: false,
      			failure: false,
      			msg: ''
      		}
      	},
      	mounted() {
			axios.get('/phonebook/list')
				.then((response) => this.list = response.data)
				.catch((error) => this.errors = error.response.data.errors)
	  			.then(() => { this.$data.msg = 'Loaded Contacts' });
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
      			this.$data.msg = 'Contact updated'
      		},
      		closeModal() {
      			this.addActive = this.showActive = this.updateActive = '';
      		},
      		updateNotify() {
      			this.$data.msg = 'Contact updated'
      		}
      	}
    };

</script>