 <!-- Footer Start -->
 <div class="footer">
     <div class="container copyright">
         <p>Copyright &copy;<script>
                 document.write(new Date().getFullYear());
             </script>. <?php foreach ($profil as $footer) : ?><?= $footer->teks_footer; ?><?php endforeach; ?>
         </p>
     </div>
 </div>
 <!-- Footer End -->