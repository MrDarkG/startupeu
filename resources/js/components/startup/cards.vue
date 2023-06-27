<template>
    <div class="row m-0" v-if="startups">
        <div class="col-12 col-md-12 col-lg-6 col-xl-4 p-2"
             style="min-height:292px!important;"
             v-for="(startup, s_index) in startups"
        >
            <div
                class="browse-startup-card shadow h-100 p-4 d-flex flex-column justify-content-between"
                style="min-width:unset!important;"
            >
                <a
                    :href="`/startup/${startup.id}`"
                >
                    <img
                        :src="startup.logo"
                        alt="Logo"
                        style="width: 62px;"
                    >
                    <div
                        class="title font-weight-bold"
                        style="word-break:break-word;font-size:20px;"
                        :title="startup.what_your_company_does"
                        v-text="startup.name"
                    ></div>
                    <div
                        class="desc"
                        :title="startup.description"
                        style="word-break: break-word;font-size:15px;color:#8c8c8c;"
                        v-text="setShortDescription(startup.description, 150)"
                    ></div>
                </a>
                <div class="d-flex">
                    <div
                        :class="{
                            'ml-1':s_index > 1,
                        }"
                        style="color:#6200EE;"
                        v-if="data.industry"
                        v-for="data in startup.startup_industries"
                        v-text="'#'+data.industry.title"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:['startups'],
}
</script>
