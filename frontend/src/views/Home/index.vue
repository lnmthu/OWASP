<template>
  <div>
    <MenuWrapper />
    <Header />
    <Hero />
    <Category />
    <FeaturedProduct />
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="dist/img/banner/banner-1.jpg" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="dist/img/banner/banner-2.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <FilterProduct/>
    <FeaturedBlog />
    <Footer />
  </div>
</template>

<script>
import MenuWrapper from "../../components/MenuWrapper/index.vue";
import Header from "../../components/Header/index.vue";
import Hero from "../../components/Hero/Home";
import Footer from "../../components/Footer/index.vue";
import Category from "./components/Categories";
import FeaturedProduct from "./components/FeaturedProduct";
import FilterProduct from "./components/FilterProduct";
import FeaturedBlog from "./components/FeaturedBlog";

export default {

  components: { 
    MenuWrapper, 
    Header, 
    Hero, 
    Footer, 
    Category, 
    FeaturedProduct, 
    FilterProduct,
    FeaturedBlog
    },


};
</script>

<style  scoped>
</style>