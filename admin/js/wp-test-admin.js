jQuery(document).ready(function(){

	//Datatable init
	jQuery('#myTable').DataTable();

    //Get user detail
    jQuery('#myTable tbody').on('click', '.view-user', function () {

		var userID = jQuery(this).attr('dataid');
		
		jQuery('.loader').show();
		jQuery('#overlay').show();
		
		jQuery.ajaxSetup({
			headers : {
			  'Content-type' : 'application/json',			 
			}
		  });
		jQuery.getJSON( "https://jsonplaceholder.typicode.com/users/"+userID, function( data ) {

			if(data){

				console.log('data'+data);
				jQuery('.loader').hide();
				jQuery('#overlay').hide();
				Swal.fire({
					title: data.name,
					html: "<div class='user-detail'><ul><li><label>Email:</label>"+data.email+"</li><li><label>Phone:</label>"+data.phone+"</li><li><label>Website:</label> <a href='https://"+data.website+"'>"+data.website+"</a></li><li><label>Street:</label>"+data.address.street+"</li><li><label>City:</label>"+data.address.city+"</li><li><label>Zip code:</label>"+data.address.zipcode+"</li></ul></div>",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ok'
				  })		
			}else{
				alert('Error!');
			}
		});
    });
});