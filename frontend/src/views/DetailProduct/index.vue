<template>
  <div>
    <MenuWrapper />
    <Header />
    <Hero />
    <BreadCrumb />
    <DetailProduct />
    <RelatedProduct />
    <Footer />
  </div>
</template>

<script>
import MenuWrapper from "../../components/MenuWrapper/index.vue";
import Header from "../../components/Header/index.vue";
import Hero from "../../components/Hero/Other";
import Footer from "../../components/Footer/index.vue";
import BreadCrumb from "./components/BreadCrumb";
import DetailProduct from "./components/DetailProduct";
import RelatedProduct from "./components/RelatedProduct";
export default {
  components: {
    MenuWrapper,
    Header,
    Hero,
    Footer,
    BreadCrumb,
    DetailProduct,
    RelatedProduct,
  },
  


};
</script>

<style scoped>
</style>