<template>
    <div id="psbuybuttonlite-content">
        <el-row type="flex" justify="center">
            <el-col :xs="24" :sm="24" :md="24" :lg="20">
                <PsCard>
                    <PsCardHeader>
                        <template slot="headerLeft">
                            <i class="material-icons">link</i> Buy button lite
                        </template>
                    </PsCardHeader>

                    <PsCardBlock>
                        <el-row type="flex" justify="center" :gutter="100">
                            <el-col :xs="24" :sm="18" :md="16" :lg="12">
                                <el-form ref="form" :rules="rulesForm" :model="form" label-width="200px">
                                    <el-form-item :label="translations.selectProduct" prop="selectedProduct">
                                        <el-autocomplete v-model="product" :fetch-suggestions="querySearchAsync" :trigger-on-focus="false" :placeholder="translations.searchProduct" @select="handleSelect">
                                            <i slot="suffix" class="material-icons">search</i>
                                            <template slot-scope="{ item }">
                                                <div class="product-suggestion">
                                                    <img :src="item.image_link" class="product-suggestion-image" width="50" height="50">
                                                    <div class="product-suggestion-name">
                                                        <div>
                                                            <span class="product-suggestion-attributes">{{ item.name }}</span><br>
                                                            <span v-if="item.attribute_name" class="product-suggestion-attributes">{{ item.attribute_name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </el-autocomplete>
                                    </el-form-item>

                                    <el-form-item v-if="form.selectedProduct">
                                        <div>
                                            <div class="selected-product-image">
                                                <img :src="form.selectedProduct.image_link" class="product-suggestion-image" width="75" height="75">
                                            </div>
                                            <div class="selected-product-name">
                                                <div>
                                                    <label>{{ form.selectedProduct.name }}</label><br>
                                                    <label>{{ form.selectedProduct.attribute_name }}</label>
                                                </div>
                                                <div class="selected-product-delete">
                                                    <i class="material-icons red" @click="removeSelectedProduct()">close</i>
                                                </div>
                                            </div>
                                        </div>
                                    </el-form-item>
                                    <Alert v-if="form.selectedProduct.customizable == 1" type="warning">{{ translations.alertCustomizableProduct }}</Alert>

                                    <el-form-item :label="translations.action" prop="selectedAction">
                                        <el-select v-model="form.selectedAction" :placeholder="translations.action" clearable>
                                            <el-option label="Go to cart" value="1"></el-option>
                                            <el-option label="Check out" value="2"></el-option>
                                        </el-select>
                                    </el-form-item>

                                    <el-form-item :label="translations.sharableLink" class="form-link">
                                        <span v-if="form.selectedProduct && form.selectedAction" class="generated-link">{{ redirectControllerUrl }}?id_product={{ form.selectedProduct.id_product }}&action={{ form.selectedAction }}<label class="generated-link" v-if="form.selectedProduct.id_product_attribute">&id_product_attribute={{ form.selectedProduct.id_product_attribute }}</label></span>
                                        <span v-else class="no-link">{{ translations.linkPlaceholder }}</span>
                                    </el-form-item>
                                </el-form>
                            </el-col>
                        </el-row>
                    </PsCardBlock>

                    <PsCardFooter>
                        <template slot="footerRight">
                            <el-button type="primary" @click="validateForm('form')">{{ translations.copyToClipboard }}</el-button>
                        </template>
                    </PsCardFooter>
                </PsCard>
            </el-col>
        </el-row>

        <BannerPromo
            :idProductAddons="41139"
            :isoCode="context.country.iso_code"
            :isoLang="context.language.iso_code"
            :psVersion="ps_version"
            :trackingAddonsLink="trackingAddonsLink"
        >
            <el-row>
                <el-col :span="12">
                    <span class="features"><i class="material-icons">add_circle</i> Card & Button design integration</span>
                </el-col>
                <el-col :span="12">
                    <span class="features"><i class="material-icons">add_circle</i> Overview and Card Manager</span>
                </el-col>
            </el-row>
            <el-row>
                <el-col :span="12">
                    <span class="features"><i class="material-icons">add_circle</i> Statistics</span>
                </el-col>
                <el-col :span="12">
                    <span class="features"><i class="material-icons">add_circle</i> Virtual cart on external pages</span>
                </el-col>
            </el-row>
        </BannerPromo>
    </div>
</template>

<script>
import axios from 'axios'
import PsCard from '@/components/PsCard.vue'
import PsCardHeader from '@/components/PsCardHeader.vue'
import PsCardBlock from '@/components/PsCardBlock.vue'
import PsCardFooter from '@/components/PsCardFooter.vue'
import Alert from '@/components/Alert.vue'
import BannerPromo from '@/components/BannerPromo.vue'

const shopContext = JSON.parse(context)
const translations = JSON.parse(confTranslations)

export default {
    name: 'configuration',
    components: {
        BannerPromo,
        PsCard,
        PsCardHeader,
        PsCardBlock,
        PsCardFooter,
        Alert
    },
    data: function () {
        return {
            product: '',
            form: {
                selectedProduct: '',
                selectedAction: ''
            },
            rulesForm: {
                selectedProduct: [
                    { required: true, message: translations.errorFormSelectProduct, trigger: 'change' }
                ],
                selectedAction: [
                    { required: true, message: translations.errorFormSelectAction, trigger: 'change' }
                ]
            },
            redirectControllerUrl: redirectControllerUrl,
            context: shopContext,
            translations: translations,
            trackingAddonsLink: trackingAddonsLink,
            ps_base_url: psBaseUrl,
            ps_version: psVersion
        }
    },
    methods: {
        validateForm: function (formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    this.copyToClopboard(this.redirectControllerUrl + '?id_product=' + this.form.selectedProduct.id_product + '&action=' + this.form.selectedAction + '&id_product_attribute=' + this.form.selectedProduct.id_product_attribute)
                } else {
                    return false
                }
            })
        },
        querySearchAsync: function (queryString, cb) {
            const formData = new FormData()
            formData.append('action', 'SearchProducts')
            formData.append('product_search', queryString)

            axios.post(adminAjaxController, formData)
                .then((response) => {
                    cb(response.data)
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        handleSelect: function (item) {
            this.form.selectedProduct = item
        },
        removeSelectedProduct: function () {
            this.form.selectedProduct = ''
        },
        copyToClopboard: function (payload) {
            const el = document.createElement('textarea')
            el.value = payload
            el.setAttribute('readonly', '')
            el.style.position = 'absolute'
            el.style.left = '-9999px'
            document.body.appendChild(el)
            el.select()
            document.execCommand('copy')
            document.body.removeChild(el)

            showSuccessMessage(this.translations.linkCopied)
        }
    }
}
</script>

<style scoped lang="scss">
.el-autocomplete {
    width: 60%;
}
.no-link {
    color: #6c868e;
    font-style: italic;
}
.features {
    font-weight: 700;
}
.features > .material-icons {
    font-size:18px;
    color: #25b9d7;
    vertical-align: bottom;
}
</style>
