<template>
  <div>
    <h1>Product List</h1>
    <table class="table ">
        <thead class="bg-black">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Description</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td><strong>{{ product.name }}</strong></td>
                <td>{{ product.price }} ₽</td>
                <td>{{ product.description }} ₽</td>
                <td><router-link :to="`/products/${product.id}/edit`" class="btn btn-info">Edit</router-link></td>
                <td><button @click="deleteProduct(product.id)" class="btn btn-danger">Delete</button></td>
            </tr>
        </tbody>
    </table>
    <router-link to="/products/create" class="btn btn-success">Create New Product</router-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: [],
    };
  },
  async created() {
    const response = await axios.get('/api/products');
    this.products = response.data;
  },
  methods: {
    async deleteProduct(id) {
      if (confirm('Are you sure you want to delete this product?')) {
        await axios.delete(`/api/products/${id}`);
        this.products = this.products.filter(product => product.id !== id);
      }
    },
  },
};
</script>

<style scoped>
.create-btn, .delete-btn {
  margin-left: 10px;
  padding: 5px 10px;
  border: none;
  cursor: pointer;
}
.delete-btn {
  background-color: red;
  color: white;
}
.create-btn {
  display: block;
  margin-top: 20px;
  background-color: green;
  color: white;
  text-align: center;
  text-decoration: none;
  padding: 8px 12px;
}
</style>
