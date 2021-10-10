<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Item</div>

                    <div class="card-body">
                        <b-table :items="items" :fields="fields">
                            <template #cell(no)="data">
                                {{ data.index + 1 }}
                            </template> 
                            <template #cell(aksi)="data">
                                <b-button variant="danger">Hapus</b-button>
                                <b-button variant="info">Edit</b-button>
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
                { key: 'nama_item', label: 'Nama item' }, 
                { key: 'harga_satuan', label: 'Harga satuan' },
                { key: 'stok', label: 'Stok' }, 
                { key: 'gambar', label: 'Gambar' },
            ],
            items: [],
        }
    },
    mounted(){
        axios.get('/api/items').then((response) => {
            console.log(response.data);
            this.items = response.data.data;
        })
    }
}
</script>