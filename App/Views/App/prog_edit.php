<section>
	<div class="container bg-light mt-5 rounded p-5">
		<div class="row">
			<div class="col-md-12 align-self-right">

				<?php if(isset($this->view->errors) && $this->view->errors){ ?>
					<?php foreach($this->view->errors as $index => $error){ ?>

						<div class="alert alert-danger alert-dismissible fade show">
							<span><?php echo $error ?></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
				<?php } ?>

				<?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'){ ?>
					<div class="alert alert-success">
						<span>Programação salva com sucesso!</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>

				<h3>Salvar Programação</h3>

				<form class="mt-3" action="/editProg?action=<?php echo $this->view->formAction ?>&id=<?php echo $this->view->prog->id ?>" method="post">

					<input class="form-control w-50" type="hidden" name="id" value="<?php echo $this->view->prog->id ?>">

					<div class="form-group">
						<label for="name">Nome da Programação</label>
						<input class="form-control w-50" type="text" id="name" name="name" value="<?= $this->view->prog->name ?>" placeholder="Informe o nome" required>
					</div>

					<div class="form-group">
						<label for="day">Dia de exibição</label>
						<select class="form-control w-50" id="day" name="day">
							<?php foreach($this->view->dias as $index => $day){ ?>
								<?php if($this->view->prog->day == $index +1){ ?>
									<option value="<?= $index+1 ?>" selected><?php echo ucfirst(mb_strtolower($day,'UTF-8')) ?></option>
								<?php }else{ ?>
									<option value="<?= $index+1 ?>"><?php echo ucfirst(mb_strtolower($day,'UTF-8')) ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="start">Inicio</label>
						<input class="form-control w-50" type="time" id="start" name="start" value="<?=(empty($this->view->prog->start)?"":date('H:i', strtotime($this->view->prog->start)))?>" placeholder="Hora de início" required>
					</div>

					<div class="form-group">
						<label for="end">Fim</label>
						<input class="form-control w-50" type="time" id="end" name="end" value="<?=(empty($this->view->prog->end)?"": date('H:i',strtotime($this->view->prog->end))) ?>" placeholder="Hora do fim" required>
					</div>

					<input type="submit" value="Salvar" class="btn btn-success">
					<a href="/progs" class="btn btn-secondary">Voltar</a>
				</form>
			</div>
		</div>
	</div>
				
</section>