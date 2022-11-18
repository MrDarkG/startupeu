<template>
<div class="mb-4">
    <div class="d-none d-md-block left">
        <a href="/" class="sign-logo">
            <img src="assets/images/sign-logo.svg" alt="">
        </a>
        <div class="sign-text">
            <span>few clicks away from your ecosystem</span>
            <p>Already have an account?<a href="/login">Login</a></p>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-none col-xl-3 col-md-4 " style="background:#6200ee;border-radius: 36px;">
        <a href="/" class="sign-logo">
            <img src="assets/images/sign-logo.svg" alt="">
        </a>
        <div class="sign-text pb-3" style="margin-top:unset;">
            <span>few clicks away from your ecosystem</span>
            <p>Already have an account?<a :href="link">{{ title }}</a></p>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['title','link'],
}
</script>
