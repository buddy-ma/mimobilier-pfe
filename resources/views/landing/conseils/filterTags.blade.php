<div id="app">
    <section class="parallax-searchs section welcome-area overlay">
        <div class="hero-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center text-white">Conseils Immobilier</h1>
                        <div class="banner-search-wrap">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <div class="rld-main-search" style="max-height: 120px">
                                        <div class="row px-3 mb-2">
                                            <div class="col-9 mb-4">
                                                <div class="rld-single-input">
                                                    <input v-model="searchInput" type="text"
                                                        placeholder="Recherchez">
                                                </div>
                                            </div>
                                            <div class="col-3 px-xs-1">
                                                <button class="btn btn-yellow w-100 d-xs-none"
                                                    @click="search">Recherchez</button>
                                                <button class="btn btn-yellow w-100 d-md-none" @click="search"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section bg-white-2 w-100">
        <div class="container">
            <div class="news-wrap">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-xs-12 mb-3" v-for="result in results" :key="result.id"
                        v-if="results.length > 0">
                        <div class="news-item">
                            <a :href="this.conseilsLink + result.slug" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" :src="'/images/' + result.image" :alt="result.slug"
                                        v-if="result.image">
                                    <img class="img-responsive" src="/assets/images/blog/b-10.jpg"
                                        :alt="result.slug" v-else>
                                </div>
                            </a>
                            <div class="news-item-text">


                                <a :href="this.conseilsLink + result.slug">
                                    <h3>@{{ result.title }}</h3>
                                </a>


                                <div class="news-item-descr big-news">


                                    <p> @{{ filteredText(result.text) }} </p>
                                </div>
                                <div class="news-item-bottom">
                                    {{-- <a href="/conseils/{{ $cns->slug }}" class="news-link">Read more...</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>

</div>

@section('js')
    <script>
        const {
            createApp
        } = Vue
        createApp({
            data() {
                return {
                    searchInput: null,
                    isActive: null,
                    results: [],
                    id: 0,
                    conseilsLink: "/conseils/",
                };
            },
            mounted: function() {
                this.getData(this.id);
            },
            methods: {
                getData(id, searchInput = '') {
                    axios.get('/filterConseils', {
                            params: {
                                id: id,
                                searchInput: searchInput,
                            }
                        })
                        .then(response => {
                            this.results = response.data.conseils;
                        })
                        .catch(error => {});
                },
                filter(id) {
                    this.id = id;
                    this.getData(id);
                },
                search() {
                    this.getData(this.id, this.searchInput);
                },
                reset() {
                    this.searchInput = '';
                    this.id = 0;
                    this.getData(this.id, this.searchInput);
                },
                filteredText(text) {
                    let stripped = text.replace(/<[^<>]*>/g, '');
                    let decoded = this.html_entity_decode(stripped);
                    let firstSpaceAfter = decoded.indexOf(' ', 170);
                    let snippet = decoded.substring(0, firstSpaceAfter);
                    return snippet;
                },
                html_entity_decode(str) {
                    return $('<textarea/>').html(str).text();
                }
            },
        }).mount('#app')
    </script>
@endsection
