import VueFileAgent from 'vue-file-agent'
Vue.use(VueFileAgent)

import 'vue-advanced-cropper/dist/style.css'
import { CircleStencil, Cropper } from 'vue-advanced-cropper'
Vue.use(CircleStencil)

import VueFileAgentStyles from 'vue-file-agent/dist/vue-file-agent.css'

import 'vue-multiselect/dist/vue-multiselect.min.css'
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

import VueToastify from "vue-toastify"
Vue.use(VueToastify)

import VModal from 'vue-js-modal'
Vue.use(VModal, { componentName: 'modal',dynamicDefault: { draggable: true, resizable: false }  })

import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

import { VueEditor } from "vue2-editor"
Vue.use(VueEditor)

