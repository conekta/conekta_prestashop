<template>
    <div class="ps-card-header clearfix">
        </slot>
        <div class="justify-content-start">
            <slot name="headerLeft"></slot>
        </div>
        <div class="justify-content-end">
            <slot name="headerRight"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PsCardHeader'
}
</script>

<style scoped lang="scss">
.ps-card-header {
    padding: 10px !important;
    padding: .625rem ! important;
    background-color: #fafbfc !important;
    border-bottom: 1px solid #e5e5e5 !important;
    font-size: 1rem !important;
    font-weight: 600;
    line-height: 1.5 !important;
    color: #363a41 !important;
    margin: unset !important;
    margin-top: 0;
    text-transform: unset !important;
    font-family: Open Sans,Helvetica,Arial,sans-serif !important;
}
</style>

<style>
.ps-card-header .material-icons {
    vertical-align: text-bottom;
    color: #6c868e;
    margin-right: 5px;
}
</style>
