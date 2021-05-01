<template>

<b-navbar type="dark" variant="dark">
    <b-navbar-brand>Productos</b-navbar-brand>
    <b-navbar-nav>

        <b-nav-item><b-button class="btn btn-danger" @click="showModal">Agrega un nuevo producto</b-button></b-nav-item>
        <b-modal ref="my-modal" hide-footer title="Registre un nuevo producto">
           
           <div class="d-block">
                <b-form>
                <label for="name">Nombre</label>
                <input class="form-control" type="text" v-model="product.name">
                
                <label for="description">Descripcion</label>
                <textarea class="form-control" type="text" v-model="product.description"></textarea>

                <label for="quantity">Cantidad</label>
                <input class="form-control" type="number" step="any" v-model="product.quantity">

                <label for="Price">Precio</label>
                <input class="form-control" type="number" v-model="product.price">
                 <b-button type="submit" class="mt-3" variant="outline-danger" block @click="addProduct()">Guardar</b-button>
               
               
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
            .then(alert('Producto Guardado Correctamente'))
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