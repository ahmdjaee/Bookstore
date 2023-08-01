</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- file Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- File Data tables js -->
<script src = "https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<!-- mengetach id myTable ke datatable -->
<script>
    $(document).ready(function() {

$('#myTable').DataTable();
$('.alert').alert().delay(3000).slideUp('slow');
});
</script>
  </body>
</html>