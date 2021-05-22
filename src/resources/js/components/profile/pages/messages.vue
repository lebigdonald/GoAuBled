<template>
    <div>
        <h2 class="border-bottom">Messages</h2>
    </div>
</template>
<script>
export default {
    data() {
        return {

        };
    },
    methods: {
        prev() {
            if (this.step <= 1) {
                return;
            }
            this.title = this.titles[this.step];
            this.step--;
        },
        next() {
            if (this.step >= 2) {
                return;
            }
            this.title = this.titles[this.step];
            this.step++;
        }
    }
}
</script>
