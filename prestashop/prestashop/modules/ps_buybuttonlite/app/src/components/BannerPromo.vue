<template>
    <div v-show="Object.keys(product).length > 0" class="banner-block">
        <el-row justify="center" :gutter="50">
            <el-col :xs="24" :sm="24" :md="8" :lg="6">
                    <div style="display:inline-flex;">
                        <div class="pico">
                            <img :src="product.img">
                        </div>
                        <div style="margin-left:20px">
                            <p class="go-further">{{ translations.goFurther }}</p>
                            <span class="product-name">{{ product.displayName }}</span>
                            <p class="addons">{{ translations.addonsMarketplace }}</p>
                        </div>
                    </div>
            </el-col>
            <el-col :xs="24" :sm="24" :md="16" :lg="12">
                <p>{{ product.fullDescription }}</p>
                <slot/>
            </el-col>
            <el-col :xs="24" :sm="24" :md="24" :lg="6" class="center">
                <el-button type="text" @click="dialogDiscover = true"><i class="material-icons" style="vertical-align:middle">computer</i> {{ translations.screenshots }}</el-button>
                <el-button type="primary" @click="redirectToAddons()">{{ translations.discover }}</el-button>
            </el-col>
        </el-row>

        <el-dialog id="dialog-preview-addons" :visible.sync="dialogDiscover">
            <el-carousel id="screenshot-preview-addons" :interval="5000" height="66.67vh" arrow="always" indicator-position="none">
                <el-carousel-item v-for="picture in product.pictures" :key="parseInt(picture)" :style="'background-image:url('+picture.big+')'">
                    <!-- <img :src="picture.big" width="" height=""> -->
                </el-carousel-item>
            </el-carousel>
            <el-row class="dialog-preview-addons-footer" type="flex" justify="center">
                <el-col :xs="24" :sm="24" :md="12" :lg="12">
                    <el-button class="by-prestashop" type="text" @click="dialogDiscover = true"><i class="material-icons" style="vertical-align:middle">check_circle</i> {{ translations.developedBy }}</el-button>
                </el-col>
                <el-col :xs="24" :sm="24" :md="12" :lg="12">
                    <el-button class="right" type="primary" @click="redirectToAddons()">{{ translations.discoverOn }}</el-button>
                </el-col>
            </el-row>
        </el-dialog>
    </div>
</template>

<script>
import axios from 'axios'

const translations = JSON.parse(bannerPromoTranslations)

export default {
    name: 'BannerPromo',
    data: function () {
        return {
            dialogDiscover: false,
            product: '',
            translations: translations
        }
    },
    props: {
        idProductAddons: Number,
        isoCode: String,
        isoLang: String,
        psVersion: String,
        trackingAddonsLink: String
    },
    created: function () {
        axios.get('https://api.addons.prestashop.com/index.php', {
            params: {
                method: 'prediggo',
                action: 'product',
                iso_lang: this.isoLang,
                iso_code: this.isoCode,
                version: this.psVersion,
                id_product: this.idProductAddons
            }
        }).then((response) => {
            this.product = response.data
        }).catch((error) => {
            console.log(error)
        })
    },
    methods: {
        redirectToAddons: function () {
            window.open(this.trackingAddonsLink, '_blank')
        }
    }
}
</script>

<style scoped lang="scss">
.go-further {
    font-size: 14px;
}
.product-name {
    font-size: 16px;
    font-weight: 600;
}
.addons {
    font-size: 14px;
    font-weight: 600;
    color: #DF0067;
}
.banner-block {
    width: 100%;
    padding: 30px;
    border-radius: 3px;
    background-color: #FFFFFF;
    box-shadow: 0 0 14px 0 rgba(0,0,0,0.06);
}
.dialog-preview-addons-footer {
    position: absolute;
    width: 100%;
    padding-top: 20px;
}
.by-prestashop {
    color: white !important;
    font-weight: 600;
}
.left {
    float: left;
}
.right {
    float: right;
}
.by-prestashop {
    color: white !important;
}
.center {
    text-align: center;
}
</style>

<style lang="scss">
#dialog-preview-addons .el-dialog {
    width: 100vh !important;
}
#dialog-preview-addons .el-dialog__header {
    padding: 0 !important;
}
#dialog-preview-addons .el-dialog__body {
    padding: 0 !important;
}
#dialog-preview-addons .el-dialog__headerbtn {
    top: -40px !important;
    right: -40px !important;
}
#dialog-preview-addons .el-dialog__headerbtn .el-dialog__close {
    color: #ffffff;
    font-size: 24px;
    font-weight: 900;
}
#dialog-preview-addons .el-dialog__headerbtn .el-dialog__close:hover {
    color: #25B9D7;
}

#screenshot-preview-addons.el-carousel {
    overflow: unset !important;
    transform: translate(0, 0);
}
#screenshot-preview-addons > .el-carousel__container {
    overflow: hidden;
}
#screenshot-preview-addons .el-carousel__arrow--left {
    left: -50px !important;
    position: fixed;
}
#screenshot-preview-addons .el-carousel__arrow--left:hover {
    color: #25B9D7;
}
#screenshot-preview-addons .el-carousel__arrow--right {
    right: -50px !important;
    position: fixed;
}
#screenshot-preview-addons .el-carousel__arrow--right:hover {
    color: #25B9D7;
}
#screenshot-preview-addons .el-carousel__arrow {
    background-color: unset !important;
}
#screenshot-preview-addons .el-carousel__arrow:hover {
    background-color: unset !important;
}
#screenshot-preview-addons .el-icon-arrow-left {
    font-size: 32px !important;
    font-weight: 900 !important;
}
#screenshot-preview-addons .el-icon-arrow-left:hover {
    color: #25B9D7;
}
#screenshot-preview-addons .el-icon-arrow-right {
    font-size: 32px !important;
    font-weight: 900 !important;
}
#screenshot-preview-addons .el-icon-arrow-right:hover {
    color: #25B9D7;
}
</style>
