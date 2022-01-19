<template>
    <table>
        <thead>
            <tr>
                <th>Zentroak</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="n in 7">
                <td><a v-bind:href="'http://127.0.0.1:8000/informazioa?zentroa=' + centros[n-1].Zentroarenkodea">{{ centros[n-1].Izena }}</a></td>
            </tr>
        </tbody>
    </table>
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
