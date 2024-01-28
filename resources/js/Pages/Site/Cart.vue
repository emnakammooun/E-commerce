<template>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Qty</th>

                           <!--<th>Quantity</th>
                            <th>Total</th>-->
                            <th>Remove</th>
                        </tr>
                    </thead> 
                    <tbody class="align-middle">
                        <tr v-for="cart in cartBox" :key="cart.id">
                            <td class="align-middle"><img src="'storage/'+cart.Image" alt="" style="width: 50px;">{{cart.name}}</td>
                            <td class="align-middle">${{cart.price}}</td>
                            <td class="align-middle">{{cart.qty}}</td>
                            <td class="pt-3 align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px">
                                <div class="input-group-btn">
                                    <button id ="decrease" @click="decreaseValue" class="btn btn-sm btn-primary btn-minus">
                                    <i class ="fa fa-minus"></i>
                                </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" id="number" value="cart.qty">

                                <div class="input-group-btn">
                                    <button id ="increase" @click="increaseValue" class="btn btn-sm btn-primary btn-minus">
                                    <i class ="fa fa-plus"></i>
                                </button>
                                </div>
                                <button @click="updateQty(cart.id)" class="btn btn-sm btn-success btn-plus">Update</button> 
                            </div>
                                </td>

                            <td class="align-middle"><inertia-link :href="`/remove-from-cart/${cart.id}`" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></inertia-link></td>
                        </tr>
 
                      
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

</template>

<script>
import {Inertia} from '@inertiajs/inertia';
import SiteLayout from "../../Shared/SiteLayout.vue";
export default{
    layout: SiteLayout,
    props:{
        product: Object,
        cartBox: Object,
    },
    data() {
        return{
            form:({
                product_id : null,
            qty : null,
            }),
    
};

},
   

methods:{
    increaseValue(){
        var value = parseInt(document.getElementById('number').value,10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById("number").value=value;
    },
    decreaseValue(){
        var value = parseInt(document.getElementById('number').value,10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value =1 : '';
        if (value >1){
            value --;
        }
        document.getElementById('number').value = value;
},
updateQty(product_id){
    var value = parseInt(document.getElementById('number').value);
    this.form.qty = value ;
    this.form.product_id = product_id ;
    Inertia.post('/upsert-product-qty',this.form)
}
},
};
</script>
