<template>
	<div class="container my-5">
		<!-- create header bar -->
		<div class="row justify-content-end mb-3">
			<div class="col-2">
				<button class="btn btn-primary" @click ="create">Create</button>
			</div>
			<div class="col-6">
				<form @submit.prevent="view">
					<div class="input-group">
						<input v-model="search" type="text" name="" class="form-control">
						<div class="input-group-append">
							<button type="submit" class="btn btn-success">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end create header bar -->

		<div class="row">
			<!-- form -->
			<div class="col-4">
				<div class="card">
					<h4 class="card-header">{{ isEditMode ? 'Edit' : 'Create'}}</h4>
					<div class="card-body">
						<form @keydown="product.onKeydown($event)">
							<AlertError :form="product" :message="errMsg" />
							<div class="form-group">
								<label>Name:</label>
								<input v-model="product.name" type="text" name="" class="form-control">
								<HasError :form="product" field="name" />
							</div>
							<div class="form-group">
								<label>Price:</label>
								<input v-model="product.price" type="number" name="" class="form-control">
								<HasError :form="product" field="price" />
							</div>
							<button :disabled="product.busy" class="btn btn-primary" @click.prevent="isEditMode? update():store()">{{ isEditMode ? 'Update' : 'Create' }}</button>
						</form>
					</div>
				</div>
			</div>
			<!-- endform -->

			<!-- table -->
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
						<tr v-if="loading">
							<td colspan="4" rowspan="5" class="text-center">
								<div class="spinner-grow" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</td>
						</tr>
						<tr v-if="!loading" v-for="product in products.data" :key='product.id'>
							<td>{{product.id}}</td>
							<td>{{product.name}}</td>
							<td>{{product.price}}</td>
							<td><button @click="edit(product)" class="btn btn-warning btn-sm">Edit</button>
								<button class="btn btn-danger btn-sm" @click="destroy(product.id)">Delete</button></td>
						</tr>
					</tbody>
				</table>

				<!-- pagination -->
				<pagination v-if="!loading" class="my-3" :data="products" @pagination-change-page="view"></pagination>
				<!-- end pagination -->

			</div>
			<!-- end table -->
		</div>


	</div>
	
</template>

<script>

import Form from 'vform'
import { Button, HasError, AlertError } from 'vform/src/components/bootstrap4'

export default {
	components: {
		Button, HasError, AlertError
	},

	name: 'ProductComponent',

	data () {
		return {
			loading: false,
			errMsg: '',
			search: '',
			isEditMode: false,
			products: {},
			product: new Form({
				name: '',
				price: ''
			}),
			errors: null
		}
	},
	methods: {
		// searchProduct() {
		// 	axios.get('/api/products?search=' + this.search)
		// 	.then(res => this.products = res.data)
		// },

		view ( page = 1 ) {
			this.loading = true
			this.$Progress.finish()
			
			axios.get('/api/products?page=' + page + '&search=' + this.search)
			.then((res) => {
				this.products = res.data
				this.loading = false
			})
		},

		// top bar create btn
		create() {
			this.isEditMode = false
			this.product.clear()
			this.product.reset()
		},

		store() {
			this.loading = true
			this.$Progress.start()
			this.product.post('/api/products', this.product)
			.then(res => 
					{
						this.$Progress.finish()
						this.view()
						this.product.reset()
						toastMixin.fire({
							title: 'Created Successfully',
							animation: true,
							icon: 'success',
							position: 'top-end'
						})
					}
				)
			.catch(e => {
				this.$Progress.fail()
				this.errMsg = e.response.data.message
			})
		},

		edit(product) {
			this.isEditMode = true
			this.product.clear()
			this.product.id = product.id
			this.product.fill(product)
		},

		update() {
			this.$Progress.start()
			this.product.put('/api/products/'+ this.product.id , this.product)
			.then(res => 
					{
						this.$Progress.finish()
						this.isEditMode = false;
						this.view();
						this.product.reset();
						toastMixin.fire({
							title: 'Edit Success!',
							animation: true,
							icon: 'success',
							position: 'top-end'
						})
					}
				)
			.catch(e => {
				this.$Progress.fail()
				this.errMsg = e.response.data.message
			})
		},

		destroy (id) {
			swal.fire({
			  title: 'Are you sure?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Delete!'
			}).then(res => {
				if (!res.isConfirmed) {
					return
				}
					axios.delete('/api/products/' + id)
					.then(res => this.view())
					swal.fire(
						{
							title: 'Deleted',
							icon: 'success'
						}
					)
			})

			
		}
	},
	created() {
		this.$Progress.start()
		this.view();
	}
}
</script>

