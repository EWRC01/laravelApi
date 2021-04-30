<template>

<b-navbar type="dark" variant="dark">
    <b-navbar-brand>Product</b-navbar-brand>
    <b-navbar-nav>

        <b-nav-item><b-button @click="showModal">Register</b-button></b-nav-item>
        <b-modal ref="my-modal" hide-footer title="Registre un nuevo producto">
           <div class="d-block">
                <label for="name">Nombre</label>
                <input class="form-control" type="text">
                
                <label for="description">Descripcion</label>
                <input class="form-control" type="text">

                <label for="quantity">Cantidad</label>
                <input class="form-control" type="number">

                <label for="Price">Precio</label>
                <input class="form-control" type="number">
                <b-button class="mt-3" variant="outline-warning" block @click="hideModal">Guardar</b-button>
                <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Cancelar</b-button>
           </div>
               
           

            </b-modal>

    </b-navbar-nav>





</b-navbar>





</template>
<script>
export default {
    methods: {
        showModal(){
            this.$refs['my-modal'].show()
        },
        hideModal(){
            this.$refs['my-modal'].hide()
        }
    }
}
</script>