          --<template>
    <div>
        <div v-for="(centro, index) in centros" v-bind:key="index">
            <div v-if="centro.Zentroarenkodea === getParams()" class="row">
                <div class="col-4">
                    <h1 class="text-primary">{{centro.Izena}}</h1>
                    <h4 class="text-secondary">{{centro.Zentromota}}</h4>
                    <h4>{{centro.Helbidea}}, {{centro.Udalerria}}</h4>
                    <h4 v-if="centro.Telefonoa.includes('.')">Tlf.: {{arreglarTelefono(centro.Telefonoa)}}</h4>
                    <h4 v-else>Tlf.: {{centro.Telefonoa}}</h4>
                    <p><b>Ordutegia:</b> {{centro.Herritarrentzakozerbitzuarenordutegia}}</p>
                </div>
                <div id="mapaCentro" class="col-7">
                    <iframe v-if="centro.LATWGS84.includes('.')" v-bind:src="'https://maps.google.com/?q='+centro.LATWGS84+','+centro.LONWGS84+'&output=embed'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <iframe v-else v-bind:src="'https://maps.google.com/?q='+arreglarLatitud(centro.LATWGS84)+','+centro.LONWGS84+'&output=embed'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg> -->
                </div>
            </div>
        </div>
    </div>
        
</template>

<script>
    export default {
        mounted() {
            this.getCentros();
            console.log('Component mounted.')
        },
        data: () => ({
            title: "Euskadiko osasun zentroak",
            centros: [],
            likes: [],
            provincia: ""
        }),
        methods:{
            //url-an gordetako parametroa jasotzeko funtzioa
            getParams() {
                var parser = document.createElement('a');
                parser.href = window.location.href;
                var query = parser.search.substring(1);
                var value = query.split('=');
                return value[1];
            },
            getCentros() {
            delete axios.defaults.headers.common['X-Requested-With'];
            // const URL = "https://opendata.euskadi.eus/contenidos/ds_localizaciones/centros_salud_en_euskadi/opendata/centros-salud.json";
            const URL = "https://opendata.euskadi.eus/contenidos/ds_localizaciones/centros_salud_en_euskadi/opendata/osasun-zentroak.json";
            axios.get(URL).then((response) => {
                let data = new String(response.data).replace("jsonCallback(", "").replace(");", "");
                this.centros = JSON.parse(data); 
                for (let i = 0; i < this.centros.length; i++) {
                this.centros[i].id = i;
                }
            });
            },
            filteredCentros() {
                if (this.provincia.length > 0) {
                    return this.centros.filter(centro => {
                    return centro.Udalerria.toLowerCase().includes(this.provincia)
                        || centro.Eskualdea.toLowerCase().includes(this.provincia);
                    });
                } else {
                    return this.centros;
                }
            },
            arreglarLatitud(str){
                return str.substring(0, 2) + "." + str.substring(2);
            },
            arreglarTelefono(str){
                return str.replaceAll('.','').substring(0,9);
            }
        }
    }
</script>