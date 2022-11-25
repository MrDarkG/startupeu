<template>
<ul class="navbar-nav mr-auto">
    <li
        class="nav-item"
        v-for="(item, item_i) in menu_items"
    >
        <a
            class="nav-link"
           :href="item.url"
           v-html="item.title"
        ></a>
    </li>
</ul>
</template>
<script>
export default {
    props:['menu_items'],
}
</script>
