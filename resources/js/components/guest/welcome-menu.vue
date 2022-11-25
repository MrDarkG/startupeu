<template>
<ul class="navbar-nav mr-auto">
    <li class="nav-item" v-for="(item, item_i) in menu">
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
    data(){
      return {
          menu:[]
      }
    },
    beforeCreate(){
        axios.get('/get/menu-items')
        .then(response => {
            this.menu = response.data
        })
    },
    methods:{
    //
    },
}
</script>
