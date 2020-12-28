<template>
    <div v-if="isActive" class="addons-alert" :class="type">
        <button v-if="closable" @click="isActive = false" type="button" class="close-addons-alert">
            <span aria-hidden="true"><i class="material-icons">close</i></span>
        </button>
        <p class="alert-text">
            <slot/>
        </p>
    </div>
</template>

<script>
export default {
    name: 'Alert',
    data () {
        return {
            isActive: true
        }
    },
    props: {
        type: {
            type: String,
            require: true
        },
        closable: {
            type: Boolean,
            require: false,
            default: false
        }
    }
}
</script>

<style scoped lang="scss">
.addons-alert {
    padding: 12px 0 12px 46px;
    padding: .75rem 0 .75rem 2.875rem;
    background-color: #fff;
    position: relative;
    color: #363a41;
    // padding: 12px 10px;
    // padding: .75rem .625rem;
    margin-bottom: 16px;
    margin-bottom: 1rem;
    border: 2px solid transparent;
    border: .125rem solid transparent;
}
.addons-alert:before {
    font-family: Material Icons;
    font-weight: 400;
    font-style: normal;
    font-size: 24px;
    font-size: 1.5rem;
    display: inline-block;
    line-height: 1;
    text-transform: none;
    letter-spacing: normal;
    vertical-align: middle;
    word-wrap: normal;
    white-space: nowrap;
    direction: ltr;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-feature-settings: "liga";
    font-feature-settings: "liga";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 46px;
    width: 2.875rem;
    height: 100%;
    text-align: center;
    font-size: 25.008px;
    font-size: 1.563rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
}
.addons-alert.info {
    border-color: #25b9d7;
}
.info:before {
    content: "\E88F";
    background-color: #dff5f9;
    color: #25b9d7;
}
.addons-alert.warning {
    border-color: #cd9321;
}
.warning:before {
    content: "\E001";
    background-color: #fde7bb;
    color: #cd9321;
}
.addons-alert.danger {
    border-color: #c05c67;
}
.danger:before {
    content: "\E001";
    background-color: #fde1e1;
    color: #c05c67;
}
.addons-alert.success {
    border-color: #70b580;
}
.success:before {
    content: "\E5CA";
    background-color: #d6f0d8;
    color: #70b580;
}
.close-addons-alert {
    color: #6c868e;
    margin-right: 10px;
    margin-right: .625rem;
    opacity: 1;
    cursor: pointer;
    padding: 0;
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
    float: right;
    font-size: 21px;
    font-size: 1.3125rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    // opacity: .5;
}
.addons-alert.info .close-addons-alert {
    color: #25b9d7 !important;
}
.addons-alert.success .close-addons-alert {
    color: #70b580 !important;
}
.addons-alert.warning .close-addons-alert {
    color: #cd9321 !important;
}
.addons-alert.danger .close-addons-alert {
    color: #c05c67 !important;
}
.close-addons-alert .material-icons {
    font-size: 18px;
    font-size: 1.125rem;
    // vertical-align: middle;
}
.alert-text {
    padding: 0 10px;
    font-size: 14px;
    margin: unset !important;
}
</style>
