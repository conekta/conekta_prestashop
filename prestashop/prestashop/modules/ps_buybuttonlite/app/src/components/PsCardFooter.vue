<template>
    <div class="ps-card-footer clearfix">
        </slot>
        <div class="justify-content-start">
            <slot name="footerLeft"></slot>
        </div>
        <div class="justify-content-end">
            <slot name="footerRight"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PsCardFooter'
}
</script>

<style scoped lang="scss">
.ps-card-footer {
    padding: 10px 15px;
    padding: .625rem .9375rem;
    background-color: #fafbfc !important;
    border-top: 1px solid #e5e5e5;
    font-family: Open Sans,Helvetica,Arial,sans-serif !important;
}
</style>
