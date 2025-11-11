<template>
    <div>
        <h1>Создать задачу</h1>
        <form class="w-50" @submit.prevent="createProduct">
            <label class="form-label">Название задачи:</label>
            <input v-model="product.name" type="text"  class="form-control" required />

            <label class="form-label">Текст задачи:</label>
            <textarea v-model="product.description" class="form-control"></textarea>

            <label class="form-label">Часов на выполнение:</label>
            <input class="form-control" v-model="product.price" type="number" step="0.01" required />

            <label class="form-label">Статус:</label>
            <select class="form-select"  name="" id="" v-model="product.status">
                <option value="Новая" selected>Новая</option>
                <option value="В работе">В работе</option>
                <option value="Выполнена">Выполнена</option>
            </select>

            <label class="form-label">Приоритет задачи:</label>
            <select class="form-select"  name="" id="" v-model="product.priority">
                <option value="0" selected>Не срочная</option>
                <option value="1">Важная</option>
                <option value="2" selected>Срочная</option>
            </select>

            <br>
            <button type="submit" class="btn btn-success">Создать</button>

            <br>
            <br>
            <br>
            <br>
            <br>
            <router-link to="/" class="btn btn-danger">Назад</router-link>
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
        status: "Новая",
        priority: 0,
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
</style>
