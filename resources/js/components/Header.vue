<template>

<b-navbar type="dark" variant="dark">
    <b-navbar-brand>Product</b-navbar-brand>
    <b-navbar-nav>

        <b-nav-item><b-button @click="showModal">Register</b-button></b-nav-item>
        <b-modal ref="my-modal" hide-footer title="Registre un nuevo producto">
           
           <div class="d-block">
                <b-form>
                <label for="name">Nombre</label>
                <input class="form-control" type="text" v-model="product.name">
                
                <label for="description">Descripcion</label>
                <input class="form-control" type="text" v-model="product.description">

                <label for="quantity">Cantidad</label>
                <input class="form-control" type="number" v-model="product.quantity">

                <label for="Price">Precio</label>
                <input class="form-control" type="number" v-model="product.price">
                 <b-button type="submit" class="mt-3" variant="outline-danger" block @click.prevent="addProduct()">Guardar</b-button>
                <b-button type="submit" class="mt-3" variant="outline-warning" block @click="hideModal">Cerrar</b-button>
               
                </b-form>
           </div>
               
           

            </b-modal>

    </b-navbar-nav>





</b-navbar>





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
            update : false,
            product_id:''
            }
    },
    created(){
            this.getProducts();
    },
    methods: {
        showModal(){
            this.$refs['my-modal'].show()
        },
        hideModal(){
            this.$refs['my-modal'].hide()
        },
        getProducts(api_url){
            api_url = api_url || '/api/products';
            fetch(api_url)
            .then(response=>response.json())
            .then(response=>{
                this.products = response.data;
            })
            .catch(err=>console.log(err));
        },
        addProduct(){
            if(this.update===false){
            fetch('/api/product', {
                method: 'post',
                body: JSON.stringify(this.product),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(response=>response.json())
                .then(data=>{
                this.getProducts();
            })
            .catch(err=>console.log(err));
        }
        }
        
    }
}
</script>