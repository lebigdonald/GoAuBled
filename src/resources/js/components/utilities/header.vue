<template>
    <section id="intro" :style="{ backgroundImage: `url('${backgroundImage}')`,  'height':  '400px' }">
        <div class="intro-content mt-0">
            <h2 class="text-center title__annonce pt-2 text-white">{{ title }}</h2>
        </div>
    </section><!-- #intro -->
</template>

<script>
export default {
    props: ['backgroundImage', 'title']
}
</script>
