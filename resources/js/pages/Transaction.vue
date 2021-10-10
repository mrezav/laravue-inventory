<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaksi</div>
                    <div class="card-body">
                        <b-form @submit="onSubmit" @reset="onReset">
                            <b-form-group label="Costumer:" label-for="costumers">
                                <b-form-select
                                id="costumers"
                                v-model="form.costumer"
                                :options="costumer_list"
                                required
                                ></b-form-select>
                            </b-form-group>
                            <b-form-group label="Item:" label-for="items">
                                <multiselect id="items" v-model="form.items" :options="item_list" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
                                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                                </multiselect>
                            </b-form-group>

                            <b-form-group label="Sub Total:" label-for="sub_total">
                                <b-form-input
                                id="sub_total"
                                v-model="form.subTotal"
                                placeholder="Sub total"
                                :readonly="true"
                                required
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group label="Diskon:" label-for="diskon">
                                <b-form-input
                                id="diskon"
                                v-model="form.diskon"
                                placeholder="Total diskon"
                                :readonly="true"
                                required
                                ></b-form-input>
                            </b-form-group>
                            
                            <b-form-group label="Total:" label-for="total">
                                <b-form-input
                                id="total"
                                v-model="form.total"
                                placeholder="Total"
                                :readonly="true"
                                required
                                ></b-form-input>
                            </b-form-group>

                            <b-button type="submit" variant="primary">Submit</b-button>
                            <b-button type="reset" variant="danger">Reset</b-button>
                        </b-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted(){
        axios.get('api/transaction').then((response) => {
            let { costumers, items } = response.data.data
            this.costumer_list = _.map(costumers, el => {
                return { text: el.nama, value: {...el} }
            }),
            this.item_list = _.map(items, el => {
                return {...el, name: el.nama_item }
            })
        })
    },
    data(){
        return {
            form : {
                costumer: null,
                items: [],
                total: 0,
                diskon: 0,
                subTotal: 0,
            },
            costumer_list: [],
            item_list: [],
        }
    },
    watch: {
        form: {
            handler(obj){
                let subTotal = 0, diskon = 0, total = 0;
                if(obj.items.length > 0){
                    subTotal = _.reduce(_.map(obj.items, el => {
                        return el.harga_satuan
                    }), function(sum, n){
                        return sum + n
                    }, 0);
                    if(obj.costumer){
                        if(obj.costumer.tipe_diskon == 1){
                            diskon = (subTotal * obj.costumer.diskon) / 100
                        }else{
                            diskon = obj.costumer.diskon
                        }
                    }
                    total = subTotal - diskon
                }

                // console.log('total:', total)
                this.form.subTotal = subTotal
                this.form.diskon = diskon
                this.form.total = total
            },
            deep: true
        }
    },
    methods:{
        onSubmit(event){
            event.preventDefault();
            // console.log(this.form)
            axios.post('api/transaction-submit', this.form).then((response) => {
                console.log(response);
                this.onReset();
            }).catch((error) => {
                console.log(error)
            })
        },
        onReset(){
            this.form = {
                costumer: null,
                items: [],
                total: 0,
                diskon: 0,
                subTotal: 0,
            }
        },
        handleSelect(itemId){
            console.log(itemId);
            if(_.includes(this.form.items, itemId)){
                let index = this.form.items.indexOf(itemId)
                this.form.items.splice(index, 1)
            }else{
                this.form.items.push(itemId)
            }
            console.log(this.form.items)
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>