<template>
	<nav class="panel column is-offset-2 is-8">
		<p class="panel-heading">
		  	Phunny Book
			<v-btn color="info" class="red ml-5">Add New</v-btn>
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
			<span class="panel-icon">
				<i class="fas fa-book" aria-hidden="true"></i>
			</span>
		  	bulma
		</a>
		<div class="panel-block">
			<button class="button is-primary is-outlined is-fullwidth">
				reset all filters
		  	</button>
		</div>
	</nav>
</template>