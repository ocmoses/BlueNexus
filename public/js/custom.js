function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(document).ready(function(){
    

  $('#users-table').DataTable({
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ]
  });

    $(".action").click(function(){

      var userId = $(this).attr('id');
      var person = $(this).data('target');

      Swal.fire({
        title: 'Normally you can only do this at the end of the month. Do you want to try changing '
                 + person + '\'s limit?',
        input: 'number',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Yes',
        showLoaderOnConfirm: true,
        preConfirm: (limit) => {
          console.log('new limit', limit);
          return axios.post(`/set_limit/${userId}`, {newLimit: limit} )
            .then(response => {
              // if (!response.ok) {
              //   throw new Error(response.statusText)
              // }
              // Swal.close();
              // Swal.fire({
              //   title: 'Success!',
              //   text: 'Limit set Successfully',
              //   icon: 'success',
              //   confirmButtonText: 'Okay'
              // });
            })
            .catch(error => {
              console.log(error.response);
              Swal.showValidationMessage(                
                `Request failed: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Success!',
            text: `Limit set Successfully`,
            icon: 'success',
            confirmButtonText: 'Okay'
          });
          setTimeout(function(){
            location.reload();
          }, 2000);
        }
      })
    });
});