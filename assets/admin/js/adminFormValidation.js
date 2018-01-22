$(document).ready(function(){
   $('#addProjectForm,#updateProjectForm').validate({
       rules:{
            newMgrEmail: {
                required:true,
                email: true
            },
            developer_id: "required",
            name: "required",
            location_id: "required",
            nearby_id: "required",
            property_type_id: "required",
            address: "required",
            description: "required",
            newMgrName: "required",
            newProjectMgrPhone: "required",
            total_units: "required",
            size_min: "required",
            size_max: "required",
            price_min: "required",
            price_max: "required",
            category: "required",
            latitude: "required",
            longitude: "required"
       }
   }); 

   $('#updateFeaturedPages').validate({
        feature_name: "required",
        feature_description: "required"
    });

    // $('#newDeveloperForm').validate({
    //     rules:{
    //         name: {
    //             required:true
    //         }
    //         // contact_name: "required",
    //         // contact_email: {
    //         //     required:true,
    //         //     email:true
    //         // },
    //         // contact_phone: {
    //         //     required: true,
    //         //     number:true
    //         // },
    //         // contact_address: "required",
    //         // allowed_listings: {
    //         //     required: true,
    //         //     number:true
    //         // },
    //         // status: "required"
    //     }
        
    // });
    

    
});