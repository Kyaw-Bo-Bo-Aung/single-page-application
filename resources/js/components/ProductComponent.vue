<template>
	<div class="container my-5">
		<div class="row justify-content-end mb-3">
			<div class="col-2">
				<button class="btn btn-primary">Create</button>
			</div>
			<div class="col-6">
				<form>
					<div class="input-group">
						<input type="text" name="" class="form-control">
						<div class="input-group-append">
							<button type="submit" class="btn btn-success">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="card">
					<h4 class="card-header">Create</h4>
					<div class="card-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input type="text" name="" class="form-control">
							</div>
							<div class="form-group">
								<label>Price:</label>
								<input type="number" name="" class="form-control">
							</div>
							<button class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-8">
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="product in products" :key='product.id'>
							<td>{{product.id}}</td>
							<td>{{product.name}}</td>
							<td>{{product.price}}</td>
							<td><button class="btn btn-warning btn-sm">Edit</button>
								<button class="btn btn-danger btn-sm">Delete</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</template>

<script>
export default {

	name: 'ProductComponent',

	data () {
		return {
			products: []
		}
	},
	methods: {
		view () {
			axios.get('/api/products')
			.then((res) => {
				this.products = res.data;
			})
		}
	},
	created() {
		this.view();
	}
}
</script>

