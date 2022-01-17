<template>
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
                <div id="mapaCentro" class="col">
                    <iframe v-if="centro.LATWGS84.includes('.')" v-bind:src="'https://maps.google.com/?q='+centro.LATWGS84+','+centro.LONWGS84+'&output=embed'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <iframe v-else v-bind:src="'https://maps.google.com/?q='+arreglarLatitud(centro.LATWGS84)+','+centro.LONWGS84+'&output=embed'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Gogoko dut</button>
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