$(document).ready(function(){
  window._token = $('meta[name="csrf-token"]').attr('content')
 
  window.addEventListener('alert', event => {
      Swal.fire({
        title: event.detail.title,
        text: event.detail.message,
        icon: event.detail.type,
        confirmButtonText: 'Close'
    })
  })
  
    window.addEventListener('openAssessmentFormModal', event => {
        $('#assessment-modal').modal('show')
    })

    window.addEventListener('closeAssessmentFormModal', event => {
      console.log('something is working here')
      $('#assessment-modal').modal('hide')
  })
  

  $('.modal').on('hidden.bs.modal', function(event){
      Livewire.emit('clearForm');
  })

  $('.select2').select2()

  $(".datatable").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
    "lengthChange": true,"ordering": true,"info": true,
    "searching": true,
    "buttons": ["csv", "excel", "pdf", "print"]
}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

$('.modal').on('hidden.bs.modal', function(e)
    { 
        $(this).removeData();
    }) ;

})

