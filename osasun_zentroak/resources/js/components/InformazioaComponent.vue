<template>
    <div>
        <button @click="prueba()" type="button" class="btn btn-primary">Gogoko dut</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            //hay q poner un método para añadir el sitio a favoritos en la bbdd
            prueba(){                
                alert("olvidonaaa;)");
            }
        }
    }
</script>