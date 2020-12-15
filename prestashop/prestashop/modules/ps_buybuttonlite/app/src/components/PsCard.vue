<template>
    <div class="ps-card">
        <slot/>
    </div>
</template>

<script>
export default {
    name: 'PsCard'
}
</script>

<style scoped lang="scss">
.ps-card {
    position: relative;
    display: block;
    margin-bottom: 12px;
    margin-bottom: .75rem;
    background-color: #fff;
    border: 1px solid #dbe6e9;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 4px 0 rgba(0,0,0,.06);
    font-family: Open Sans,Helvetica,Arial,sans-serif !important;
}
</style>
