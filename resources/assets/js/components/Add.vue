<template>
	<div class="modal" :class="openmodal">
	    <div class="modal-background"></div>
	    <div class="modal-card">
	      	<header class="modal-card-head">
	        	<p class="modal-card-title">Add Contact</p>
	        	<button class="delete" aria-label="close" @click="closeModal"></button>
	      	</header>
	      	<section class="modal-card-body">
	        	<div class="field">
				  	<div class="control">
				    	<input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="list.name">
				  	</div>
				  	<small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
				</div>
				<div class="field">
				  	<div class="control">
				    	<input class="input" :class="{'is-danger':errors.phone}" type="text" placeholder="Phone" v-model="list.phone">
				  	</div>
				  	<small class="has-text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
				</div>
				<div class="field">
				  	<div class="control">
				    	<input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Email" v-model="list.email">
				  	</div>
				  	<small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
				</div>

	      	</section>
	      	<footer class="modal-card-foot">
	        	<button class="button is-success" @click="savePhone">Save</button>
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
      			errors: {},
      		}
    	},
    	methods: {
    		closeModal() {
    			this.$emit('closeRequest');
    		},
    		savePhone() {
    			axios.post('/phonebook', this.$data.list)
    				.then((response) => {     					
    					this.closeModal();
    				})
					.catch((error) => this.errors = error.response.data.errors);
    			location.reload(true);
    		}
    	}
  	};  
</script>