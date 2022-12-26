<template>
<div class="sign-form">
    <div v-if="edit_button_active">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <div class="req-info-text ml-0">
                    Team
                    <div class="divid"></div>
                </div>
                <div
                    class="st-logo p-0 m-0 mt-3 position-relative"
                    :class="setClassByValue(inputs.image,false,is_submit)"
                    style="min-width:170px;"
                >
                    <VueFileAgent
                        :accept="'image/*'"
                        :maxSize="'10MB'"
                        :multiple="false"
                        :deletable="true"
                        :helpText="'დაამატეთ ან ჩააგდეთ სურათი'"
                        :errorText="{
                          type: 'Invalid file type. Only images or zip Allowed',
                          size: 'Files should not exceed 10MB in size',
                        }"
                        :uploadUrl="inputs.image"
                        class="bootstrap-filestyle choose_image_side_startup cursor-pointer"
                        v-model="fileRecords"
                        @select="onImageUpload"
                    ></VueFileAgent>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 mt-3 mt-sm-0">
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name">First name</label>
                        <input
                            :class="setClassByValue(inputs.name,false,is_submit)"
                            v-model="inputs.name"
                            type="text"
                            id="first_name"
                            class="form-control"
                            placeholder="Write here"
                        >
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last name</label>
                        <input
                            :class="setClassByValue(inputs.lastname,false,is_submit)"
                            v-model="inputs.lastname"
                            type="text"
                            id="last_name"
                            class="form-control"
                            placeholder="Write here"
                        >
                    </div>
                    <div class="col-md-6">
                        <label for="position">Position</label>
                        <input
                            :class="setClassByValue(inputs.position,false,is_submit)"
                            v-model="inputs.position"
                            type="text"
                            id="position"
                            class="form-control"
                            placeholder="Write here"
                        >
                    </div>
                    <div class="col-md-6">
                        <label for="linkedin_address">Linkedin profile</label>
                        <input
                            :class="setClassByValue(inputs.linkedin,false,is_submit)"
                            v-model="inputs.linkedin"
                            type="text"
                            id="linkedin_address"
                            class="form-control"
                            placeholder="Write here"
                        >
                    </div>
                    <div class="col-md-12">
                        <label for="information_about_this_person">Information about this person</label>
                        <textarea
                            :class="setClassByValue(inputs.about_me,false,is_submit)"
                            v-model="inputs.about_me"
                            id="information_about_this_person"
                            cols="30"
                            rows="10"
                            class="form-control h160"
                            placeholder="Type here"
                        ></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex align-items-center justify-content-end">
            <button
                @click="is_submit = true;addTeamateToStartup()"
                class="btn btn-03dac5 pt-2 pb-2 pl-3 pr-3 d-flex align-items center"
            >
                <span>
                    <i class='fa fa-plus fa-2xl'></i>
                </span>
                <span class="pl-2 font-weigh-bolder">
                    Add another member
                </span>
            </button>
        </div>
    </div>
    <div class="col-md-12 p-0 mt-5 pb-5">
        <startup-teamates
            :is_editable="edit_button_active"
            :teamates="team"
        ></startup-teamates>
    </div>
</div>
</template>
<script>
export default{
    props:['teamates','edit_button_active'],
    data(){
        return {
            team:this.teamates ? this.teamates : [],
            fileRecords:[],
            is_submit:false,
            inputs:{},
        }
    },
    created(){
        this.setInputDefaultValue()
        this.$emit('setEditButtonTitle','Team')
        this.$emit('setEditButtonTitle',this.team.length === 0,'is_active')
    },
    methods:{
        setInputDefaultValue(){
            this.inputs = {
                name:'',
                lastname:'',
                position:'',
                linkedin:'',
                about_me:'',
                image:'',
            }
            this.fileRecords = []
            this.is_submit = false
        },
        addTeamateToStartup(){
            if (this.isInputsValid(this.inputs)){
                axios.post('/startup/dashboard/add/teamate',this.inputs)
                .then((response)=>{
                    this.team.push(response.data)
                    this.setInputDefaultValue()
                    setTimeout(()=>{
                        window.scrollTo(0, document.body.scrollHeight)
                    },500)
                }).catch((error)=>{
                    this.popupErrors(error.response.data.errors)
                })
            }
        },
        onImageUpload(event){
            this.inputs.image = event[0].urlResized
        },
    }
}
</script>
<style>
.bootstrap-filestyle .file-preview-wrapper{
    background:#d8cee7!important;
}
.bootstrap-filestyle .file-preview-wrapper::before{
    background:#d8cee7!important;
}
</style>
