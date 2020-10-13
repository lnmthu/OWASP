import Home from './views/Home/index.vue'
import Shop from './views/Shop/index.vue'
import DetailProduct from './views/DetailProduct/index.vue'
import Category from './views/Category/index.vue'
export const routes =[
    {path:"", name:"home", component:Home},
    {path:"/shop", name:"shop", component:Shop},
    {path:"/detail-product/:unique_id", name:"detailProduct", component:DetailProduct},
    {path:"/category/:unique_id", name:"category", component:Category}    
]