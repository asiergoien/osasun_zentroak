<template>
    <div>
        <div v-for="(centro, index) in centros" v-bind:key="index" v-if="centro.Zentroarenkodea === getParams()" class="row">
            <div class="col-4">
                <h1 class="text-primary">{{ centro.Izena }}</h1>
                <h4 class="text-danger">{{centro.Zentromota}}</h4>
                <h4>{{centro.Helbidea}}, {{centro.Udalerria}}</h4>
                <h4>Tlf.: {{centro.Telefonoa}}<br>Email: {{centro.Postaelektronikoa}}</h4>
            </div>
            <div id="mapaCentro" class="col">
                <iframe v-bind:src="'https://maps.google.com/?q='+centro.LATWGS84+','+centro.LONWGS84+'&output=embed'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary">Gogoko dut</button>
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
        }
    }
</script>