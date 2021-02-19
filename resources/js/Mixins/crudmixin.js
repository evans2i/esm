export const crudMixin = {

    methods: {
        actionDelete(index,id){

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    this.form.delete(`/manage/${this.urls}/${id}`)
                        .then((data) => {
                            Swal.fire("Deleted!", `${this.pagetitle} has been deleted.`, "success");
                        this.angs.splice(index,1);
                        this.spinning=!this.spinning;

                        }).catch(() => {
                            Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error"); 
                        });
                }else{
                    
                }
            });
        },

        cancelDetail(){
        this.cancelUpdate();
        Toast.fire({ icon: "success", title: "reseted successfully" });
        
        },

        saveDetail(){
            this.$Progress.start();
            this.form
                .post(`/manage/${this.urls}`)
                .then((data) => {
                    this.angs.push(data.data);
                    this.cancelUpdate();
                    Toast.fire({
                        icon: "success",
                        title: `${this.pagetitle} created successfully`
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "van did not created successfully"
                    });
                });
        
        },
        updateDetail(){
            this.$Progress.start();
            if(this.form.title === this.dataHolder.title && this.form.status === this.dataHolder.status ){
                this.$Progress.fail();
                Swal.fire("Something Wrong Happened !", "Nothing Changed Please try Again !", "error"); 
            } else {
            this.form.put(`/manage/${this.urls}/${this.id}`)
                .then((data) => {
                    this.angs.splice(this.indexValue, 1, data.data);
                    this.cancelUpdate();
                    // this.angs.splice(index,1);
                    Toast.fire({
                        icon: "success",
                        title: `${this.pagetitle} Updated successfully`
                    });
                    this.$Progress.finish();
                }).catch(() => {
                    this.$Progress.fail();
                    Toast.fire({
                        icon: "error",
                        title: `${this.pagetitle} did not Updated successfully`
                    });
                });

            }
            
        },
    },
}