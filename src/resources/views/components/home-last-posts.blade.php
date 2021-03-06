<section id="services" class="home-news-section" v-if="lastNews.length > 0">
    <div class="container py-2">
        <div class="section-header">
            <h2 class="text-center title__annonce">
                Les dernieres annonces
            </h2>
        </div>
        <div>
            <b-card-group deck>
                <b-card
                    header="featured"
                    header-tag="header"
                    footer="Card Footer"
                    footer-tag="footer"
                    title="Title"
                >
                    <b-card-text>Header and footers using props.</b-card-text>
                    <b-button href="#" variant="primary">Go somewhere</b-button>
                </b-card>

                <b-card title="Title" header-tag="header" footer-tag="footer">
                    <template #header>
                        <h6 class="mb-0">Header Slot</h6>
                    </template>
                    <b-card-text>Header and footers using slots.</b-card-text>
                    <b-button href="#" variant="primary">Go somewhere</b-button>
                    <template #footer>
                        <em>Footer Slot</em>
                    </template>
                </b-card>
            </b-card-group>
        </div>
    </div>
</section>
