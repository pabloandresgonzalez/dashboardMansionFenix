<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,   
                    <a href="" class="font-weight-bold" target="_blank">Club </a><a style="color: #252f40;" href="" class="font-weight-bold ml-1" target="_blank">Mansion Phoenix</a>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="javascript:;" onclick="$('#termsModal').modal('show');" class="nav-link pe-0 text-muted">Términos</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">Centro de Apoyo</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-muted" target="_blank">WhatsApp</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </div>    
</footer>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content">      
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Términos y Condiciones</h5>        
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">    
          <!-- Incrustar el PDF en el modal -->
          <object data="https://drive.google.com/file/d/1jPX0C2YYu8t8VIzndxopCnKTGl6urmjT/preview" type="application/pdf" width="100%" height="500px">
            <embed src="https://drive.google.com/file/d/1jPX0C2YYu8t8VIzndxopCnKTGl6urmjT/preview" width="100%" height="500px" />
            <p>&nbsp;Este navegador no soporta archivos PDF. Descargue el PDF para verlo: 
              <a href="" target="_blank">Descargar PDF</a>.</p>
          </embed></object>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
