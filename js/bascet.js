var eventBus = new Vue();

Vue.component('bascet', {
    template: '#bascet',
    data: function(){
        return{
            bascet: [],
            bascetCount:0,
            bascetSumm:0,
            delPrice: 0        
        }
    },

    created: function() {
        this.bascet = JSON.parse(localStorage.getItem("cart"));
        if (this.bascet == null) this.bascet =  [];
        
        this.bascetCount = localStorage.getItem("cartcount");
        this.bascetSumm = localStorage.getItem("cartsumm");    

        console.log(this.bascet);
    },

    watch: {
        bascet: function (val) {
            this.recalcBascet();
        }
    },

    methods: {
        
        clearBascet() {
            this.bascetSumm = 0;
            this.bascetCount = 0;
            this.bascet = [];

            localStorage.removeItem("cart");
            localStorage.removeItem("cartcount");
            localStorage.removeItem("cartsumm");

        },

        recalcBascet() {
            console.log(1111);
            this.bascetSumm = 0;
            this.bascetCount = 0;
            for (i = 0; i<this.bascet.length; i++) {
                
                this.bascet[i].subtotal = parseFloat((Number(this.bascet[i].count) * parseFloat(this.bascet[i].price)).toFixed(2));
                
                this.bascetSumm += parseFloat(this.bascet[i].subtotal);
                
                this.bascetCount+=Number(this.bascet[i].count);
                
                if (this.bascet[i].count == 0) this.bascet.splice(i, 1);
            }

            this.bascetSumm = parseFloat(this.bascetSumm.toFixed(2));

            localStorage.setItem("cart", JSON.stringify(this.bascet));
            localStorage.setItem("cartcount", this.bascetCount);
            localStorage.setItem("cartsumm", this.bascetSumm);
            
            cart_recalc ();
            
            if (this.bascetCount > 0)
                eventBus.$emit("show-form");
            else eventBus.$emit("hide-form");
        }
    }
});

Vue.component('bascetform', {
    template: '#bascet-form',
    data: function(){
        return{
            bascet: [],
            bascetCount:0,
            bascetSumm:0,
            shoved:true,
            formNoValid:false,
            name: "",            
            phone: "",        
            adres: "",
            delPrice: 0,
            model: "",            
            storona: "",            
            filename: "",        
            filenamesmile: "", 

            checpolicy: true        
        }
    },

    created: function() {
        this.bascet = JSON.parse(localStorage.getItem("cart"));
        if (this.bascet == null) this.bascet =  [];

        this.bascetCount = localStorage.getItem("cartcount");
        this.bascetSumm = localStorage.getItem("cartsumm");  
        
        if (this.bascet.length <= 0) {
            this.shoved = false;
        }
        
        eventBus.$on("show-form", ()=>{
            this.shoved = true; 
        });

        eventBus.$on("hide-form", ()=>{
            this.shoved = false; 
        });
    },


    methods: {

        toPostPuncts() {
            if (this.adres == "")
            window.location.hash="map_section";
        },

        handleFileUpload(event){
             this.filename = event.target.files[0];
             console.log(this.filename);
        },

        sendBascet() {
            this.formNoValid = false;
            if (this.name == "") {
                this.formNoValid = true;
                return;
            }

            if (this.phone == "") {
                this.formNoValid = true;
                return;
            }

            if (this.email == "") {
                this.formNoValid = true;
                return;
            }

            this.bascet = JSON.parse(localStorage.getItem("cart"));

            // var params = new URLSearchParams();
            var params = new FormData();
            params.append('action', 'send_cart');
            params.append('nonce', allAjax.nonce);
            params.append('bascet', JSON.stringify(this.bascet));
            params.append('bascetcount', this.bascetCount);
            params.append('bascetsumm', this.bascetSumm);
            params.append('name', this.name);
            params.append('phone', this.phone);
            params.append('adres', this.adres);
            params.append('model', this.model);
            params.append('storona', this.storona);
            params.append('design', this.filename);


            axios.post(allAjax.ajaxurl, params)
              .then(function (response) {
                //let otv = JSON.parse(response);
                //console.log(response);
                localStorage.removeItem("cart");
                localStorage.removeItem("cartcount");
                localStorage.removeItem("cartsumm");
                window.location.href = thencs_page+"?n="+response.data.n+"&phone="+response.data.phone+"&adres="+response.data.adres+"&zn="+response.data.zn+"&price="+response.data.price;
              })
              .catch(function (error) {
                console.log(error);
                alert(error);
              });
        }
    }
});

var bascet = new Vue({
    el:"#bascet_vue",
    
    data:{
        bascetTitle: "Корзина"            
    },
    methods:{
        
    }
});