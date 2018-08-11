<template>
	<div class="modal" :class="openmodal">
	    <div class="modal-background"></div>
	    <div class="modal-card">
	      	<header class="modal-card-head">
	        	<p class="modal-card-title">Modal title</p>
	        	<button class="delete" aria-label="close" @click="closeModal"></button>
	      	</header>
	      	<section class="modal-card-body">
	        	<div class="field">
				  	<div class="control">
				    	<input class="input is-small" type="text" placeholder="Name" v-model="list.name">
				  	</div>
				</div>
				<div class="field">
				  	<div class="control">
				    	<input class="input is-small" type="text" placeholder="Phone" v-model="list.phone">
				  	</div>
				</div>
				<div class="field">
				  	<div class="control">
				    	<input class="input is-small" type="email" placeholder="Email" v-model="list.email">
				  	</div>
				</div>

	      	</section>
	      	<footer class="modal-card-foot">
	        	<button class="button is-success" @click="savePhone">Save changes</button>
	        	<button class="button" @click="closeModal">Cancel</button>
	      	</footer>
	    </div>
	</div>
</template>


<script>

  	export default {

    	props:['openmodal'],

    	data() {
      		return {
      			list: {
      				name: '',
      				phone: '',
      				email: ''
      			},
      		}
    	},

    	methods: {
    		closeModal() {
    			this.$emit('closeRequest');
    		},
    		savePhone() {
    			axios.post('/phonebook', this.$data.list).then( this.closeModal() )
					.catch((error) => console.log(error));
    		}
    	}
  	};  
</script>