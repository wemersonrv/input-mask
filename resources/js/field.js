Nova.booting((Vue, router, store) => {
    Vue.component('index-input-mask', require('./components/IndexField'))
    Vue.component('detail-input-mask', require('./components/DetailField'))
    Vue.component('form-input-mask', require('./components/FormField'))
})
