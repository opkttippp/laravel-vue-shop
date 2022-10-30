<template>
    <router-view></router-view>
</template>

<script>

import Products from "./views/Products";
import Show from "./views/Show";
import Character from "./views/Character";
import Review from "./views/Review";

export default {
    name: "Main",
    component: {
        Products,
        Show,
        Character,
        Review
    }
}
</script>

