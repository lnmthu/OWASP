import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
Vue.use(axios)

export const store = new Vuex.Store({
    state: {
        listCategory: [],
        listProduct: [],
        currentProduct:[],
        currentProductUniqueId: null,
        currentCategory:[],
        currentCategoryUniqueId: null,

        listProOfCatePaginate: null,
        listQuery: {
            limit:1,
            page:1
        },
        numberPaginate: {
            total:1,
            last_page:1
        }
        // listProductPaginate: null,
    },
    getters: {


    },
    mutations: {
        setListCategory(state, data) {
            state.listCategory=data
        },
        setListProduct(state, data) {
            state.listProduct=data
        },
        setCurrentProductUniqueId(state,data){
            state.currentProductUniqueId=data
            },
        setCurrentProduct(state,data){
        state.currentProduct=data
        },
        setCurrentCategoryUniqueId(state,data){
            state.currentCategoryUniqueId=data
        },
        setCurrentCategory(state,data){
            state.currentCategory=data
        },


        setListProOfCatePaginate(state,data){
            state.listProOfCatePaginate=data
        },
        setListQuery(state,listQuery){
            state.listQuery.limit=listQuery.limit  
            state.listQuery.page=listQuery.page  
        },
        setNumberPaginate(state,listQuery){
            state.numberPaginate.total=listQuery.total  
            state.numberPaginate.last_page=listQuery.last_page  
        },

    

        // setLastPage(state,last_page){
        //     state.last_page = last_page  
        // },
        // setListProductPaginate(state, data) {
        //     state.listProductPaginate = data
        // },
    },
    actions: {
        loadListCategory({ commit }) {
            var newArr = [];
            axios.get("http://localhost/api/all-categories").then((response) => {
                let data = response.data.data
                for (let i = 0; i < data.length; i++) {
                    newArr.push(data[i])
                }
            }, (error) => { console.log(error) });
            commit("setListCategory", newArr);
        },
        loadListProduct({ commit }) {
            var newArr = [];
            axios.get("http://localhost/api/all-products").then((response) => {
                let data = response.data.data
                for (let i = 0; i < data.length; i++) {
                    newArr.push(data[i])
                }
            }, (error) => { console.log(error) });
            commit("setListProduct", newArr);
        },
        loadCurrentProduct({commit,state},unique_id){
            if(Number.isInteger(Number(unique_id))){
                axios.get("http://localhost/api/products/"+unique_id)
                .then((response) => {
                    commit("setCurrentProductUniqueId", unique_id);
                    commit("setCurrentCategoryUniqueId", response.data.data.category_unique_id);
                    commit("setCurrentProduct", response.data.data);
                }, (error) => { console.log(error) });

            }
        },
        loadCurrentCategory({commit},unique_id){
            if(Number.isInteger(Number(unique_id))){
                axios.get("http://localhost/api/categories/"+unique_id)
                .then((response) => {
                    commit("setCurrentCategory", response.data.data);
                }, (error) => { console.log(error) });
            }


        },
        loadListQuery({commit},payload){
            commit("setListQuery",payload)
        },
        loadListProOfCatePaginate({commit,state},category_unique_id){
            if(Number.isInteger(Number(category_unique_id))){
                axios.get("http://localhost/api/products-with-category/"+category_unique_id
                        +"?limit=" +state.listQuery.limit +"&&page=" + state.listQuery.page)
                .then((response) => {
                    commit("setListProOfCatePaginate", response.data.data);
                    commit("setNumberPaginate", response.data.meta);
                }, (error) => { console.log(error) });
            }

        },

      
        
        
        // loadListProductPaginate({commit,state}) {
        //     var newArr = [];
        //     var lastPage = 0;
        //     axios.get("http://localhost/api/products" +"?limit=" +state.listQuery.limit +"&&page=" + state.listQuery.page)
        //     .then((response) => {
        //         let data = response.data.data
        //         for (let i = 0; i < data.length; i++) {
        //             newArr.push(data[i])
        //         }
        //         return lastPage = response.data.meta.last_page
        //     }, (error) => { console.log(error) });
        //     commit("setLastPage", lastPage);
        //     commit("setListProductPaginate", newArr);

        // },
    }
});
