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
                            <div v-if="comentario.usuario == 'jon'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" @click.prevent="deleteComment(comentario.id)">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </div>
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
            deleteComment(id){
                axios.delete('/deleteComment', { data: {id: id}});
                axios.get('/viewComments', {params: {zentroarenKodea: this.getParams()}})
                    .then((res)=>{
                        for(let i = 0; i < res.data.length; i++){
                            let comentarioObj = {usuario: res.data[i].usuario, mensaje: res.data[i].mensaje, id: res.data[i].id}
                            //esto cambia el orden del array (el primero es el último)
                            this.comentarios.unshift(comentarioObj);
                        }
                        this.comentarios = this.uniqByKeepLast(this.comentarios, it=>it.id);
                        //esto borra el último elemento del array
                        this.comentarios.pop();
                    })
            },
            // updateComment(id){
            //     axios.put('/updateComment', {id:id});
            // },
            uniqByKeepLast(data, key) {
                return [...new Map(data.map(x => [key(x), x])).values()]
            },
            echoLetraUser(izena){
                return izena.substring(0,1).toUpperCase();
            }
        }
    }
    
</script>