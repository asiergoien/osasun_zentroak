<template>
    <table>
        <thead>
            <tr>
                <th>Zentroak</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td v-for="(centro, index) in filteredCentros" v-bind:key="index">{{ centro.Izena }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {

    mounted() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("provincia"))
            this.provincia = urlParams.get("provincia").toLowerCase();
        this.getCentros();
    },

    data: () => ({
        title: "Euskadiko osasun zentroak",
        centros: [],
        likes: [],
        provincia: "",
        tipodecentro: "",
        sartutakoIzena: ""
    }),

    computed: {

        filteredCentros() {
            let arrEmaitza = this.searchByName();

            if (this.provincia.length > 0) {
                arrEmaitza = this.searchByProbintzia(arrEmaitza);
            }
            if (this.tipodecentro.length > 0) {
                arrEmaitza = this.searchByMota(arrEmaitza);
            }

            return arrEmaitza;
        }

    },

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
        },
        searchByName() {
            if (this.sartutakoIzena.length > 0) {
                return this.centros.filter((centro) => centro.Izena.toLowerCase().includes(this.sartutakoIzena.toLowerCase()));
            } else {
                return this.centros;
            }
        },
        searchByMota(arrayDeResultadosRecibidos) {
            return arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.toLowerCase().includes(this.tipodecentro.toLowerCase())).concat(arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.includes("Osasun Zentroa")));

            // return arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.toLowerCase().includes(this.tipodecentro.toLowerCase()));

        },
        searchByProbintzia(arrayDeResultadosRecibidos) {
            return arrayDeResultadosRecibidos.filter((centro) => centro.Probintzia.toLowerCase().includes(this.provincia.toLowerCase()));
        },
        getParams() {
            var parser = document.createElement('a');
            parser.href = window.location.href;
            var query = parser.search.substring(1);
            var value = query.split('=');
            return value[1];
        }

    }

};
</script>
