<section>
  <div class="container mt-5">

    <?php if(isset($_GET['erro']) && $_GET['erro']){ ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible fade show">
            <span>Ação inválida</span>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php } ?>
    
    <div class="row">
      <div class="col-md-4 text-center text-md-left">
        <?php if(!$this->view->currentDay){ ?>
          <h4 class="text-light">Programação de <?php echo $this->view->weekDay ?></h4>
        <?php }else{ ?>
          <h4 class="text-light">Programação de Hoje</h4>
        <?php } ?>
      </div>

      <div class="col-md-2 text-center text-light">
        <h2 id="clock" class="bg-dark rounded p-1"></h2>
      </div>

      
      <div class="col-md-6 text-center text-md-right">
        <form class="mb-3" action="/home" method="post">
          <input type="date" name="data" required>

          <input type="time" name="hora" required>

          <input class="btn btn-dark" type="submit" value="Pesquisar">
        </form>
      </div>
    </div>
    

    <div class="row">
      <div class="col-md-12">
        <table class="table table-dark table-hover table-striped table-bordered" style="border-radius: 10px"> 
          <thead>
            <tr>
              <th></th>
              <th>Programa</th>
              <th>Hora</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($this->view->prog as $index => $prog){ ?>
              <?php if($index == 0){ ?>
                <tr class="table-light text-dark" class="thead-light" style="border:3px solid green">
                  <td class="text-center"><strong><i class="fas fa-arrow-circle-right text-success"> </i>&nbsp;&nbsp;<?php echo $index+1 ?> - A exibir</strong></td>
                  <td><?php echo $prog->name ?></td>
                  <td><?php echo $prog->start ?> às <?php echo $prog->end ?></td>
                </tr>
              <?php }elseif($index == 1){ ?>
                <tr>
                  <td class="text-center"><strong><i class="fas fa-exclamation-circle text-warning"></i>&nbsp;&nbsp;<?php echo $index+1 ?> - Próximo programa</strong></td>
                  <td><?php echo $prog->name ?></td>
                  <td><?php echo $prog->start ?> às <?php echo $prog->end ?></td>
                </tr>
              <?php }else{ ?>
                <tr>
                  <td class="text-center"><?php echo $index+1 ?></td>
                  <td><?php echo $prog->name ?></td>
                  <td><?php echo $prog->start ?> às <?php echo $prog->end ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/homeScripts.js"></script>