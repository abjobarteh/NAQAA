var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
  });
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

window.addEventListener('department-added', event => {
    $('#add-department').modal('hide');
    if(event.detail.action == 'create'){
      Toast.fire({
        icon: 'success',
        title: event.detail.department+' department sucessfully created'
      });
    }else{
      Toast.fire({
        icon: 'success',
        title: event.detail.department+' department sucessfully updated'
      });
    }
    
      Livewire.emit('refreshDepartments');
})

window.addEventListener('Notify', event => {
    Toast.fire({
      icon: 'success',
      title: event.detail.message
    });
})

$('#add-or-update-subdivision').on('hidden.bs.modal', function(event){
    Livewire.emit('clearForm');
})