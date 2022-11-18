<template>
<div class="sidebar pl-4">
    <div class="d-flex flex-column h-100 justify-content-between">
        <a href="/" class="logo-container d-flex justify-content-center justify-content-xl-start">
            <img src="/logo.svg" class="d-none d-sm-none d-md-none d-lg-none d-xl-block">
            <img src="/mini-logo.svg" class="d-block d-sm-block d-md-block d-lg-block d-xl-none">
        </a>
        <div class="menubar pt-1" style="height: 600px!important;">
            <div>
                <ul class="das-menu pl-0 pl-sm-0 pl-md-2 pl-lg-2 pl-xl-4">
                    <li v-for="menu in data">
                        <a
                            class="d-flex align-items-center"
                            :href="menu.url"
                            :class="{
                                'active':menu.is_active,
                            }"
                        >
                            <img v-if="menu.image" :src="menu.image" :alt="menu.title">
                            <span class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                {{ menu.title }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-logout p-0 m-0 d-flex justify-content-center" onclick="axios.post('/logout').then(()=>window.location.reload())">
            <img src="/assets/images/power-off.png" alt="" height="30px" style="opacity:0.6">
            <span class="logout-btn">
                Logout
            </span>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:["data"],
}
</script>
<style>
/*.active-menu span{*/
/*    color: #6200ee!important;*/
/*}*/
</style>
