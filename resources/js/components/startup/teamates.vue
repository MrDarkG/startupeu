<template>
    <div>
        <div
            v-for="(teamate, t_index) in teamates"
            class="mb-4 p-4 bg-white flex-wrap row m-0 position-relative"
            style="border-radius:15px;"
        >
            <div class="col-md-12 col-lg-12 col-xl-5 d-flex flex-wrap justify-content-center justify-content-sm-center justify-content-md-start align-items-center pl-0 pr-0">
                <div
                    class="rounded-circle overflow-hidden team-info-image"
                     :style="{
                        backgroundImage:`url('/startup/teamates/${teamate.image}')`
                     }"
                ></div>
                <div class="pl-0 pl-sm-4 d-flex flex-column justify-content-between">
                    <div>
                        <h3 class="m-0 p-0 font-weight-bolder">
                            {{teamate.name}} {{teamate.lastname}}
                        </h3>
                    </div>
                    <div class="mt-1">
                        <h5 class="m-0 p-0 font-weight-bolder color-darkpurple">
                            {{teamate.position}}
                        </h5>
                    </div>
                    <div class="mt-1">
                        <a :href="teamate.linkedin" target="_blank">
                            <img
                                src="/assets/images/linkedin.png"
                                height="20"
                                style="margin-left:2px;"
                            >
                        </a>
                    </div>
                </div>
            </div>
            <div
                class="col-md-12 col-lg-12 col-xl-7 d-flex align-items-center font-weight-bold text-opacity-half pr-0 pl-0"
            >
                {{teamate.about_me}}
            </div>
            <div
                v-if="is_editable"
                class="position-absolute bg-primary font-weight-bolder pl-3 pr-3 pt-2 pb-2 text-white rounded"
                style="right:15px;top:15px;"
            >
                Edit
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:['teamates','is_editable'],
}
</script>
