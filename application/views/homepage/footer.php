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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables & Plugins -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<!-- InputMask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();

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

    // Toastr
    <?php if ($this->session->flashdata('success_message')) { ?>
      toastr.info("<?= $this->session->flashdata('success_message') ?>");
    <?php } ?>
  });
</script>

</body>
</html>
