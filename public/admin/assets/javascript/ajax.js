jQuery(document).ready(function(){

    jQuery(document).on("click","#add_new_group",function(){
        $("#add_new_group_modal").modal("show");
        // console.log("click");
    });

    // add group modal save button
    jQuery("#group_name_add_btn").click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var group_name=jQuery('.group_name').val();
        // console.log("This is from modal ",group_name);

        $.ajax({
            url:"add-new-group",
            type:"POST",
            data:{
                'group_name':group_name
            },
            success:function (response) {
                if (response.status) {
                    $("#add_new_group_modal").modal("hide");
                    location.reload();
                    // $("#datatable_group").html(response);
                    // toastr.success("Test toast");

                }
            }
        })
    });


    // edit
    jQuery(".add_group_name_edit_btn").click(function(){
        var id=jQuery(this).val();
        jQuery("#group_name_update_btn").val(id)
        jQuery("#add_new_group_modal_edit").modal("show");
        $.ajax({
            url:"/dashboard/name/edit/"+id,
            type:"GET",
            success:function (response) {
                if (response.status === "200"){
                   // console.log("All Edit data",response);

                    jQuery("#group_name").val(response.data.group_name)
                }
            }
        })
    })

    jQuery("#group_name_update_btn").click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id=jQuery(this).val();
        var group_name_update=jQuery(".group_name_update").val();

       $.ajax({
           url:"/dashboard/name/update/"+id,
           type:"POST",
           data:{
               group_name_update:group_name_update
           },
           success:function (response) {

               if(response.status == "200"){
                   alert("ok");
                   // console.log("This is update : ",response);
                   location.reload();
               }

           }
       })

    })



    // delete group name
    jQuery(".add_group_name_delete_btn").click(function () {
        var id=jQuery(this).val();
        jQuery("#group_name_delete_modal").modal("show");
        jQuery(".modal_confirm_delete_btn").val(id);

    })

    jQuery(".modal_confirm_delete_btn").click(function () {
     var id=jQuery(this).val();

     $.ajax({
         url:"/dashboard/delete/name/"+id,
         type:"GET",
         success:function(response){
             if(response.status == "200"){
                 alert("ok");
                 jQuery("#group_name_delete_modal").modal("hide");
                 // jQuery("#datatable_group").load("/dashboard/groups");

                 location.reload();
                 // $("#datatable_group").html(response);
             }
             else if(response.status == "400"){
                 alert("Not ok");
             }


         }
     })


    })

    //filter data
    // $('#group-filter').change(function() {
    //     var selectedGroup = $(this).val();

    //     $.ajax({
    //         url: '/dashboard/manage-customer',
    //         type: 'GET',
    //         data: {
    //             group_id: selectedGroup
    //         },
    //         success: function(response) {
    //             // Update the customer table with the filtered data
    //             console.log("Response ",response);
    //             $('#customer-table tbody').html(response);
    //         },
    //         error: function(xhr, status, error) {
    //             console.log("Error:", error);
    //         }
    //     });
    // });



    // delete customer

    

});
