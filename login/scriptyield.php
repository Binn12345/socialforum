<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.umd.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
   
    $('#myTable').DataTable({
        "serverSide": true,
        "ajax": {
            "url": "process/datalist.php",
            "dataSrc": "data" 
        },
        "columns": [
            { "data": "id" },
            { "data": "username" },
            { "data": "userkey" }
        ]
    });
    
    $('#save').on('click', function() {
        var formData = $('#create').serialize();

        $.ajax({
            type: 'POST',
            url: 'process/process_form.php',
            data: formData,
            success: function(response) {

              var jsonResponse = JSON.parse(response);

              var status = jsonResponse.status;
              var message = jsonResponse.message;
            
                if (status === 'success') {
                    // Show a SweetAlert for success

                    // console.log(table);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        background: '#59b259',
                        color: '#ffff',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.resumeTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: status,
                        title: message
                    })

                    // Reset the form
                    $('#create')[0].reset();
                    // location.reload();
                    // Reload the DataTable to display the updated data
                    $('#myTable').DataTable().ajax.reload();
                } else if (status === 'error') {
                    // Handle other response statuses (e.g., error)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        background: '#f64341',
                        color: '#ffff',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.resumeTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: 'Password validation failed. Make sure passwords match and are at least 8 characters long.'
                    });
                }
            },
        });
    });
    
    $('#logout').on('click',function(e){

        Swal.fire({
          title: 'Are you sure?',
          text: "You want to sign out",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
          
        }).then((result) => {
          if (result.isConfirmed) {
              window.location = "logout.php";
          }
        })

    })

    $('#filter').on('click',function(e){

        var formdata = {
            id : $("#usertype").val()
        }
    
        $.ajax({
            type: 'POST',
             url: 'process/datalist.php',
            data: formdata,
            success: function(response) {
            }
        })

    });

});

</script>
