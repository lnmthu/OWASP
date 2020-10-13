<template>
  <div>
    <MenuWrapper />
    <Header />
    <Hero />
    <BreadCrumb />
    <section class="product spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-5">
            <Sidebar
            />
          </div>
          <div class="col-lg-9 col-md-7">
            <DiscountProduct />
            <PaginateProduct 
              />
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import BreadCrumb from "./components/BreadCrumb";
import MenuWrapper from "../../components/MenuWrapper/index.vue";
import Header from "../../components/Header/index.vue";
import Hero from "../../components/Hero/Other";
import Footer from "../../components/Footer/index.vue";
import Sidebar from "./components/Sidebar";
import DiscountProduct from "./components/DiscountProduct";
import PaginateProduct from "./components/PaginateProduct";

export default {

  components: {
    BreadCrumb,
    MenuWrapper,
    Header,
    Hero,
    Footer,
    Sidebar,
    DiscountProduct,
    PaginateProduct,
  },


};
</script>

<style scoped>
</style>