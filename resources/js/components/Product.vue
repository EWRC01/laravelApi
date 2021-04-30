<template>
    <div class="container">
<center><h2><strong>Listado de productos</strong></h2></center>

    <table class="table table-dark" border="1.0">
        <thead>

            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <tr v-for="product in products" v-bind:key="product.id">
                <td>{{ product.id }}</td>
                 <td>{{ product.name }}</td>
                  <td>{{ product.description }}</td>
                   <td>{{ product.quantity }}</td>
                    <td>{{ product.price }}</td>
                    
                    <td><b-button type="button" class="btn btn-warning text-white">Edit</b-button></td>
                    <td><b-button type="button" class="btn btn-danger">Delete</b-button></td>

            </tr>
        </tbody>
    </table>
    </div>



</template>
<script>
export default {
    data(){
        return{
            products: [],
            product :[],
            product: {
                id: '',
                name: '',
                description: '',
                quantity: '',
                price: ''

            },
            update:false,
            product_id: ''

        }
    },
    created(){
        this.getProducts();
    },
    methods: {
        getProducts(api_url){
            api_url=api_url || '/api/products';
            fetch(api_url)
            .then(reponse=>reponse.json())
            .then(reponse=>{
                this.products = reponse.data;
            })
            .catch(err=>console.log(err));
        }
    }
}
</script>