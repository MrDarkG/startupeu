<template>
    <div>
        <link rel="stylesheet" href="/assets/css/InvestorCard.css">
        <div
            class="col-12 col-sm-12 m-0 col-md-6 col-lg-4 col-xl-4"
            :class="{
            'pl-0':custom_startups.length>1 && index===0,
            'p-4':custom_startups.length>1,
        }"
            v-for="(data, index) in custom_startups"
            v-if="data.is_active"
            :key="index+data.startup.name"
        >
            <div
                style="height:270px"
                class="row mt-3 investor-startup-card"
            >
                <div class="w-100 d-flex flex-column justify-content-between bg-white p-4 h-100">
                    <div
                        class="cursor-pointer"
                        @click="redirectToDashboardStartupSinglePage(`/investor/dashboard/startups/${data.startup.id}`)"
                    >
                        <div style="min-height:56px;">
                            <img
                                :src="isImageExists(data.startup.logo)"
                                class="investor-dashboard-card-image"
                                alt="Logo"
                            >
                        </div>
                        <div class="font-weight-bold mt-2 investor-card-name">
                            {{ data.startup.name }}
                        </div>
                        <div
                            v-if="data.startup.description"
                            class="mt-2 mb-2 investor-card-description"
                        >
                            {{ data.startup.description.slice(0, 50) }}
                            {{ data.startup.description.length > 50 ? '...' : '' }}
                        </div>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap">
                            <div
                                style="color:#6200EE;font-size:15px;"
                                class="pt-1 pl-1 pr-1"
                                v-if="tag.industry"
                                v-for="(tag, t_index) in data.startup.startup_industries"
                            >
                                #{{ tag.industry.title }}
                            </div>
                        </div>
                        <div style="color:#6200EE;" class="d-flex pt-3">
                            <multiselect
                                :id="'investor_startup_multiselect'+index"
                                class="investor_startup_multiselect"
                                :value="data?.status.id > 0?data?.status:null"
                                track-by="id"
                                :custom-label="({ id, status }) => `${(id>1)?status:'New'}`"
                                @input="(event)=>{
                            data.status = event
                            changeStatus(event ,data.startup_id, data.investor_id)
                        }"
                                :options="statuses.slice(1,statuses.length)"
                                :multiple="false"
                            ></multiselect>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        startups: Array,
        statuses: Array,
    },
    data() {
        return {
            custom_startups: this.startups ?? [],
            value: [10000, 15000],
            status: '',
            input: {},
        }
    },
    methods: {
        redirectToDashboardStartupSinglePage(url) {
            window.location.href = url
        },
        findListItemByID(id, obj) {
            return id === obj.id
        },
        changeStatus(event, startup_id, investor_id) {
            console.log(event, startup_id, investor_id)
            axios.post('/investor/dashboard/change/startup/status', {
                startup_id: startup_id,
                investor_id: investor_id,
                status_id: event.id,
            }).then(() => {
                this.status = event.status
            })
        },
    },
}
</script>
