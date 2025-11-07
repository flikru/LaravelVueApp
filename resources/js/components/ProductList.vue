<template>
    <div class="">
        <br>
        <h1 class="text-center">Лист задач для техников Другого измерения</h1>
        <br>
        <table class="table border-1">
            <thead class="">
            <tr class="table-dark">
                <td><b>Приоритет</b></td>
                <td><b>Задача</b></td>
                <td><b>Описание</b></td>
                <td><b>Дата постановки</b></td>
                <td><b>Срок выполнения, часов</b></td>
                <td><b>Исполнитель</b></td>
                <td><b>Статус</b></td>
                <td v-if="this.getAdmin() == 1"></td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products.data" :key="product.id" :class="product.priority_class">
                <td>{{ product.priority_text }}</td>
                <td><strong>{{ product.name }}</strong></td>
                <td>{{ product.description }}</td>
                <td>{{ product.created_at }}</td>
                <td>{{ product.price }}</td>
                <td><b>Роман Хазов</b></td>
                <td>{{ product.status }}</td>
                <td v-if="this.getAdmin() == 1"><router-link :to="`/products/${product.id}/edit`" class="btn btn-info">Изменить</router-link> <button @click="deleteProduct(product.id)" class="btn btn-danger">Удалить</button></td>
            </tr>
            </tbody>
        </table>
        <router-link to="/products/create" class="btn btn-success">Добавить задачу</router-link>
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
        getAdmin(){
           return (new URL(document.location)).searchParams.get("admin")
        }
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
