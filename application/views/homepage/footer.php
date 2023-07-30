<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h4>Alamat</h4>
        <p>Jl. S. Supriadi No.38 A, Sukun, Kec. Sukun, 65147</p>
        <p>Malang, Jawa Timur, Indonesia</p>
      </div>
      <div class="col-lg-6">
        <h4>Kontak</h4>
        <p>Telepon: (0341) 341618</p>
        <p>Email: info@banksampahmalang.com</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap 4.6 -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- DataTables & Plugins -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
  $(function() {
    $("#datatable1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // additional settings
      "paging": true,
      "ordering": true,
      "info": true,
    });

    // Date picker
    $('#tglmulai').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tglberakhir').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  });
</script>

</body>
</html>
