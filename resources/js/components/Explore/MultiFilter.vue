<template>
    <div class="row justify-content-center p-0 m-0">

        <div class="col-10 col-lg-6 mt-2">
            <div class="search-local">
                <div class="explore-search-icon">
                    <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
                </div>

                <input v-model="name" v-on:keyup.enter="dispatchAction('explore')" type="text" :placeholder="$t('btn.search')">

                <button @click="dispatchAction('explore')" class="explore-btn">
                    <span class="explore-btn-text fw-bold">{{ $t('btn.explore') }}</span>
                    <font-awesome-icon class="explore-btn-icon" icon="fa-solid fa-magnifying-glass" />
                </button>
            </div>
        </div>

        <div class="col-2 d-md-none pr-0">
            <div data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="sliders d-flex align-items-center">
                <font-awesome-icon class="sliders-icon" icon="fa-solid fa-sliders" />
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade p-0" id="staticBackdrop" style="z-index:10000" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><font-awesome-icon data-bs-dismiss="modal"
                            aria-label="Close" icon="fa-solid fa-arrow-left-long" /> Filters</h5>
                    <div
                        v-if="name == '' && (region == null || region.length < 1) && (status == null || status.length < 1) && (subjects == null || subjects.length < 1) && (townships == null || townships.length < 1) && (environment == null || environment.length < 1)">
                    </div>
                    <div v-else @click="clearFilter('all')" class="text-danger p-2" role="alert">
                        Clear All
                    </div>
                </div>
                <div class="modal-body pt-0">
                    <div class="row justify-content-center p-0 m-0 mt-5">

                        <div class="modal-filter col-md-5 col-lg-2 col-xl-2 mt-2 pr-md-0">
                            <div>
                                <multiselect @select="dispatchAction('region')" @remove="removeAction"
                                    v-if="optionsRegion.length >= 1" v-model="region" :options-limit="300"
                                    :custom-label="customLabelCity" :options="optionsRegion" placeholder="Region"
                                    track-by="capital" :show-labels="false">
                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-5 col-lg-2 col-xl-2 mt-2 township-container">
                            <div>
                                <multiselect @select="dispatchAction('townships')" @remove="removeAction"
                                    :disabled="region == null || region.length < 1" :custom-label="customLabelTownShip"
                                    v-model="townships" :multiple="true" :options="optionsTownship" group-values="townships"
                                    group-label="eng" :group-select="true" placeholder="City&Township" label="name"
                                    track-by="eng" :show-labels="false">

                                    <template v-slot:selection="{ values, isOpen }">
                                        <span v-if="values.length >= 2">
                                            <span v-if="!isOpen" class="select-size">
                                                {{ values.length }} TownShip
                                            </span>
                                        </span>
                                    </template>

                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-3 col-lg-2 col-xl-1 mt-2 pr-md-0">
                            <div>
                                <multiselect @select="dispatchAction('status')" @remove="removeAction"
                                    :custom-label="customLabel" v-model="status" :options="optionsStatus"
                                    placeholder="Status" label="name" track-by="name" :show-labels="false">
                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-3 col-lg-2 col-xl-1 mt-2 pr-md-0">
                            <div>
                                <multiselect @select="dispatchAction('classType')"
                                    :disabled="status == null || status == ''" @remove="removeAction" multiple="true"
                                    v-model="classType" :options="optionsClassType" :placeholder="pClassType" label="name"
                                    track-by="value" :show-labels="false">
                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-4 col-lg-3 col-xl-2 mt-2">
                            <div>
                                <multiselect @select="dispatchAction('env')" @remove="removeAction"
                                    :custom-label="customLabelEvnironment" v-model="environment" :multiple="false"
                                    :options="optionsEnvironment" :placeholder="pEnvironment" label="name" track-by="name"
                                    :show-labels="false">

                                    <template v-slot:selection="{ values, isOpen }">
                                        <span v-if="values.length >= 2">
                                            <span v-if="!isOpen" class="select-size">
                                                {{ values.length }} Environment
                                            </span>
                                        </span>
                                    </template>
                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-4 col-lg-3 col-xl-2 mt-2">
                            <div>
                                <multiselect :disabled="environment == null || environment == ''" :close-on-select="false"
                                    @select="dispatchAction('')" @remove="removeAction" :custom-label="customLabelEducation"
                                    v-model="education" :multiple="true" :options="optionsEducation" placeholder="Education"
                                    label="name" track-by="name" :show-labels="false">

                                    <template v-slot:selection="{ values, isOpen }">
                                        <span v-if="values.length >= 2">
                                            <span v-if="!isOpen" class="select-size">
                                                {{ values.length }} Selected
                                            </span>
                                        </span>
                                    </template>

                                </multiselect>
                            </div>
                        </div>

                        <div class="modal-filter col-md-3 col-lg-2 col-xl-2 mt-2 subject-container">
                            <div>
                                <multiselect @select="dispatchAction" :close-on-select="false" @remove="removeAction"
                                    :custom-label="customLabel" v-model="subjects" :multiple="true"
                                    :options="optionsSubject" placeholder="Subject" label="name" track-by="name"
                                    :show-labels="false">

                                    <template v-slot:selection="{ values, isOpen }">
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
                </div>
                <div class="modal-footer">
                    <button type="button" style="background:var(--primary);" data-bs-dismiss="modal"
                        class="btn btn-secondary w-100 text-light">Apply Filters</button>
                </div>
            </div>
        </div>
    </div>

    <div id="filter-teacher" class="row p-5 pt-0 pb-0 justify-content-center m-0 mt-2">

        <div class="hide-filter col-md-4 col-lg-3 col-xl-3 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('region')" @remove="removeAction" v-if="optionsRegion.length >= 1"
                    v-model="region" :options-limit="300" :custom-label="customLabelCity" :options="optionsRegion"
                    :placeholder="pRegion" track-by="capital" :show-labels="false">
                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-4 col-lg-3 col-xl-3 mt-2 township-container">
            <div>
                <multiselect @select="dispatchAction('townships')" :close-on-select="false" @remove="removeAction"
                    :disabled="region == null || region.length < 1" :custom-label="customLabelTownShip" v-model="townships"
                    :multiple="true" :options="optionsTownship" group-values="townships" group-label="eng"
                    :group-select="true" :placeholder="pTownship" label="name" track-by="eng" :show-labels="false">

                    <template v-slot:selection="{ values, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} TownShip
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-4 col-lg-3 col-xl-3 mt-2">
            <div>
                <multiselect @select="dispatchAction('env')" @remove="removeAction" :custom-label="customLabelEvnironment"
                    v-model="environment" :multiple="false" :options="optionsEnvironment" :placeholder="pEnvironment"
                    label="name" track-by="name" :show-labels="false">

                    <template v-slot:selection="{ values, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Environment
                            </span>
                        </span>
                    </template>
                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-4 col-lg-2 col-xl-2 mt-2">
            <div>
                <multiselect :disabled="environment == null || environment == ''" :close-on-select="false"
                    @select="dispatchAction('')" @remove="removeAction" :custom-label="customLabelEducation"
                    v-model="education" :multiple="true" :options="optionsEducation" placeholder="Education" label="name"
                    track-by="name" :show-labels="false">

                    <template v-slot:selection="{ values, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Selected
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-3 col-lg-2 col-xl-2 mt-2 subject-container">
            <div>
                <multiselect @select="dispatchAction" @remove="removeAction" :close-on-select="false"
                    :custom-label="customLabelSubject" v-model="subjects" :multiple="true" :options="optionsSubject"
                    :placeholder="pSubject" label="name" track-by="name" :show-labels="false">

                    <template v-slot:selection="{ values, isOpen }">
                        <span v-if="values.length >= 2">
                            <span v-if="!isOpen" class="select-size">
                                {{ values.length }} Subjects
                            </span>
                        </span>
                    </template>

                </multiselect>
            </div>
        </div>


        <div class="hide-filter col-md-3 col-lg-2    col-xl-2 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('gender')" @remove="removeAction" :custom-label="customLabel"
                    v-model="gender" :options="optionsGender" placeholder="Gender" label="name" track-by="name"
                    :show-labels="false">
                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-3 col-lg-3 col-xl-3 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('status')" @remove="removeAction" :custom-label="customLabel"
                    v-model="status" :options="optionsStatus" placeholder="Status" label="name" track-by="name"
                    :show-labels="false">
                </multiselect>
            </div>
        </div>

        <div class="hide-filter col-md-3 col-lg-3 col-xl-3 mt-2 pr-md-0">
            <div>
                <multiselect @select="dispatchAction('classType')" :disabled="status == null || status == ''"
                    @remove="removeAction" multiple="true" v-model="classType" :options="optionsClassType"
                    :placeholder="pClassType" label="name" track-by="value" :show-labels="false">
                </multiselect>
            </div>
        </div>

    </div>

    <div class="row d-flex align-items-center justify-content-start p-0 m-0 mt-3" style="height:50px">
        <div class="col-1"></div>
        <div class="col-10 col-md-6 text-start fw-bold">
            <p>
                <!-- {{ (searchCount >= 1) ? searchCount + '/' : '' }}{{ teacherCount }} Teachers | -->
                <span
                    v-if="name == '' && (region == null || region.length < 1) && (status == null || status.length < 1) && (subjects == null || subjects.length < 1) && (townships == null || townships.length < 1) && (environment == null || environment.length < 1)"></span>
                <span v-else @click="clearFilter('all')" class="alert alert-danger p-1 fw-normal" style="cursor:pointer"
                    role="alert">
                    Clear Filter <v-icon icon="fa-solid fa-xmark"></v-icon>
                </span>
            </p>
        </div>
        <div class="col-5 col-md-2 text-start">

        </div>
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';

export default {
    data() {
        return {
            optionsEnvironment: [
                {
                    id: 1, name: 'International Schools', name_mm: 'နိုင်ငံတကာကျောင်း', envType: [
                        { name: 'Pre-Kg', value: '1', status: 1 },
                        { name: 'Kg', value: '2', status: 1 },
                        { name: 'YEAR-1', value: '3', status: 1 },
                        { name: 'YEAR-2', value: '4', status: 1 },
                        { name: 'YEAR-3', value: '5', status: 1 },
                        { name: 'YEAR-4', value: '6', status: 1 },
                        { name: 'YEAR-5', value: '7', status: 1 },
                        { name: 'YEAR-6', value: '8', status: 1 },
                        { name: 'YEAR-7', value: '9', status: 1 },
                        { name: 'YEAR-8', value: '10', status: 1 },
                        { name: 'YEAR-9', value: '11', status: 1 },
                        { name: 'YEAR-10', value: '12', status: 1 },
                        { name: 'YEAR-11', value: '13', status: 1 },
                        { name: 'IGCSE', value: '14', status: 1 },
                        { name: 'US', value: '15', status: 1 },
                        { name: 'UK', value: '16', status: 1 },
                        { name: 'GED', value: '17', status: 1 },
                        { name: 'Primary', value: '18', status: 1 },
                        { name: 'Secondary', value: '19', status: 1 },
                    ]
                },
                {
                    id: 2, name: 'Government Schools', name_mm: 'အစိုးရကျောင်း', envType: [
                        { name: 'Kg', value: '1', status: 2 },
                        { name: 'GRADE-1', value: '2', status: 2 },
                        { name: 'GRADE-2', value: '3', status: 2 },
                        { name: 'GRADE-3', value: '4', status: 2 },
                        { name: 'GRADE-4', value: '5', status: 2 },
                        { name: 'GRADE-5', value: '6', status: 2 },
                        { name: 'GRADE-6', value: '7', status: 2 },
                        { name: 'GRADE-7', value: '8', status: 2 },
                        { name: 'GRADE-8', value: '9', status: 2 },
                        { name: 'GRADE-9', value: '10', status: 2 },
                        { name: 'GRADE-10', value: '11', status: 2 },
                        { name: 'GRADE-11', value: '12', status: 2 },
                        { name: 'GRADE-12', value: '13', status: 2 },
                        { name: 'Primary', value: '14', status: 2 },
                        { name: 'Secondary', value: '15', status: 2 },
                    ]
                },
            ],
            optionsStatus: [{
                id: 3,
                name: 'Select All',
                classType: [
                    // { name: 'All Section', status: 3, value: 'all_section' },
                    { name: 'In-Person Class', status: 1, value: 'inperson_class' },
                    { name: 'Group Session', status: 1, value: 'group_session' },
                    { name: 'Home Guide', status: 2, value: 'homeguide' },
                    { name: 'One by One', status: 2, value: 'one_by_one' },
                    { name: 'On campus', status: 2, value: 'on_campus' },
                ]
            }, {

                id: 1,
                name: 'Online',
                classType: [
                    { name: 'In-Person Class', status: 1, value: 'inperson_class' },
                    { name: 'Group Session', status: 1, value: 'group_session' },
                ]
            },
            {
                id: 2,
                name: 'Local',
                classType: [
                    { name: 'Home Guide', status: 2, value: 'homeguide' },
                    { name: 'One by One', status: 2, value: 'one_by_one' },
                    { name: 'On campus', status: 2, value: 'on_campus' },
                ]
            }
            ],
            optionsGender: [{
                id: 1,
                name: 'Female'
            },
            {
                id: 2,
                name: 'Male'
            }],
            name: '',
            gender: '',
            region: [],
            status: [],
            subjects: [],
            classType: [],
            townships: [],
            education: [],
            environment: [],
            optionsRegion: [],
            optionsSubject: [],
            optionsTownship: [],
            optionsClassType: [],
            optionsEducation: []
        }
    },
    async created() {
        console.log("Open Explore & Getting Map");
        await fetch('/api/subjects').then(res => res.json()).then(sub => {
            // this.optionsSubject = sub.filter(item => item.id !== 1);
            this.optionsSubject = sub
        });
        await fetch('/api/myanmar').then(res => res.json()).then(res => {
            const regions = res.data.filter(region => {
                // Check if at least one teacher has a location in the current region
                return this.teachers.some(teacher => {
                    return teacher.locations.some(location => location.region_state === region.eng);
                });
            });
            console.log("Regions:", regions);
            this.optionsRegion = regions;
        });
        // const regions = MyanmarApi.data.filter(region => {
        //     return this.teachers.some(teacher => {
        //         return teacher.locations.some(location => location.region_state === region.eng);
        //     });
        // })
        // this.optionsRegion = regions;
    },
    computed: {
        ...mapGetters(['teachers', 'teacherCount', 'searchCount', 'perPage', 'lang']),
        customLabelCity() {
            return option => this.lang == 'English' ? option.eng : option.mm
        },
        customLabelEducation() {
            return option => this.lang == 'English' ? option.name : option.name
        },
        customLabelTownShip() {
            return option => this.lang == 'English' ? option.eng : option.mm
        },
        customLabelSubject() {
            return option => this.lang == 'English' ? option.name : option.name_mm
        },
        customLabelEvnironment() {
            return option => this.lang == 'English' ? option.name : option.name_mm
        },
        pEnvironment() {
            return this.lang == "English" ? 'Environment' : 'သင်ကြားမှုနယ်ပယ်'
        },
        pRegion() {
            return this.lang == "English" ? 'Region' : 'တိုင်းဒေသကြီး'
        },
        pTownship() {
            return this.lang == "English" ? 'City&Township' : 'မြိုနယ်'
        },
        pSubject() {
            return this.lang == "English" ? 'Subjects' : 'ဘာသာရပ်များ'
        },
        pClassType() {
            return this.lang == "English" ? 'ClassType' : 'အတန်းအမျိုးအစား'
        }

    },
    methods: {
        ...mapActions(['gettingTeacher', 'defaultTeacher']),
        ...mapMutations(['updateFiltersQuery', 'clearFilterQuery']),
        showFilter() {

        },
        openModal() {
            this.isModalOpen = !this.isModalOpen;
            document.body.style.overflow = 'hidden';
        },
        isObjectEmpty(obj) {
            return Object.keys(obj).length === 0;
        },
        closeModal() {
            this.isModalOpen = false;
            document.body.style.overflow = 'auto';
        },
        filters(e) {

            if (e == 'explore' && this.name.length < 1) return null

            if (e == 'region') {
                this.townships = [];
                console.log("Clear Township");
            }

            if (e == 'status') this.classType = [];

            if(e == 'env') this.education = [];

            // if (e == 'env') if (this.isSelectedAll(this.environment)) this.environment = this.optionsEnvironment.filter(option => option.name != 'Select All')

            const region = (this.region == null || this.region.length < 1) ? '' : this.region.eng;

            const townshipsParam = (this.townships == null || this.townships.length < 1) ? '' : this.townships.map(township => township.eng).join(',');

            const subject = (this.subjects == null || this.subjects.length < 1) ? '' : this.subjects.map(sub => sub.id).join(',');

            const education = (this.education == null || this.education.length < 1) ? '' : this.education.map(edc => edc.value).join(',');

            const status = this.status;

            const gender = this.gender ? this.gender.name : '';

            const classType = (this.classType == null || this.classType.length < 1) ? '' : this.classType.map(ct => ct.value).join(',');

            const environment = (this.environment == null || this.environment.length < 1) ? '' : this.environment.id;

            this.updateFiltersQuery({ name: this.name, education: education, region: region, gender: gender, townships: townshipsParam, subjects: subject, status: status, classType: classType, environment: environment });


            if (this.name == '' && region == '' && townshipsParam == '' && education == '' && gender == '' && subject == '' && (status == '' || status == null) && environment == '' && classType == '') {
                this.clearFilterQuery();
                this.defaultTeacher('?page=1&per_page=' + this.perPage);
                console.log("Nothing state");
                return null;
            }
            else this.gettingTeacher();
        },
        dispatchAction(e) {
            this.$nextTick(() => {
                this.filters(e);
            });
        },
        removeAction(e) {
            this.$nextTick(() => {
                console.log("Remove Filter ", e);
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
            this.classType = [];
            this.education = [];
            this.clearFilterQuery();
            if (e == 'all') {
                this.defaultTeacher('?page=1&per_page=' + this.perPage);
            }
        }
    },
    watch: {
        region(selectRegion, oldRegion) {
            this.optionsTownship = [];
            if (selectRegion != null) {

                this.optionsTownship = selectRegion.districts;

                // let districts = selectRegion.districts.filter(region => {
                //     // Check if at least one teacher has a location in the current region
                //     return this.teachers.some(teacher => {
                //         console.log(teacher.locations,region)
                //         return teacher.locations.some(location => location.township === region.eng);
                //     });
                // });

                // // Convert objects to plain JavaScript objects
                // const plainDistricts = JSON.parse(JSON.stringify(districts));
                // console.log("Districts ", plainDistricts);
                // // Update this.optionsTownship in a reactive manner
                // this.optionsTownship = plainDistricts;
            }
        },
        environment(selectEnvironment) {

            // if (this.isSelectedAll(selectEnvironment)) this.environment = this.optionsEnvironment.filter(option => option.name != 'Select All')
            if (selectEnvironment != null) {
                // console.log("SELECT ENVIRONMENT ", selectEnvironment.envType);
                return this.optionsEducation = selectEnvironment.envType;
            }
            else {
                this.optionsEducation = [];
                this.education = [];
            }
        },
        status(selectStatus) {
            if (selectStatus != null) return this.optionsClassType = selectStatus.classType;
            else {
                this.optionsClassType = [];
                this.classType = [];
            }
        }
    },
    mounted() {
        this.clearFilter();
    }

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style lang="scss" scoped>
.modal-filter {
    border-bottom: 1px solid #c3c3c3;
    padding: 20px 0;
}

body.offcanvas-open {
    overflow: hidden;
}

.hide-filter {
    display: block;
}

.multiselect__placeholder,
.multiselect__single {
    font-size: 10px;
    color: #424242;
    letter-spacing: 1px;
    font-weight: bold;
}

.select-size {
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
    background: #fff;
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

@media screen and (max-width: 767px) {
    .hide-filter {
        display: none;
    }

    .multiselect__placeholder,
    .multiselect__single {
        font-size: 13px;
        color: #424242;
        letter-spacing: 1px;
        font-weight: bold;
    }

    .select-size {
        font-size: 14px;
    }
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
