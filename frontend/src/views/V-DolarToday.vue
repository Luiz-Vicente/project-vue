<template>
  <CurrencyComponent
    type="text"
    v-model="dolar"
    placeholder="dolar"
    :options="{ currency: 'USD' }"
  />

  <ul>
    <li>{{ dolarTodayValue }}</li>
    <li>{{ dolarToReaisValue }}</li>
  </ul>
</template>

<script>
import format from "@/services/format.js";
import CurrencyComponent from "@/components/CurrencyComponent.vue";
import http from "@/services/http.js";

export default {
  components: {
    CurrencyComponent,
  },
  data() {
    return {
      dolar: 0,
      dolarToday: 0,
      dolarToReal: 0,
    };
  },
  methods: {
    async getDolar(type = "USD-BRL") {
      try {
        const { data } = await http.get(
          "https://economia.awesomeapi.com.br/json/last/" + type
        );
        const typeCurrency = type.split("-").join("");
        this.dolarToday = data[typeCurrency]["high"];
        return data[typeCurrency];
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.getDolar();
  },
  computed: {
    dolarToReaisValue() {
      return `O valor em reais de é ${format(this.dolarToReal, "pt-BR", "BRL")}`;
    },
    dolarTodayValue() {
      return `O dólar hoje está: ${format(this.dolarToday, "en-US", "USD")}`;
    },
  },
  watch: {
    dolar(value) {
      this.dolarToReal = value * this.dolarToday;
    },
  },
};
</script>
