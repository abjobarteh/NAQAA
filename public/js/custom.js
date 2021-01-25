var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
  });
window.addEventListener('subdivision-added', event => {
    $('#add-or-update-subdivision').modal('hide');
    Toast.fire({
        icon: 'success',
        title: event.detail.subvisionName+' Subdivision sucessfully created'
      });
      Livewire.emit('refreshSubdivisions');
})

window.addEventListener('department-added', event => {
    $('#add-department').modal('hide');
    Toast.fire({
        icon: 'success',
        title: event.detail.departmentName+' Subdivision sucessfully created'
      });
      Livewire.emit('refreshDepartments');
})

$('#add-or-update-subdivision').on('hidden.bs.modal', function(event){
    Livewire.emit('clearForm');
})