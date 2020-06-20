var app = new Vue({
    el: '#app',
    data: {
        id: null,
        state: [],
    },
    methods: {
        check: function(){
            if (this.id == null || this.id.length == 0){
                // do nothing
            } else {
                axios
                    .get('/check/' + this.id)
                    .then(response => (this.state = response.data))
            }
        }
    }
});
