$(function () {
  $("#example1").DataTable({
    "responsive": true, 
    "lengthChange": false, 
    "autoWidth": false,
  });
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
  
});
