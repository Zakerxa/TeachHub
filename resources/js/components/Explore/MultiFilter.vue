<template>
    <div class="row justify-content-center p-0 m-0">
        <div class="col-10 col-lg-6">
            <div class="search-local">
                <div class="explore-search-icon">
                    <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
                </div>

                <input v-model="name" v-on:keyup.enter="dispatchAction" type="text" placeholder="Search . . .">

                <button @click="dispatchAction" class="explore-btn">
                    <span class="explore-btn-text">Explore</span>
                    <font-awesome-icon class="explore-btn-icon" icon="fa-solid fa-magnifying-glass" />
                </button>
            </div>
        </div>

        <div class="col-2 d-md-none">
            <div class="sliders d-flex align-items-center">
                <font-awesome-icon class="sliders-icon" icon="fa-solid fa-sliders" />
            </div>
        </div>
    </div>

    <div class="row justify-content-center p-0 m-0 mt-3">

        <div class="col-md-5 col-lg-2 col-xl-2 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('region')" @remove="removeAction" v-if="optionsRegion.length >= 1"
                    v-model="region" :options-limit="300" :custom-label="customLabelCity" :options="optionsRegion"
                    placeholder="Region" track-by="capital" :show-labels="false">
                </multiselect>
            </div>
        </div>

        <div class="col-md-5 col-lg-2 col-xl-2 mt-2 township-container">
            <div>
                <multiselect @select="dispatchAction('townships')" @remove="removeAction"
                    :disabled="region == null || region.length < 1" :custom-label="customLabelTownShip" v-model="townships"
                    :multiple="true" :options="optionsTownship" group-values="townships" group-label="eng"
                    :group-select="true" placeholder="City&Township" label="name" track-by="eng" :show-labels="false">

                    <template v-slot:selection="{ values, search, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} TownShip
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-1 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('status')" @remove="removeAction" :custom-label="customLabel"
                    v-model="status" :multiple="true" :options="optionsStatus" placeholder="Status" label="name"
                    track-by="name" :show-labels="false">

                    <template v-slot:selection="{ values, search, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Status
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-2 mt-2">
            <div>
                <multiselect @select="dispatchAction('env')" @remove="removeAction" :custom-label="customLabel"
                    v-model="environment" :multiple="true" :options="optionsEnvironment" placeholder="Teaching Environment"
                    label="name" track-by="name" :show-labels="false">

                    <template v-slot:selection="{ values, search, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Environment
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mt-2 subject-container">
            <div>
                <multiselect @select="dispatchAction" @remove="removeAction" :custom-label="customLabel" v-model="subjects"
                    :multiple="true" :options="optionsSubject" placeholder="Subject" label="name" track-by="name"
                    :show-labels="false">

                    <template v-slot:selection="{ values, search, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Subjects
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

    </div>

    <div id="filter-teacher" class="row d-flex align-items-center justify-content-start p-0 m-0 mt-3" style="height:50px">
        <div class="col-1"></div>
        <div class="col-5 col-md-2 text-end">
            <p>500 Teachers | </p>
        </div>
        <div class="col-5 col-md-2 text-start">
            <div
                v-if="name == '' && (region == null || region.length < 1) && (status == null || status.length < 1) && (subjects == null || subjects.length < 1) && (townships == null || townships.length < 1) && (environment == null || environment.length < 1)">
            </div>
            <div v-else @click="clearFilter('all')" class="alert alert-danger p-2" role="alert">
                Clear Filter
            </div>
        </div>
    </div>
</template>
<script>
import MyanmarApi from './myanmar.json';
import { mapGetters, mapActions, mapMutations } from 'vuex';

export default {
    data() {
        return {
            optionsStatus: [
                { id: 0, name: 'Select All' },
                { id: 1, name: 'Online' },
                { id: 2, name: 'Local' }
            ],
            optionsEnvironment: [
                { id: 0, name: 'Select All' },
                { id: 1, name: 'International Schools' },
                { id: 2, name: 'Government Schools' },
            ],
            optionsSubject: [
                { id: 1, name: 'Myanmar', language: 'Myanmar' },
                { id: 2, name: 'English', language: 'English' },
                { id: 3, name: 'Physics', language: 'Physics' },
                { id: 4, name: 'Mathematics', language: 'Mathematics' },
                { id: 5, name: 'Chemistry', language: 'Chemistry' },
            ],
            name: '',
            region: [],
            status: [],
            subjects: [],
            townships: [],
            environment: [],
            optionsRegion: [],
            optionsTownship: []
        }
    },
    async created() {
        console.log("Open Explore & Getting Map");
        await fetch('/api/subjects').then(res => res.json()).then(sub => {
            this.optionsSubject = sub;
        });
        MyanmarApi.data.map(region => this.optionsRegion.push(region))
    },
    computed: {
        ...mapGetters(['teachers', 'perPage']),
        customLabelCity() {
            return option => option.eng
        },
        customLabelTownShip() {
            return option => option.eng
        }
    },
    methods: {
        ...mapActions(['gettingTeacher', 'defaultTeacher']),
        ...mapMutations(['updateFiltersQuery', 'clearFilterQuery']),
        filters(e) {

            if (e == 'region') this.townships = [];

            if (e == 'status') if (this.isSelectedAll(this.status)) this.status = this.optionsStatus.filter(option => option.name != 'Select All')

            if (e == 'env') if (this.isSelectedAll(this.environment)) this.environment = this.optionsEnvironment.filter(option => option.name != 'Select All')

            const region = (this.region == null || this.region.length < 1) ? '' : this.region.eng;

            const townshipsParam = (this.townships == null || this.townships.length < 1) ? '' : this.townships.map(township => township.eng).join(',');

            const subject = (this.subjects == null || this.subjects.length < 1) ? '' : this.subjects.map(sub => sub.id).join(',');

            const status = (this.status == null || this.status.length < 1) ? '' : this.status.map(stat => stat.id).join(',');

            const environment = (this.environment == null || this.environment.length < 1) ? '' : this.environment.map(stat => stat.id).join(',');

            this.updateFiltersQuery({ name: this.name, region: region, townships: townshipsParam, subjects: subject, status: status, environment: environment });

            if (this.name == '' && region == '' && townshipsParam == '' && subject == '' && status == '' && environment == '') {
                this.clearFilterQuery();
                this.defaultTeacher('?page=1&per_page=' + this.perPage);
                console.log("Nothing state");
                return null;
            }
            else this.gettingTeacher();

        },
        dispatchAction(e) {
            this.$nextTick(() => {
                console.log("DOM has been updated");
                this.filters(e);
            });
        },
        removeAction() {
            this.$nextTick(() => {
                console.log("DOM has been updated");
                this.filters();
            });
        },
        isSelectedAll(values) {
            return values.some(res => res.name == 'Select All')
        },
        clearFilter(e) {
            this.name = '';
            this.region = null;
            this.status = [];
            this.subjects = [];
            this.townships = [];
            this.environment = [];
            this.clearFilterQuery();
            if (e == 'all') {
                this.defaultTeacher('?page=1&per_page=' + this.perPage);
            }
        }
    },
    watch: {
        region(selectRegion, oldRegion) {
            if (selectRegion != null) this.optionsTownship = selectRegion.districts;
        },
        status(selectStatus) {
            if (this.isSelectedAll(selectStatus)) this.status = this.optionsStatus.filter(option => option.name != 'Select All')
        },
        environment(selectEnvironment) {
            if (this.isSelectedAll(selectEnvironment)) this.environment = this.optionsEnvironment.filter(option => option.name != 'Select All')
        }
    },
    mounted() {
        this.clearFilter();
    }

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style lang="scss" scoped>
.multiselect__placeholder,
.multiselect__single {
    font-size: 10px;
    color: #494949;
    letter-spacing: 1px;
    font-weight: bold;
}

.select-size{
    font-size: 11px;
}

.multiselect__tags {
    max-height: 38px;
    min-height: 37px;
    overflow: hidden;
}


.sliders {
    display: none;
    height: 52px;
}

.sliders-icon {
    font-size: 25px;
    font-weight: 200;
}

/* ICON */
.explore-search-icon {
    color: #444;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.explore-search-icon:hover {
    animation: funny-icon 0.4s ease-in-out;
}

@keyframes funny-icon {
    0% {
        scale: 1;
    }

    50% {
        scale: 0.8;
        transform-origin: bottom;
        transform: rotate(-15deg);
    }

    100% {
        scale: 1;
    }
}

/* SEARCH BAR CONTAINER */
.search-local {
    width: 100%;
    display: flex;
    height: 54px;
    align-items: center;
    column-gap: 1rem;
    padding-left: 1rem;
    background: #FFFFFF;
    border-radius: 5px 0 0 5px;
    height: auto;
    border-right: none;
}

/* INPUT */
.search-local input {
    height: 100%;
    width: 100%;
    flex: 1 1 25rem;
    background: var(--white);
    display: flex;
    outline: none;
    border: none;
    color: var(--black);
    font-size: 1.4rem;
}

input[type="text"]::placeholder {
    color: #A3A3A3;
    font-size: 16px;
}

/* BUTTON */
.explore-btn {
    border: none;
    background-color: var(--secondary);
    padding: 3px;
    border-radius: 0 5px 5px 0;
    font-weight: 500;
    font-size: 16px;
    height: 50px;
    width: 135px;
    position: relative;
    right: -4px;
    cursor: pointer;
    transition: all 0.2s;
    text-align: center;
}

.explore-btn-text {
    display: block;
}

.explore-btn-icon {
    display: none;
}

.search-local button .search-icon {
    display: none;
}

.search-local button:hover {
    letter-spacing: 0.2rem;
}

.search-local button:active {
    letter-spacing: 0.1rem;
}

// Dropdown multiple


// Vuetify
.v-field__append-inner {
    display: none;
}

/* MEDIAS */
@media screen and (min-width:300px) and (max-width : 768px) {
    .sliders {
        display: block;
    }

    .explore-search-icon {
        display: none;
    }

    .explore-btn {
        width: 90px;
    }

    .explore-btn-text {
        display: none;
    }

    .explore-btn-icon {
        display: block;
        width: 50px;
        font-size: 20px;
    }

}
</style>
