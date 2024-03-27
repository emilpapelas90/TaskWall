import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import VueApexCharts from "vue3-apexcharts";
import Countdown from "./Components/Countdown.vue";  

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(VueApexCharts)
    .component('Countdown', Countdown)   
    .use(SpladePlugin, {
      "max_keep_alive": 10,
      "transform_anchors": false,
      "progress_bar": true
    })
    .mount(el);
