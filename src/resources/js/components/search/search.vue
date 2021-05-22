<template>
    <div>
    <vue-typer :text="title" caret-animation='smooth'></vue-typer>
    <section class="search-sec" style="padding: 0">
        <div class="container">
            <div class="row text-center">
                <div>
                <b-form inline>
                    <b-input v-model="from"
                    id="inline-form-input-name"
                    class="mb-2 mr-sm-2 mb-sm-0"
                    placeholder="Ville de depart"
                    ></b-input>

                    <b-input-group prepend="" class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input id="inline-form-input-username" placeholder="Ville d'arrivee" v-model="to"></b-input>
                    </b-input-group>

                    <b-input-group prepend="" class="mb-2 mr-sm-2 mb-sm-0">
                        <datetime
                        type="datetime"
                        v-model="date"
                        input-class="form-control"
                        zone="Europe/Paris"
                        placeholder="Date de depart"
                        :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit'}"
                        :phrases="{ok: 'Continue', cancel: 'Exit'}"
                        :min-datetime="(new Date()).toString()"
                        use24-hour
                        auto
                        ></datetime>
                    </b-input-group>

                    <b-button class="btn-recherche" variant="primary" @click="search">rechercher</b-button>
                </b-form>
                </div>
            </div>
        </div>
       <b-modal
            v-model="show"
            title="Resultats de votre recherche"
            :header-bg-variant="headerBgVariant"
            :header-text-variant="headerTextVariant"
            :body-bg-variant="bodyBgVariant"
            :body-text-variant="bodyTextVariant"
            :footer-bg-variant="footerBgVariant"
            :footer-text-variant="footerTextVariant"
            size="lg"
            centered
        >
      <b-container fluid>
        <b-list-group>
            <b-list-group-item v-for="item in filteredPosts" :key="item.id">
                <b-row>
                    <b-col class="text-gray-700 font-weight-bold"><span class="mx-1">{{ item.from }}</span></b-col>
                    <b-col class="text-gray-700 font-weight-bold"><span class="mx-1">{{ item.dateFrom }}</span></b-col>
                    <b-col class="text-gray-700 font-weight-bold"><span class="mx-1">{{ item.to }}</span></b-col>
                    <b-col class="text-gray-700 font-weight-bold"> <a :href="item.Path" class="btn btn-recherche text-white px-3 float-right">reserver</a></b-col>
                </b-row>
            </b-list-group-item>
        </b-list-group>
      </b-container>

      <template v-slot:modal-footer>
        <div class="w-100">
          <b-button
            variant="danger"
            size="sm"
            class="float-right"
            @click="show=false"
          >
            fermer
          </b-button>
        </div>
      </template>
    </b-modal>
    </section>
</div>
</template>

<script>
export default {
    props: ['title'],
    data: function() {
        return {
            'posts': [],
            'results': false,
            'from': '',
            'to': '',
            'date': '',
            show: false,
            variants: ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'light', 'dark'],
            headerBgVariant: 'success',
            headerTextVariant: 'light',
            bodyBgVariant: 'light',
            bodyTextVariant: 'dark',
            footerBgVariant: 'light',
            footerTextVariant: 'secondary'
        }
    },
    computed: {
        filteredPosts() {
            let filteredPosts = this.posts.filter((post) => {
                return post.from.toLowerCase().includes(this.from.toLowerCase());
            })
            let orderedPosts = filteredPosts.sort((a, b) => {
        return b.dateFrom - a.dateFrom;
      })
        return orderedPosts;
     }
    },
    methods: {
        search: function() {
            this.show = true;
        }
    },

    mounted: function () {

        const el = this;

        axios.get('/api/all-posts')
        .then(function (response) {
            console.log(response.data);

            el.posts = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
  }

}
</script>
<style lang="scss">
.item-search{
    font-weight: 900;
    font-size: 15px;
    color: black;
    float: left;
}
/* SCSS */
@media (max-width: 576px) {
    .vue-typer {
        font-size: 20px;
        @extends(.py-3);
    }
}
</style>
