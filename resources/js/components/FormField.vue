<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <input
        :id="field.name"
        type="text"
        class="w-full form-control form-input form-input-bordered"
        :class="errorClasses"
        v-bind="extraAttributes"
        v-model="value"
        v-mask="setMask"
      >
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";
import { mask } from "vue-the-mask";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  directives: {
    mask
  },

  computed: {
    setMask() {
      return this.field.mask;
    },
    defaultAttributes() {
      return {
        placeholder: this.field.placeholder || this.field.name,
      }
    },
    extraAttributes() {
      const attrs = this.field.extraAttributes

      return {
        // Leave the default attributes even though we can now specify
        // whatever attributes we like because the old number field still
        // uses the old field attributes
        ...this.defaultAttributes,
        ...attrs,
      }
    },
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || "";
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      // if set to use raw value (no mask), remove mask chars from value
      let rawValue = this.value || "";
      if (this.field.raw) {
        for (let i = 0; i < this.field.mask.length; i++) {
          rawValue = rawValue.replace(this.field.mask[i], "");
        }
      }

      formData.append(this.field.attribute, rawValue);
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value;
    }
  }
};
</script>
