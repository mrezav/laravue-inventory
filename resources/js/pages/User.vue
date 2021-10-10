<template>
    <div>   
        <section v-if="name">
            <h1>Halaman User {{ name }}</h1>
        </section>
        <section v-else>
            <h1>list user</h1>
            <ul>
                <li v-for="user in users" :key="user.id">
                    <router-link :to="`/user/${user.name}`">{{ user.name }}</router-link>
                </li>
            </ul>
        </section>
    </div>
</template>
<script>
export default {
    props:['name'],
    data(){
        return {
            users: [
                {
                    id: 1,
                    name: "Agus"
                },
                {
                    id: 1,
                    name: "Ardi"
                },
                {
                    id: 1,
                    name: "Fajar"
                }
            ]
        }
    }
}
</script>