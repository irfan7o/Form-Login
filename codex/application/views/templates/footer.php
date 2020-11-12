   <!-- Footer -->
   <footer class="sticky-footer bg-white">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span> Designed By Irfan Rahmat [5180311095]</span>
               <br />
               <br />
               <span>Copyright &copy; <?= date('F Y'); ?></span>
           </div>
       </div>
   </footer>
   <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

   <script>
       $('.custom-file-input').on('change', function() {
           let filename = $(this).val().split('\\').pop();
           $(this).next('.custom-file-label').addClass("selected").html(filename);
       });



       $('.form-check-input').on('click', function() {
           const menuId = $(this).data('menu');
           const roleId = $(this).data('role');

           $.ajax({
               url: "<?= base_url('admin/changeaccess'); ?>",
               type: 'post',
               data: {
                   menuId: menuId,
                   roleId: roleId
               },
               success: function() {
                   document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
               }
           });
       });
   </script>
   <script>
       $('.delete').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           let url = window.location.origin + "/codex/menu/delete";
           //alert(url);
           con = confirm("Apakah anda ingin menghapus data " + title + " ?");

           if (con) {
               // alert('hapus' + id);
               delete_data(id, url);
           }
       });

       $('.delete_menu').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           let url = window.location.origin + "/codex/menu/delete_menu";
           //alert(url);
           con = confirm("Apakah anda ingin menghapus data " + title + " ?");

           if (con) {
               // alert('hapus' + id);
               delete_data(id, url);
           }
       });


       $('.edit_menu').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           $('#id_menu').val(id);
           $('#menu_dt').val(title);
           $('#editMenuModal').modal('show');


           //    if (con) {
           //        // alert('hapus' + id);
           //        delete_data(id, url);
           //    }
       });

       $('.edit_role').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           $('#id_role').val(id);
           $('#role_nama').val(title);
           $('#editRoleModal1').modal('show');


           //    if (con) {
           //        // alert('hapus' + id);
           //        delete_data(id, url);
           //    }
       });

       $('.edit_sub_menu').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           let menu_id = $(this).data('menu_id');
           let menu = $(this).data('menu');
           let active = $(this).data('active');
           $('#id_submenu').val(id);
           $('#title_edit').val(title);
           $('#menu_id_edit').val(title);
           $('#icon_edit').val($(this).data('icon'));
           $('#url_edit').val($(this).data('url'));
           $('#editSubmenuModal2').modal('show');
           $('#menu_id_edit').prepend($('<option/>', {
               value: menu_id,
               text: menu
           }));

           if (active == 1) {
               $('#is_active_edit').prop('checked', true);
           } else {
               $('#is_active_edit').prop('checked', false);
           }

       });


       $('.delete_role').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           let url = window.location.origin + "/codex/admin/delete_role";
           //alert(url);
           con = confirm("Apakah anda ingin menghapus data " + title + " ?");

           if (con) {
               // alert('hapus' + id);
               delete_data(id, url);
           }
       });

       $('.edit_submenu').on('click', function() {
           let id = $(this).data('id');
           let title = $(this).data('title');
           $('#menu_id').val(id);
           $('#title').val(title);
           $('#newSubmenuModal2').modal('show');


           //    if (con) {
           //        // alert('hapus' + id);
           //        delete_data(id, url);
           //    }
       });

       function delete_data(id, url) {
           // let base_url = '<?php echo base_url(); ?>';
           $.ajax({
               url: url,
               type: 'POST',
               dataType: 'JSON',
               data: {
                   id: id
               },
               success: function(resp) {
                   //  data = JSON.parse(resp);
                   alert("success delete");
                   window.location.reload();
               },
               error: function(resp) {
                   alert('error datele data, periksa jaringan anda');
                   console.log(resp);
               }
           });
       }
   </script>
   </body>

   </html>