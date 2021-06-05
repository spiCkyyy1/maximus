<template>
    <div>
        <div class="card">
                           <div>
                              <h6>{{question}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3" v-if="value1 != ''">
                                    <input type="radio" id="c91" class="score" :value="value1" v-model="value" :data-id="weighted_score1">
                                    <label for="c91">{{option1}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value2 != ''">
                                    <input type="radio" id="c101" class="score" :value="value2" v-model="value" :data-id="weighted_score2">
                                    <label for="c101">{{option2}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value3 != ''">
                                    <input type="radio" id="c102" class="score" :value="value3" v-model="value" :data-id="weighted_score3">
                                    <label for="c102">{{option3}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value4 != ''">
                                    <input type="radio" id="c103" class="score" :value="value4" v-model="value" :data-id="weighted_score4">
                                    <label for="c103">{{option4}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value5 != ''">
                                    <input type="radio" id="c104" class="score" :value="value5" v-model="value" :data-id="weighted_score5">
                                    <label for="c104">{{option5}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value6 != ''">
                                    <input type="radio" id="c105" class="score" :value="value6" v-model="value" :data-id="weighted_score6">
                                    <label for="c105">{{option6}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value7 != ''">
                                    <input type="radio" id="c106" class="score" :value="value7" v-model="value" :data-id="weighted_score7">
                                    <label for="c106">{{option7}}</label>
                                 </div>
                                 <div class="radio text-left mb-3" v-if="value8 != ''">
                                    <input type="radio" id="c107" class="score" :value="value8" v-model="value" :data-id="weighted_score8">
                                    <label for="c107">{{option8}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="error != ''">{{ __(error) }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" v-on:click="$emit('submitAnswer', step)">{{btnText}}</button>
                              </div>
                           </div>
                        </div>
    </div>
</template>

<script>
export default {
    mixins: [require('../base')],
    props: {
        question: String,
        option1: String,
        option2: String,
        option3: String,
        option4: String,
        option5: String,
        option6: String,
        option7: String,
        option8: String,
        value1: String,
        value2: String,
        value3: String,
        value4: String,
        value5: String,
        value6: String,
        value7: String,
        value8: String,
        answer: String,
        value:  String,
        step: String,
        weighted_score1: String,
        weighted_score2: String,
        weighted_score3: String,
        weighted_score4: String,
        weighted_score5: String,
        weighted_score6: String,
        weighted_score7: String,
        weighted_score8: String,
        competency: String,
        error: String,
        btnText: String,
        questionForDb: String
    },
    watch: {
            value() {
                let weightedScore = $("input[type='radio'].score:checked").attr('data-id');
                this.$emit('updateAnswer', {question: this.questionForDb, value: this.value, weightedScore: weightedScore, competency: this.competency});
            }
        }
}
</script>
