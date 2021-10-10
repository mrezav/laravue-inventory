<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Costumer</div>

                    <div class="card-body">
                        <b-table :items="items" :fields="fields">
                            <template #cell(no)="data">
                                {{ data.index + 1 }}
                            </template> 
                            <template #cell(tipe_diskon)="data">
                                {{ handleTipeDiskon(data.item.tipe_diskon) }}
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
                { key: 'nama', label: 'Nama' },
                { key: 'email', label: 'Email' },
                { key: 'kontak', label: 'Kontak' },
                { key: 'alamat', label: 'Alamat' },
                { key: 'diskon', label: 'Diskon' },
                { key: 'tipe_diskon', label: 'Tipe diskon' },
                { key: 'ktp', label: 'Ktp' },
            ],
            items: [],
        }
    },
    mounted(){
        axios.get('/api/costumers').then((response) => {
            console.log(response.data);
            this.items = response.data.data;
        })
    },
    methods: {
        handleTipeDiskon(tipe){
            switch(tipe){
                case(1):
                    return 'Persentase';
                break;
                case(2):
                    return 'Fix Diskon';
                break;
                default:
                    return 'No Diskon';
                break;
            }
        }
    }
}
</script>