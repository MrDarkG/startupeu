<template>
<!--    fill-opacity="0.38"-->
    <svg
        :width="size?.width??'12'"
        :height="size?.height??'16'"
        viewBox="0 0 12 16"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        :style="{
            transform:`rotate(${rotate?'180':'0'+''}deg)`,
        }"
    >
        <path
            d="M11.5 8L3.04215 16L0.5 13.5958L6.4181 8L0.5 2.40419L3.04215 0L11.5 8Z"
            :fill="color??'black'"
            :fill-opacity="opacity && !color?0.38:0.87"
        />
    </svg>
</template>
<script>
    export default {
        props:['opacity','rotate','color','size'],
    }
</script>
