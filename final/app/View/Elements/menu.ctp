				<?php if ($logged_in){
					echo $this->Html->link('Home','/');
					echo ' ';
					echo $this->Html->link('Usuario',array('controller'=>'users','action'=>'index'));
					echo ' ';
					echo $this->Html->link('Reportes',array('controller'=>'reportes','action'=>'index'));
				}
				?>