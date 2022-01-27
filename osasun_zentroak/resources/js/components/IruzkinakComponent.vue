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
                    <div class="profile-icon">
                    {{echoLetraUser(this.userName)}}
                    </div>
                    <input type="text" class="form-control mr-3" ref="addComment_mensaje" placeholder="Idatzi iruzkin bat...">
                    <button class="btn btn-primary" type="button" @click.prevent="addComment()">Bidali</button>
                </div>
                <!-- CADA COMENTARIO TIENE ESTE FORMATO O SEA QUE AQUI VA EL FOR -->
                <div v-if="hayComentarios" class="card p-3">
                    <div v-for="(comentario,i) in comentarios" :key="i" class="d-flex justify-content-between align-items-center mt-2">
                        <div class="user d-flex flex-row align-items-center"> 
                            <div class="profile-icon-comentario">
                                {{echoLetraUser(comentario.usuario)}}
                            </div>
                            <span><small class="font-weight-bold text-primary"><b>{{comentario.usuario}}</b></small> <small class="font-weight-bold">{{comentario.mensaje}}</small></span> 
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
        props: ['userIdC', 'userName'],
        mounted() {
            this.existenComentarios();
            this.viewComments();            
            this.hayComentarios = this.hayComentarios ? true : false;
        },
        data: () => ({
            mensaje:'',
            hayComentarios:'',
            comentarios: [],
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
                this.hayComentarios = true;
                this.$refs.addComment_mensaje.value = "";
                this.viewComments();
            },
            viewComments(){                
                axios.get('/viewComments', {params: {zentroarenKodea: this.getParams()}})
                    .then((res)=>{
                        for(let i = 0; i < res.data.length; i++){
                            let comentarioObj = {usuario: res.data[i].usuario, mensaje: res.data[i].mensaje, id: res.data[i].id}
                            this.comentarios.unshift(comentarioObj);
                        }
                        this.comentarios = this.uniqByKeepLast(this.comentarios, it=>it.id);
                        
                    })
            },
            existenComentarios(){
                axios.get('/hayComentario', {params: {zentroarenKodea: this.getParams()}})
                    .then((res)=>{
                        if(res.data.exists == "true"){
                            this.hayComentarios = true;
                        }else{
                            this.hayComentarios = false;
                        }
                    })
            },
            uniqByKeepLast(data, key) {
                return [...new Map(data.map(x => [key(x), x])).values()]
            },
            echoLetraUser(izena){
                return izena.substring(0,1).toUpperCase();
            }           
        }
    }
    
</script>