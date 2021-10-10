<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to="{name: 'home'}" class="nav-link" :class="$route.name == '/' ? 'active' : ''" aria-current="page">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'item'}" class="nav-link" :class="$route.name == '/item' ? 'active' : ''">Item</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'sale'}" class="nav-link" :class="$route.name == '/sale' ? 'active' : ''">Sales</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'customer'}" class="nav-link" :class="$route.name == '/customer' ? 'active' : ''">Costumer</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'user'}" class="nav-link">User</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
    <!-- <ul class="nav">
        <li class="nav-item">
            <router-link to="/" class="nav-link active" aria-current="page">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/items" class="nav-link">Item</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/costumers" class="nav-link ">Costumer</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/sales" class="nav-link">Sales</router-link>
        </li>
    </ul> -->
</div>
</template>