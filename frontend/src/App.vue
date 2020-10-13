<template>
  <div id="app">
    <transition>
    <keep-alive>
      <router-view />
    </keep-alive>
    </transition>
  </div>
</template>

<script>
import axios from 'axios'
import { mapState } from "vuex";
export default {
  data(){
    return {
      currentProduct:[],
      currentUniqueId:null
    }
  },
  name: "app",
  computed: {
    ...mapState(["listCategory", "listProduct"]),
  },
  methods:{
    setProduct(data){
      this.currentProduct=data
    }
  },
  mounted() {
    this.$store.dispatch("loadListCategory");
    this.$store.dispatch("loadListProduct");
  },

};
</script>

<style>
/* @import '../dist/css/fontapis.css';
@import '../dist/css/bootstrap.min.css';
@import '../dist/css/font-awesome.min.css';
@import '../dist/css/elegant-icons.css';
@import '../dist/css/nice-select.css';
@import '../dist/css/jquery-ui.min.css';
@import '../dist/css/owl.carousel.min.css';
@import '../dist/css/slicknav.min.css'; */
@import "../dist/css/style.css";
</style>>
