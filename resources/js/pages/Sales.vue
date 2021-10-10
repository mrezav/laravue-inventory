<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Item</div>

                    <div class="card-body">
                        
                        <b-button @click="$router.push('transaction')" variant="primary" class="mb-2">New Transaction</b-button>

                        <b-table :items="sales" :fields="fields">
                            <template #cell(no)="data">
                                {{ data.index + 1 }}
                            </template> 
                            <template #cell(costumer)="data">
                                {{ data.item.costumer.nama }}
                            </template> 
                            <template #cell(item)="data">
                                {{ data.item.item.nama_item }}
                            </template> 
                            <template #cell(tanggal)="data">
                                {{ data.item.tanggal_transaksi }}
                            </template> 
                            <template #cell(kode)="data">
                                {{ data.item.code_transaksi }}
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            fields: [
                { key: 'no', label: 'No' },
                { key: 'kode', label: 'Kode' }, 
                { key: 'tanggal', label: 'Tanggal' },
                { key: 'costumer', label: 'Costumer' }, 
                { key: 'item', label: 'Item' },
                { key: 'total_harga', label: 'Sub total' },
                { key: 'total_diskon', label: 'Diskon' },
                { key: 'total_bayar', label: 'Total' },
            ],
            sales: [],
        }
    },
    mounted(){
        axios.get('/api/sales').then((response) => {
            console.log(response.data);
            this.sales = response.data.data;
        })
    }
}
</script>