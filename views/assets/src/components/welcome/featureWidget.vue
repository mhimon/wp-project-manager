<template>
    <div class="pm-col-sm-4 pm-col-xs-12">
        
        <div class="pm-video-modal">
            <welcome-modal v-if="show" :is-active="show" @close="show=false" :width="600">
                <iframe width="600" height="315" :src="'https://www.youtube.com/embed/' + feature.featureVideo + '/?VQ=HD1080&autoplay=1&rel=0'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </welcome-modal>
        </div>
        <div :class="['pm-feature-card', feature.cardClass]">
            <div class="pm-feature-thumb">
                <img :src="getAssetUrl('images/welcome/'+feature.featureThumb)" :alt="feature.featureName">
                <div class="pm-video-icon" @click="show=true"></div>
            </div>
            <div class="pm-feature-infos">
                <h3>{{ feature.featureName }}</h3>
                <p>{{ feature.featureDescription }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import WelcomeModal from './modal.vue';
    export default {
        data(){
            return {
                show: false
            }
        },
        props: {
            feature: {
                type: Object,
                required: true
            }
        },
        components: {
            'welcome-modal': WelcomeModal
        }
    }
</script>
