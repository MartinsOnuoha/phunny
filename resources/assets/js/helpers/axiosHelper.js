// module "axiosHelper.js"
function getFreshData() {
	axios.get('/phonebook/list')
		.then((response) => this.list = response.data)
		.catch((error) => this.errors = error.response.data.errors)
		.then(() => { this.$data.msg = 'Loaded Contacts' });
}

export { getFreshData };
