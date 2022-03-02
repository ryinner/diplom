<template>
    <vueper-slides
        ref="vueperslides1"
        :touchable="false"
        fade
        :autoplay="false"
        :bullets="false"
        @slide="
            $refs.vueperslides2.goToSlide($event.currentSlide.index, {
                emit: false,
            })
        "
    >
        <vueper-slide
            v-for="(slide, i) in slides"
            :key="i"
            :image="slide.image"
        >
        </vueper-slide>
    </vueper-slides>
    <div class="m-c-10 no-mobile">
        <vueper-slides
            class="no-shadow thumbnails"
            ref="vueperslides2"
            @slide="
                $refs.vueperslides1.goToSlide($event.currentSlide.index, {
                    emit: false,
                })
            "
            :visible-slides="slides.length"
            fixed-height="75px"
            :bullets="false"
            :touchable="false"
            :gap="2.5"
            :arrows="false"
        >
            <vueper-slide
                v-for="(slide, i) in slides"
                :key="i"
                :image="slide.image"
                @click="$refs.vueperslides2.goToSlide(i)"
            >
            </vueper-slide>
        </vueper-slides>
    </div>
</template>

<script defer>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";

export default {
    components: { VueperSlides, VueperSlide },

    data() {
        return {
            slides: ''
        }
    },

    props: {
        rawslides: {
            required: true,
        },
    },

    methods: {
        parseSlides() {
            const slides = JSON.parse(this.rawslides)

            slides.forEach((slide) => {
                slide.image = "/img/houses/" + slide.path
            });

            this.slides = slides
        },
    },

    created() {
        this.parseSlides()
    }
};
</script>

<style lang="scss">
.thumbnails {
    margin: auto;
    width: 600px;
    & .vueperslide {
        box-sizing: border-box;
        border: 1px solid #fff;
        transition: 0.3s ease-in-out;
        opacity: 0.7;
        cursor: pointer;
    }
    & .vueperslide--active {
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
        opacity: 1;
        border-color: #000;
    }
}
</style>