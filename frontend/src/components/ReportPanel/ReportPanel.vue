<script>
import {fuzzification, andRules, determineSample, defuzzification} from "../../service/fuzzy/fuzzy.js";
export default {
  name: 'ReportPanel',
  data() {
    return {
      firstValue: '',
      secondValue: '',
      reward: ''
    }
  },
  methods: {
    check() {
      const [lDist, mDist, rDist] = fuzzification(this.firstValue, 100, 150, 200);
      const [lSpeed, mSpeed, rSpeed] = fuzzification(this.secondValue, 30, 50, 70);

      let kurangObj = {temp: 0, conclusion: 0};
      let tahanObj = {temp: 0, conclusion: 0};
      let tambahObj = {temp: 0, conclusion: 0};

      andRules(lDist, lSpeed, tahanObj);
      andRules(lDist, mSpeed, kurangObj);
      andRules(lDist, rSpeed, kurangObj);
      andRules(mDist, lSpeed, tambahObj);
      andRules(mDist, mSpeed, tahanObj);
      andRules(mDist, rSpeed, kurangObj);
      andRules(rDist, lSpeed, tambahObj);
      andRules(rDist, mSpeed, tahanObj);
      andRules(rDist, rSpeed, tahanObj);

      const [sample1, sample2, sample3] = determineSample(0, 25, 75, 100);

      this.reward = defuzzification(
          kurangObj.conclusion,
          tahanObj.conclusion,
          tambahObj.conclusion,
          sample1,
          sample2,
          sample3
      );

    }
  }
}
</script>

<template>
  <div>
    <input type="text" v-model="firstValue"/>
    <input type="text" v-model="secondValue"/>
    <button @click="check">confirm</button>
  </div>
  <div>
    {{reward}}
  </div>
</template>

<style>

</style>