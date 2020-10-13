<template>
  <!-- <section class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">
          <div
            class="col-lg-3"
            v-for="(value, index) in listCategory"
            :key="index"
          >
            <div
              class="categories__item set-bg"
              :style="{ backgroundImage: 'url(' + value.image_uri + ')' }"
            >
              <h5>
                <router-link
                  tag="a"
                  :to="{
                    name: 'category',
                    params: { unique_id: value.unique_id },
                  }"
                  >{{ value.name }}</router-link
                >
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../../../dist/img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../../../dist/img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../../../dist/img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../../../dist/img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../../../dist/img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState(["listCategory"]),
  },
};
</script>

<style scoped>
</style>