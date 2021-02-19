<template>
    <select>
    	<slot></slot>
  </select>
</template>

<script>
    export default {
        props: ['options', 'value'],

        methods: {
           
        },
        mounted: function () {
		    var vm = this
		    cash(this.$el)
		      // init select2
		      .select2({ data: this.options })
		      .val(this.value)
		      .trigger('change')
		      // emit event on change.
		      .on('change', function () {
		        vm.$emit('input', this.value)
		      })
		  },

		  watch: {
		    value: function (value) {
		      // update value
		      cash(this.$el)
		      	.val(value)
		      	.trigger('change')
		    },
		    options: function (options) {
		      // update options
		      cash(this.$el).empty().select2({ data: options })
		    }
		  },
		  destroyed: function () {
		    	cash(this.$el).off().select2('destroy')
		  },

        computed: {
            
        },

    }
</script>

<style scope>
	select {
	 	 min-width: 300px;
	 	 min-height:20px;
	}
</style>