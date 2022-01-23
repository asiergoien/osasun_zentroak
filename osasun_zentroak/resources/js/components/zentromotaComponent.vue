<template>
    <div class="zentro-motak">
    
        <div class="div1">
            <h1>Bizkaia</h1>
            <img src="img/zentroak.jpg" alt="Bizkaia" >
        </div>

        <div class="div2">
            <h1>Araba</h1>
            <img src="img/zentroak.jpg" alt="Araba" >
        </div>
    
        <div class="div3">
            <h1>Gipuzkua</h1>
            <img src="img/zentroak.jpg" alt="Gipuzkua" >
        </div>
    
    </div>
</template>

<script>
export default {

    mounted() {
        this.getCentros();
    },

    data: () => ({
        title: "Euskadiko osasun zentroak",
        centros: [],
        provincia: "",
        tipodecentro: "",
        sartutakoIzena: ""
    }),
    methods: {

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
        }

    }

};
</script>
