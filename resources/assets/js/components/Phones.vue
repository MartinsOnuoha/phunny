<template>
	<div>
		<nav class="panel column is-offset-2 is-8">
			<p class="panel-heading">
			  	Manage PhoneBook 
				<v-btn slot="activator" color="cyan lighten-2" class="ml-5" @click="openAdd">
				 	Add New
				</v-btn>
				<v-btn slot="activator" color="green lighten-2" class="ml-5" @click="sortContacts">
				 	Sort Contacts
				</v-btn>
	 		</p>
			<div class="panel-block">
				<p class="control has-icons-left">
					<input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
					<span class="icon is-small is-left">
					  <v-icon>search</v-icon>
					</span>
				</p>
			</div>

			<a class="panel-block is-active" v-for="item,key in temp">
				<span class="column is-9">
			  		{{ item.name }}
				</span>
				<span class="column is-1">
					<v-icon color="red lighten-2" @click="del(key,item.id)">delete</v-icon>
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


		<div class="notification is-primary">
		    <v-progress-circular
		      v-if="load == true"
		      class="v-loader"
		      indeterminate
		      color="primary"
		    >
		    </v-progress-circular>
	    	<strong>{{ msg }}</strong>
	  	</div>


		<Add :openmodal='addActive' @closeRequest="closeModal"></Add>
		<Show :openmodal='showActive' @closeRequest="closeModal"></Show>
		<Update :openmodal='updateActive' @closeRequest="closeModal"></Update>
	</div>

</template>


<style type="text/css">
	.spinner {
		height: 20px;
		width: 20px;
		float: right !important;
	}
	.notification {
	   position: -webkit-sticky;
	   position: sticky;
	   bottom: 0;
	   /*padding: 50px;*/
	   font-size: 15px;
	   margin: 0 auto;
	   width: 25%;
	   z-index: 21;
	   float: right;
	  }
	.v-loader {
		margin: 0.2rem;
		height: 5px;
		width: 5px;
	}
</style>


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
      			deleteActive: '',
      			list: {},
      			errors: {},
      			load: false,
      			searchQuery: '',
      			temp: '',
      			msg: ''
      		}
      	},
      	mounted() {
      		this.getFreshData();
    	},
    	watch: {
    		// Run function on search input change
			searchQuery() {
				if (this.searchQuery.length > 0) {
					this.temp = this.list.filter((contact) => {
						return Object.keys(contact).some((key) => {
							// convert to String
							let str = String(contact[key])

							return str.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
						})
					})
				} else {
					this.temp = this.list
				}
			}    		
    	},

      	methods: {

      		openAdd() {
      			this.addActive = 'is-active';
      		},    
      		// Show Contact Details  		
      		openDetails(key) {
      			this.$children[3].list = this.temp[key]
      			this.showActive = 'is-active';
      		},
      		// Refresh Contact List
      		getFreshData() {
      			this.toggleLoader();
      			this.$data.msg = 'Please Wait';

				axios.get('/phonebook/list')
					.then((response) => {
						setTimeout(() => {
							this.list = this.temp = response.data
							this.toggleLoader();
							this.updateNotify();
						}, 1000);

					})
					.catch((error) => this.errors = error.response.data.errors)
		  			.then(() => { });
	    	},
	    	// Delete Contact by ID || Remove from list by key
      		del(key, id) {
				axios.delete(`phonebook/${id}`)
					.then((response) => console.log('deleted'))
					.catch((error) => this.errors = error.response.data.errors)
		  			.then(() => {});
		  		this.getFreshData();
      		},
      		// Open Update Modal
      		openUpdate(key) {
      			this.$children[3].list = this.temp[key]
      			this.updateActive = 'is-active';
      			this.$data.msg = 'Contact updated'
      		},
      		// Close all Modals
      		closeModal() {
      			this.addActive = this.showActive = this.updateActive = '';
      		},
      		// Message after every reload
      		updateNotify() {
      			return this.$data.msg = 'Contacts updated'
      		},
      		// Toggle loader dynamically
      		toggleLoader() {
      			if (this.$data.load) {
      				this.$data.load = false;
      			} else {
      				this.$data.load = true;
      			}
      		},
      		// Sort Contacts by Name
      		sortContacts() {
      			this.list.sort((a, b) => {
      				if (a.name > b.name) {
      					return 1
      				} else if (a.name < b.name) {
      					return -1
      				}
      			})
      		}
      	}
    };

</script>