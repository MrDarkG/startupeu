import 'vue-multiselect/dist/vue-multiselect.min.css'
import VueFileAgent from 'vue-file-agent'
import { CircleStencil, Cropper } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css'
import VueFileAgentStyles from 'vue-file-agent/dist/vue-file-agent.css'
import Multiselect from 'vue-multiselect'
import VueToastify from "vue-toastify"
import VModal from 'vue-js-modal'

Vue.use(VueFileAgent)
Vue.use(VueToastify)
Vue.component('multiselect', Multiselect)
Vue.use(VModal, { componentName: 'modal',dynamicDefault: { draggable: true, resizable: false }  })
Vue.use(CircleStencil)

import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
// Vue.use(VueSlider)

import { VueEditor } from "vue2-editor"
Vue.use(VueEditor)
