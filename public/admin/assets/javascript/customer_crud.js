jQuery(document).ready(function(){
     // delete customer
     jQuery(".delete_customer_btn").click(function(){
        var id=jQuery(this).val();

        jQuery("#customer_delete_modal").modal("show");
        jQuery(".customer_confirm_delete").val(id)
    });

    jQuery(".customer_confirm_delete").click(function(){
        var id = jQuery(this).val();

        // $.ajax({
        //     //url:"delete-customer/"+id,
        //     url: "/dashboard/customer/delete/" + id,
        //     type:"GET",
        //     success:function(response){
        //         console.log("delte",response);
        //     }
        // })
        $.ajax({
            url: "/dashboard/customer/delete/" + id,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log("delete", response);
            }
        });

    });
});

