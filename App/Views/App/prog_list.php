<section>
  <div class="container mt-5">
    
    <?php if(isset($_GET['success']) && $_GET['success']){ ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success">
            Programação apagada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-md-6">
        <a href="/progs"><h4 class="text-white">Programação Semanal</h4></a>
      </div>

      <div class="col-md-6 text-right">
        <a href="/redirectAction?action=save" class="btn btn-success mb-2">Novo +</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="?page=1"><<</a></li>
            

            <?php for($i = 1; $i <= $this->view->totalPages; $i++){ ?>

              <?php if($i==1 && $this->view->activePage != 1){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $this->view->activePage-1 ?>"><</a></li>
              <?php } ?>

              <li class="page-item <?php echo $this->view->activePage == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>

              <?php if($i==$this->view->totalPages && $this->view->activePage != $this->view->totalPages){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $this->view->activePage+1 ?>">></a></li>
              <?php } ?>

            <?php } ?>

            <li class="page-item"><a class="page-link" href="?page=<?= $this->view->totalPages ?>">>></a></li>
          </ul>
        </nav>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-dark table-hover table-striped">
          <thead>
            <tr>
              <th>Próximo programa</th>
              <th>Hora</th>
              <th>Dia</th>
              <th>Ação</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($this->view->progList as $prog){?>
              <tr>
                <td><?php echo $prog->NOME_PROG ?></td>
                <td><?php echo $prog->HR_INICIO ?> às <?php echo $prog->HR_FIM ?></td>
                <td>
                  <?php
                    switch($prog->DIA_PROG){

                      case 1:
                        echo 'Domingo';
                        break;

                      case 2:
                        echo 'Segunda';
                        break;

                      case 3:
                        echo 'Terça';
                        break;

                      case 4:
                        echo 'Quarta';
                        break;

                      case 5:
                        echo 'Quinta';
                        break;

                      case 6:
                        echo 'Sexta';
                        break;

                      case 7:
                        echo 'Sábado';
                        break;
                    } 
                  ?>
                </td>
                <td>
                  <a href="" data-toggle="modal" data-target="#deleteModal" onclick="deleteModalItem('<?php echo $prog->NOME_PROG ?>','<?php echo $prog->COD_PROG ?>')" class="btn btn-danger">
                    <i class="fas fa-trash-alt fa-lg"></i>
                  </a>
                  <a href="/redirectAction?action=edit&id=<?php echo $prog->COD_PROG ?>" class="btn btn-info">
                    <i class="fas fa-edit fa-lg"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <nav>
          <ul class="pagination justify-content-center">

            <li class="page-item"><a class="page-link" href="?page=1"><<</a></li>
            
            <?php for($i = 1; $i <= $this->view->totalPages; $i++){ ?>

              <?php if($i==1 && $this->view->activePage != 1){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $this->view->activePage-1 ?>"><</a></li>
              <?php } ?>

              <li class="page-item <?php echo $this->view->activePage == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>

              <?php if($i==$this->view->totalPages && $this->view->activePage != $this->view->totalPages){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $this->view->activePage+1 ?>">></a></li>
              <?php } ?>

            <?php } ?>

            <li class="page-item"><a class="page-link" href="?page=<?= $this->view->totalPages ?>">>></a></li>

          </ul>
        </nav>
      </div>
    </div>

  </div>
</section>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLongTitle">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <p>O item <strong id="itemName"></strong> será apagado permanentemente. Deseja continuar?</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

        <form action="/deleteProg" method="post">
          <input id="modalDeleteItemId" type="hidden" name="id">
          <input type="submit" class="btn btn-danger" value="Apagar">
        </form>
      </div>
    </div>

  </div>
</div>