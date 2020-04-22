<template>
    <div>
      <select :value="value" @input="triggerEvent">
        <option v-for="option in options" :value="option.value">{{option.text}}</option>
    </select>
    </div>
  </template>
  
  <script>
    export default {
      props: {
        value: String,
        options: Array,
        onchange: { type: Function }
      },
      methods: {
        triggerEvent(event) {
          this.$emit('input', event.target.value);
          if(this.onchange != null)
          {
            this.onchange();
          }
          
        }
      }
    }
  </script>