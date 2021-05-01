<template>
    <div class="container">
        <div class="form-add">
 <b-modal ref="my-modal-edit" hide-footer title="Edite un producto">
            <form>
               
                <label for="name">Nombre</label>
                <input class="form-control" type="text" v-model="product.name">
                
                <label for="description">Descripcion</label>
                <textarea class="form-control" type="text" v-model="product.description"></textarea>

                <label for="quantity">Cantidad</label>
                <input class="form-control" type="number" v-model="product.quantity">

                <label for="Price">Precio</label>
                <input class="form-control" type="number" v-model="product.price">
                 <b-button type="submit"  class="mt-3" variant="outline-success" block @click="addProductEdit()">Modificar</b-button>
               
               
                </form>
 </b-modal>

        </div>
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
                    
                    <td><button type="button"  class="btn btn-warning text-white" @click="updateProduct(product)">Edit</button></td>
                    <td><button type="button" class="btn btn-danger"  @click="deleteProduct(product.id)">Delete</button></td>

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
        },
           addProductEdit(){
            if(this.update===true){
                
            
            fetch('/api/product/', {
                method: 'put',
                body: JSON.stringify(this.product),
                headers: {
                    'content-type':'application/json'
                }
            })
            .then(response=>response.json())
                .then(data=>{
                    this.getProducts();
                })
                .catch(err=>console.log(err));
        }
        },
        deleteProduct(id){
                    fetch('/api/product/'+id,{
                        method:'delete'
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        this.getProducts();
                    })
                    .catch(err=>console.log(err));
        },
        updateProduct(product){
            this.$refs['my-modal-edit'].show();
            this.update=true;
            this.product.id=product.id;
            this.product.product_id= product.id;
            this.product.name=product.name;
            this.product.description=product.description;
            this.product.quantity=product.quantity;
            this.product.price=product.price;
        }
    }
};
</script>