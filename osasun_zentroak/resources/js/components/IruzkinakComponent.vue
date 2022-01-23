<template>
    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <div>
                <!-- EL TITULO -->
                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>Iruzkinak</h5>
                </div>
                <!-- SECCION PARA ESCRIBIR NUEVO COMENTARIO -->
                <div class="d-flex flex-row add-comment-section">
                    <img class="img-fluid img-responsive rounded-circle mr-2" src="https://i.imgur.com/KLeobJk.jpg" width="38">
                    <input type="text" class="form-control mr-3" ref="addComment_mensaje" placeholder="Idatzi iruzkin bat...">
                    <button class="btn btn-primary" type="button" @click.prevent="addComment()">Bidali</button>
                </div>
                <!-- CADA COMENTARIO TIENE ESTE FORMATO O SEA QUE AQUI VA EL FOR -->
                <div v-if="hayComentarios" class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> 
                            <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> 
                            <span><small class="font-weight-bold text-primary">AQUI VA EL NOMBRE DEL AUTOR</small> <small class="font-weight-bold">AQUI VA EL MENSAJE</small></span> 
                        </div>
                         <!--por ahora sin fecha jeje q hay q meter una columna en la bbdd y m da pereza ahora mismo pero si no aqui iria la fecha o desde hace cuanto se ha hecho el comment cn un if dependiendo de hace cuanto es  -->
                        <!-- <small>AQUI VA LA FECHA</small> -->
                    </div>
                </div>
                <div v-else class="card p-3">
                    <p>Hau hutsik dago... Idatzi zuk lehenengo iruzkina!</p>
                </div>
            </div>  
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userIdC'],
        mounted() {
            this.viewComments();            
            this.hayComentarios = this.hayComentarios ? true : false;
        },
        data: () => ({
            mensaje:'',
            hayComentarios:'',
        }),
        methods:{
            //url-an gordetako parametroa (zentroaren kodea) jasotzeko funtzioa
            getParams() {
                var parser = document.createElement('a');
                parser.href = window.location.href;
                var query = parser.search.substring(1);
                var value = query.split('=');
                return value[1];
            },
            getMensaje(){
                this.mensaje = this.$refs.addComment_mensaje.value;
                return this.mensaje;
            },
            addComment(){
                axios.post('/addComment', {userId: this.userIdC, zentroarenKodea: this.getParams(), mensaje: this.getMensaje()})
            },
            viewComments(){
                axios.get('/viewComments', {params: {zentroarenKodea: this.getParams()}})
                    .then((res)=>{
                        if(res.data.exists == "true"){
                            this.hayComentarios = true;
                            return true;
                        }else{
                            this.hayComentarios = false;
                            return false;
                        }
                    })
            },           
        }
    }
    
</script>