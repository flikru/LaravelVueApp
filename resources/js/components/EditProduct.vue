<template>
    <div>
      <h1>Редактировать задачу - {{product.name}}</h1>
      <form @submit.prevent="updateProduct" class="w-50">
        <label class="form-label">Название задачи:</label>
        <input v-model="product.name" type="text" value="{{ product.name }}" class="form-control" required />

        <label class="form-label">Текст задачи:</label>
        <textarea v-model="product.description" value="{{product.description}}" class="form-control"></textarea>

        <label class="form-label">Часов на выполнение:</label>
        <input class="form-control" value="{{product.price}}" v-model="product.price" type="number" step="0.01" required />

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

        <button type="submit" class="btn btn-success">Изменить</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <router-link to="/" class="btn btn-danger">Отмена</router-link>
      </form>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        product: {},
      };
    },
    async created() {
      const response = await axios.get(`/api/products/${this.$route.params.id}`);
      this.product = response.data;
    },
    methods: {
      async updateProduct() {
        await axios.put(`/api/products/${this.product.id}`, this.product);
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
    margin-top: 10px;
    padding: 8px 12px;
    cursor: pointer;
  }
  .save-btn {
    background-color: blue;
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
