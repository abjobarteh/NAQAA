// show loading while window loads
$(window).on('load', function () {
   $('#loading').hide(); 
  })

$(document).ready(function(){
  window._token = $('meta[name="csrf-token"]').attr('content')
    window.addEventListener('subdivision-added', event => {
      $('#add-or-update-subdivision').modal('hide');
      if(event.detail.action == 'create'){
        Toast.fire({
          icon: 'success',
          title: event.detail.subvisionName+' Subdivision sucessfully created'
        });
      }else{
        Toast.fire({
          icon: 'success',
          title: event.detail.subvisionName+' Subdivision sucessfully updated'
        });
      }
      
        Livewire.emit('refreshSubdivisions');
  })

  window.addEventListener('directorate-added', event => {
      $('#add-directorate').modal('hide');
      if(event.detail.action == 'create'){
        Toast.fire({
          icon: 'success',
          title: event.detail.directorate+' directorate sucessfully created'
        });
      }else{
        Toast.fire({
          icon: 'success',
          title: event.detail.directorate+' directorate sucessfully updated'
        });
      }
      
        Livewire.emit('refreshDirectorates');
  })

  window.addEventListener('designation-added', event => {
    $('#add-designation').modal('hide');
    if(event.detail.action == 'create'){
      Toast.fire({
        icon: 'success',
        title: event.detail.designation+' designation sucessfully created'
      });
    }else{
      Toast.fire({
        icon: 'success',
        title: event.detail.designation+' designation sucessfully updated'
      });
    }
    
      Livewire.emit('refreshDesignations');
  })

  window.addEventListener('Notify', event => {
      Toast.fire({
        icon: 'success',
        title: event.detail.message
      });
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

