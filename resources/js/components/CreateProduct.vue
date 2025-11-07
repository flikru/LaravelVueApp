<template>
  <div>
    <h1>Create Product</h1>
    <form @submit.prevent="createProduct">
        <div class="form-group">
            <label>Product Name:</label>
            <input class="form-control" v-model="product.name" type="text" required />
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea class="form-control" v-model="product.description"></textarea>
        </div>

            <div class="form-group">
            <label>Price (₽):</label>
            <input class="form-control" v-model="product.price" type="number" step="0.01" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
                <router-link to="/" class="btn btn-danger">Cancel</router-link>
            </div>

    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      product: {
        name: '',
        description: '',
        price: 0,
      },
    };
  },
  methods: {
    async createProduct() {
      await axios.post('/api/products', this.product);
      this.$router.push('/');
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
input, textarea {
  width: 100%;
  padding: 8px;
}
button {
}
.create-btn {
  background-color: green;
  color: white;
}
.cancel-btn {
  background-color: gray;
  color: white;
  text-decoration: none;
  display: inline-block;
  padding: 8px 12px;
  text-align: center;
}
</style>
